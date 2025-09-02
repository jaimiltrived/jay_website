<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use FFI\Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\registration;
use Illuminate\Support\Facades\Hash;
use App\Models\product;
use App\Models\image;
use App\Models\cart;
use App\Models\services;
use App\Models\Token;
use App\Mail\OtpMail;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\payment;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\HomeContent;
use App\Models\AboutSections;
use App\Models\AboutServies;
use App\Models\VideoSection;
use Razorpay\Api\Api;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class jwellry extends Controller
{
    public function index()
    {
        $row = product::all();
        $banners = Slider::all();
        $bg = image::all();
        $contents = HomeContent::get()->first();
        $blogs = Blog::get();

        return view('index', compact('row', 'bg', 'banners', 'contents', 'blogs'));
    }

    public function about()
    {
        $contents = HomeContent::get()->first();
        $about = AboutSections::first();
        $services = AboutServies::all();
        $videoSection = VideoSection::first();
        return view('about_us', compact('contents', 'about', 'services', 'videoSection'));
    }


    public function productpage()
    {
        return view('product_page');
    }


    public function showregisterForm()
    {
        return view('register');
    }

    public function adm_edit_profile()
    {
        $email = session('email');
        $row = registration::where('u_mail', $email)->first();
        return view('adm_edit_profile', compact('row'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30',
            'lname' => 'required|string|min:2|max:30',
            'email' => 'required|email|unique:registration,u_mail',
            'address' => 'required',
            'password' => [
                'required',
                'min:6',
                'max:20',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*]).+$/'
            ],
            'con_password' => 'required|same:password',
            'profile_picture' => 'required|image'
        ]);

        $profileFileName = null;
        if ($request->hasFile('profile_picture')) {
            $profileFileName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->storeAs('public/profile_pictures', $profileFileName);
        }

        registration::create([
            'u_name' => $request->name,
            'u_lname' => $request->lname,
            'u_mail' => $request->email,
            'u_password' => Hash::make($request->password),
            'u_conformpassword' => Hash::make($request->con_password),
            'address' => $request->address,
            'profile_picture' => $profileFileName
        ]);

        $url = route('activate', ['email' => $request->email]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'url' => $url
        ];

        Mail::send(['text' => 'sendingmail'], ['data1' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject('registration');
            $message->from("sujalpatel0950@gmail.com");
        });

        return redirect()->route('login');
    }


    public function showLoginForm()
    {
        return view('customerlogin');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.'
        ]);

        $ans = registration::where('u_mail', $request['email'])->first();
        if ($ans['role'] === 'admin' && Hash::check($request['password'], $ans['u_password'])) {
            // Auth::loginUsingId(21);
            session(['email' => $ans->u_mail]);
            return redirect()->route('adm_index')->with('success', 'login successfull');
        } else {

            if (isset($ans)) {
                if (Hash::check($request['password'], $ans['u_password'])) {
                    Auth::loginUsingId($ans->id);
                    session(['email' => $ans->u_mail]);
                } else {

                    return back()->withErrors([
                        'password' => 'password not match'
                    ]);
                }

            } else {
                return back()->withErrors([
                    'email' => 'email not exist'
                ]);
            }

        }
        $row = product::all();
        $banners = Slider::all();
        $bg = image::all();
        $contents = HomeContent::get()->first();
        $blogs = Blog::get();

        return view('index', compact('row', 'bg', 'banners', 'contents', 'blogs'));

    }
    public function shop(Request $request)
    {

        $types = Product::select('type')->distinct()->get();


        $query = Product::query();


        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }


        if ($request->filled('min_price')) {
            $query->where('new_price', '>=', $request->min_price);
        }


        if ($request->filled('max_price')) {
            $query->where('new_price', '<=', $request->max_price);
        }


        $products = $query->get();

        return view('shop', compact('types', 'products'));
    }




    public function edit()
    {
        $email = session('email');
        $row = registration::where('u_mail', $email)->first();
        return view('edit', compact('row'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $type = $request->input('type');

        $products = Product::when($query, function ($q) use ($query) {
            $q->where('product_name', 'LIKE', "%{$query}%")
                ->orWhere('type', 'LIKE', "%{$query}%")
                ->orWhere('occupancy_status', 'LIKE', "%{$query}%");
        })
            ->when($type, function ($q) use ($type) {
                $q->where('type', $type);
            })
            ->get();

        // Pass types to view
        $types = Product::select('type')->distinct()->get();

        return view('shop', compact('products', 'types'));
    }
    public function edit_profile(Request $data)
    {
        $data->validate([
            'user_fname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'user_lname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'user_address' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png'
        ], [
            'user_fname.required' => 'First name is required.',
            'user_fname.regex' => 'First name should only contain letters.',
            'user_lname.required' => 'Last name is required.',
            'user_lname.regex' => 'Last name should only contain letters.',
            'user_email.required' => 'Email is required.',
            'user_address.required' => 'Address is required.'
        ]);

        $email = session('email');
        $row = registration::where('u_mail', $email)->first();

        if ($row) {
            $row->u_name = $data->input('user_fname');
            $row->u_lname = $data->input('user_lname');
            $row->address = $data->input('user_address');

            if ($data->hasFile('profile_picture')) {
                if ($row->profile_picture && \Illuminate\Support\Facades\Storage::exists('public/profile_pictures/' . $row->profile_picture)) {
                    \Illuminate\Support\Facades\Storage::delete('public/profile_pictures/' . $row->profile_picture);
                }
                $filename = time() . '.' . $data->file('profile_picture')->extension();
                $data->file('profile_picture')->storeAs('public/profile_pictures', $filename);
                $row->profile_picture = $filename;
            }

            $row->save();
            session(['email' => $data->input('user_email')]);
        }

        // Redirect based on role
        if ($row->role === 'admin') {
            return redirect()->route('admin_profile')->with('success', 'Profile updated successfully!');
        } else {
            return redirect()->route('profile')->with('success', 'Profile updated successfully!');
        }
    }

    public function change_password(Request $data)
    {
        $data->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'conform_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Old password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters long.',
            // 'new_password.regex' => 'New password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'conform_password.required' => 'Please confirm your new password.',
            'conform_password.same' => 'The confirmation password does not match.'
        ]);

        $email = session('email');
        $row = registration::where('u_mail', $email)->first();
        if ($row) {
            $row->u_password = Hash::make($data->input('new_password'));
            $row->u_conformpassword = Hash::make($data->input('new_password'));
            $row->save();
            session()->flash('success', 'Password changed successfully.');
            return view('/user_accountpage', compact('row'));
        }

    }
    public function store1(Request $request)
    {
        // Validate the form data
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_lname' => 'required|string|max:255',
            'user_email' => 'required|email|unique:registration,u_mail',
            'user_password' => 'required|min:6',
            'user_conformpassword' => 'required|same:user_password',
            'user_roll' => 'required|string',
        ]);

        // Store the form data in the registration table
        registration::create([
            'u_name' => $request->input('user_name'),
            'u_lname' => $request->input('user_lname'),
            'u_mail' => $request->input('user_email'),
            'u_password' => bcrypt($request->input('user_password')), // Hash the password
            'u_conformpassword' => bcrypt($request->input('user_conformpassword')), // Hash the confirm password
            'role' => $request->input('user_roll'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'User added successfully!');
    }
    public function showforgotForm()
    {
        return view('forgot');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = registration::where('u_mail', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'This email does not exist in our records.']);
        }

        session(['reset_password_email' => $request->email]);

        $otp = rand(100000, 999999);
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'type' => 'required|in:single,double',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:Available,Occupied,Maintenance',
            'description' => 'required|string',
            'images' => 'required|array|min:5|max:5',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            // Start transaction
            DB::beginTransaction();

            // Create the room record
            $room = Product::create([
                'product_name' => $request->name,
                'type' => $request->type,
                'new_price' => $request->price,
                'capacity' => $request->capacity,
                'occupancy_status' => $request->status,
                'description' => $request->description,
            ]);

            // Handle image uploads
            $imageUrls = [];
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                
                // Store the image
                $image->storeAs('public/room_images', $filename);
                $imageUrls[] = 'room_images/' . $filename;
            }

            // Update the room record with image paths
            $room->update([
                'images' => json_encode($imageUrls)
            ]);

            // Commit transaction
            DB::commit();

            return redirect()->back()->with('success', 'Room added successfully!');

        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();
            
            // Delete any uploaded images
            foreach ($imageUrls ?? [] as $imageUrl) {
                Storage::delete('public/' . $imageUrl);
            }

            Log::error('Room creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add room. Please try again.');
        }
    }




    public function showOtpForm()
    {
        return view('otp-verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);


        $token = Token::where('otp', $request->otp)->first();

        if (!$token) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }


        if (Carbon::parse($token->s_time)->addMinutes(3)->isPast()) {

            $token->delete();
            return back()->withErrors(['otp' => 'OTP has expired. Please click "Resend OTP" to receive a new one.']);
        }

        return redirect()->route('password.reset');
    }

    public function resendOtp(Request $request)
    {
        $email = session('reset_password_email');

        if (!$email) {
            return redirect()->route('forgot')->withErrors(['email' => 'Email is not available. Please try again.']);
        }

        $user = registration::where('u_mail', $email)->first();

        if (!$user) {
            return redirect()->route('forgot')->withErrors(['email' => 'No user found with this email.']);
        }

        $otp = rand(100000, 999999);

        Token::updateOrCreate(
            ['email' => $email],
            [
                'token' => bin2hex(random_bytes(16)),
                'otp' => $otp,
                's_time' => Carbon::now()
            ]
        );

        Mail::to($email)->send(new OtpMail($otp));

        return back()->with('status', 'A new OTP has been sent to your email.');
    }

    public function showPasswordResetForm()
    {
        return view('password-reset');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed|min:4|max:12|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{4,12}$/',
        ], [
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 4 characters.',
            'new_password.max' => 'New password must not exceed 12 characters.',
            'new_password.regex' => 'New password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        $email = session('reset_password_email');

        if (!$email) {
            return redirect()->route('forgot')->withErrors(['email' => 'Email is not available. Please try again.']);
        }

        $user = registration::where('u_mail', $email)->first();

        if (!$user) {
            return redirect()->route('forgot')->withErrors(['email' => 'No user found with this email.']);
        }

        $user->u_password = Hash::make($request->new_password);
        $user->save();
        session()->forget('reset_password_email');

        return redirect()->route('login')->with('status', 'Password has been reset successfully!');
    }





    public function productdetails($id)
{
    $a = services::all();
    $row = product::all();
    $data = product::find($id);

    // Fetch reviews for this product
    $reviews = Review::where('product_id', $id)
        ->where('approved', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('productdetails', compact('data', 'row', 'a', 'reviews'));
}

    public function adm_index()
    {
        $users = registration::all();
        return view('adm_index', compact('users'));
    }

    public function adm_masterview()
    {
        return view('adm_masterview');
    }

    public function adm_user()
    {
        $row = registration::all();
        return view('adm_user', compact('row'));
    }

    public function adm_product()
    {
        $row = product::all();
        return view('adm_product', compact('row'));
    }

    public function adm_order()
    {
        $row = cart::all();
        return view('adm_order', compact('row'));
    }

    public function adm_review()
{
    // Fetch reviews with related user & product/room
    $reviews = Review::with(['user', 'product'])->get();

    return view('adm_review', compact('reviews'));
}

public function approve($id)
{
    $review = Review::findOrFail($id);
    $review->approved = 1;
    $review->save();

    return redirect()->back()->with('success', 'Review approved successfully!');
}

public function disapprove($id)
{
    $review = Review::findOrFail($id);
    $review->approved = 0;
    $review->save();

    return redirect()->back()->with('success', 'Review disapproved successfully!');
}



    public function form_rev()
    {
        return view('form_rev');
    }

    public function form_pro($id)
    {
        $row = product::find($id);
        if (!$row) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        return view('form_pro', compact('row'));
    }


    public function adm_add_users()
    {
        return view('adm_add_user');
    }

    public function adm_add_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30',
            'lname' => 'required|string|min:2|max:30',
            'email' => 'required|email|unique:registration,u_mail',
            'address' => 'required',
            'password' => [
                'required',
                'min:6',
                'max:20',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*]).+$/'
            ],
            'con_password' => 'required|same:password',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png',
            'role' => 'required',
            'status' => 'required'
        ]);

        $profileFileName = null;

        if ($request->hasFile('profile_picture')) {
            $profileFileName = time() . '.' . $request->file('profile_picture')->extension();
            $request->file('profile_picture')->storeAs('public/profile_pictures', $profileFileName);
        }

        registration::create([
            'u_name' => $request->name,
            'u_lname' => $request->lname,
            'u_mail' => $request->email,
            'u_password' => Hash::make($request->password),
            'u_conformpassword' => Hash::make($request->con_password),
            'address' => $request->address,
            'profile_picture' => $profileFileName,
            'role' => $request->role,
            'status' => $request->status
        ]);

        return redirect()->route('adm_user')->with('success', 'User added successfully');
    }


    public function show_add_room_form()
    {
        return view('adm_add_product');
    }

    public function add_room_form(Request $request)
    {
        try {
            // Validate basic fields first
            $request->validate([
                'name' => 'required|string|max:255',
                'capacity' => 'required|integer|min:1',
                'type' => 'required|in:single,double',
                'price' => 'required|numeric|min:0',
                'status' => ['required', Rule::in(['Available', 'Occupied', 'Maintenance'])],
                'description' => 'required|string',
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Process images
            $imagePaths = [];
            $uploadedFiles = $request->file('images');
            
            if (!is_array($uploadedFiles) || count($uploadedFiles) === 0) {
                throw new \Exception('Please upload at least one image.');
            }

            foreach ($uploadedFiles as $index => $file) {
                if (!$file || !$file->isValid()) {
                    continue;
                }

                // Create unique filename
                $fileName = $index . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                // Store the file
                $path = $file->storeAs('rooms', $fileName, 'public');
                if ($path) {
                    $imagePaths[] = $path;
                }
            }

            if (count($imagePaths) === 0) {
                throw new \Exception('Failed to upload any images. Please try again.');
            }

            // Create the product with validated data
            $product = product::create([
                'product_name' => $request->name,
                'capacity' => $request->capacity,
                'type' => $request->type,
                'new_price' => $request->price,
                'occupancy_status' => $request->status,
                'discription' => $request->description,
                'product_image' => $imagePaths // Will be automatically JSON encoded
            ]);

            if (!$product) {
                throw new \Exception('Failed to create room record.');
            }

            return redirect()->route('show_adm_product')
                ->with('success', 'Room added successfully with ' . count($imagePaths) . ' images.');

        } catch (\Exception $e) {
            // Clean up any uploaded images
            if (!empty($imagePaths)) {
                foreach ($imagePaths as $path) {
                    $fullPath = 'public/' . $path;
                    if (Storage::exists($fullPath)) {
                        Storage::delete($fullPath);
                    }
                }
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to add room. Please try again.');
        }
    }

    public function show_update_room_form($id)
    {
        $room = product::findOrFail($id);
        $images = $room->product_image ?: []; // Get images array directly thanks to the cast
        return view('edit_product', compact('room', 'images'));
    }


    public function delete_product($id)
    {
        $row = product::find($id);
        $row->delete();
        $row = product::all();
        return redirect()->route('show_adm_product')
            ->with('success', 'Product deleted successfully!');
    }

    public function update_room(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'type' => 'required|string|in:single,double',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:Available,Occupied,Maintenance',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:5',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $room = product::findOrFail($id);

        $room->product_name = $request->name;
        $room->capacity = $request->capacity;
        $room->type = $request->type;
        $room->new_price = $request->price;
        $room->occupancy_status = $request->status;
        $room->discription = $request->description;

        // Handle new images
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $file->store('rooms', 'public');
            }
            $room->product_image = json_encode($imagePaths); // store as JSON
        }

        $room->save();

        return redirect()->route('show_adm_product')
            ->with('success', 'Room details updated successfully!');
    }


    public function update_user()
    {
        $email = session('email');
        $row = registration::where('u_mail', $email)->first();
        return view('update_user', compact('row'));
    }

    public function update_user_data(Request $data)
    {

        $data->validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'address' => 'required',
            'user_mail' => 'required',

        ], [
            'first_name.required' => 'first name is required.',
            'first_name.regex' => 'first name should only contain letters',
            'last_name.required' => 'Last name is required.',
            'last_name.regex' => 'last name field should only contain letters',
            'user_mail.required' => 'email is required',
            'user_mail.email' => 'Please provide a valid email address.',
            'address.required' => 'address is required',
        ]);

        $email = session('email');
        $row = registration::where('u_mail', $email)->first();
        $previousimage = $row->profile_picture;
        if ($row) {
            $row->u_name = $data->input('first_name');
            $row->u_lname = $data->input('last_name');
            $row->u_mail = $data->input('user_mail');
            $row->address = $data->input('address');
            session(['email' => $data->input('edit_email')]);
        }

        if ($data->hasfile('profile_photo')) {
            $img = $data->file('profile_photo');
            $filename = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('img'), $filename);

            $row->profile_picture = $filename;
        }
        $row->save();
        return view('adm_profile', compact('row'));
    }

    public function adm_change_password()
    {
        return view('adm_change_password');
    }

    public function adm_changepassword(Request $data)
    {
        $data->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'conform_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Old password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters long.',
            // 'new_password.regex' => 'New password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'conform_password.required' => 'Please confirm your new password.',
            'conform_password.same' => 'The confirmation password does not match.'
        ]);

        $email = session('email');
        $row = registration::where('u_mail', $email)->first();
        if ($row) {
            $row->u_password = Hash::make($data->input('new_password'));
            $row->u_conformpassword = Hash::make($data->input('new_password'));
            $row->save();
            session()->flash('success', 'Password changed successfully.');
            return view('/adm_profile', compact('row'));
        }
    }

    public function delete_user($id)
    {
        $row = registration::find($id);
        $row->delete();
        $row = registration::all();
        return redirect()->route('adm_index')->with('success', 'User Deleted Successfully');
    }

    public function activate($email)
    {
        $row = registration::where('u_mail', $email)->first();
        $row->status = 'active';
        $row->save();
        return redirect('/show_login')->with('status', "Account activated Succesfully");
    }

    public function adm_activate($email)
    {
        $row = registration::where('u_mail', $email)->first();
        $row->status = 'active';
        $row->save();
        return redirect('/show_login')->with('status', "Account activated Succesfully");
    }

    public function logout()
    {
        session()->forget('email');
        return redirect()->route('login')->with('success', 'Logout Successfully');

    }


    public function order_history()
    {
        return view('adm_orderhis');
    }

    public function profile()
    {
        $email = session('email');
        $row = registration::where('u_mail', $email)->first();
        return view('profile', compact('row'));
    }

    public function adm_profile()
    {
        $row = registration::where('role', 'admin')->first();
        return view('adm_profile', compact('row'));
    }


    public function data()
    {
        $row = services::all();
        $data = image::all();
        return view('adm_data', compact('row', 'data'));
    }

    public function update_service($id)
    {
        $row = services::find($id);
        if (!$row) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        return view('update_service', compact('row'));
    }


    public function update_service_data(Request $data)
    {
        $row = services::find($data->s_id);
        $row->title = $data->service_name;
        $row->description = $data->service_discription;

        $previousimage = $row->image;
        if ($data->hasfile('service_photo')) {
            $img = $data->file('service_photo');
            $filename = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('img'), $filename);


            $row->image = $filename;
        }

        $row->save();
        $row = services::all();
        $data = image::all();
        return view('adm_data', compact('row', 'data'));
    }

    public function update_background($id)
    {
        $row = services::find($id);
        if (!$row) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        return view('update_background', compact('row'));
    }

    public function update_backgound_data(Request $data)
    {
        $row = image::find($data->b_id);

        $previousimage = $row->background_image;
        if ($data->hasfile('background_photo')) {
            $img = $data->file('background_photo');
            $filename = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('img'), $filename);


            $row->background_image = $filename;
        }

        $row->save();
        $data = image::all();
        $row = services::all();
        return view('adm_data', compact('data', 'row'));
    }
    public function showContactForm()
    {
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000'
        ], [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a valid string.',
            'name.max' => 'Name must not exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'message.required' => 'Message is required.',
            'message.string' => 'Message must be a valid string.',
            'message.max' => 'Message must not exceed 1000 characters.'
        ]);

        // Save to database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'textarea' => $request->message
        ]);

        // Send email
        Mail::to($request->email)->send(new ContactMail($request->name, $request->message));

        return back()->with('success', 'Your message has been sent. A confirmation email has been sent to your email.');
    }

    public function booking(Request $request)
    {

        $email = session('email');
        if (!$email) {
            return redirect()->route('login')->with('error', 'You must be logged in to book a room.');
        }

        $today = date('Y-m-d');
        $request->validate([
            'product_id' => 'required|exists:product,id',
            'phone' => 'required|digits_between:10,15',
            'checkin' => 'required|date|after_or_equal:' . $today,
            'checkout' => 'required|date|after:checkin',
            'nights' => 'required|integer|min:1',
            'total' => 'required',

        ], [
            'checkin.required' => 'Please select a check-in date.',
            'checkin.date' => 'Check-in date must be a valid date.',
            'checkin.after_or_equal' => 'Check-in date cannot be in the past.',
            'checkout.required' => 'Please select a check-out date.',
            'checkout.date' => 'Check-out date must be a valid date.',
            'checkout.after' => 'Check-out date must be after the check-in date.',
            'phone.required' => 'Please enter your phone number.',
            'phone.digits_between' => 'Phone number must be between 10 and 15 digits.',
            'nights.required' => 'Number of nights is required.',
            'nights.integer' => 'Number of nights must be a number.',
            'nights.min' => 'Number of nights must be at least 1.',
            'total.required' => 'Total price is required.',

            'product_id.required' => 'Product information is missing.',
            'product_id.exists' => 'Selected product does not exist.',
        ]);


      


        Booking::create([
            'product_id' => $request->input('product_id'),
            'phone' => $request->input('phone'),
            'checkin' => $request->input('checkin'),
            'checkout' => $request->input('checkout'),
            'nights' => $request->input('nights'),
            'total' => $request->input('total'),
            'user_id' => Auth::id()
        ]);

        session(['room_id' => $request->input('product_id')]);
        return redirect()->route('show_payment')->with('success', 'Room booked successfully! Please proceed to payment.');

    }


    public function adm_show_booking()
{
    // fetch all bookings with user & room details
    $bookings = Booking::with(['user', 'room'])->get();

    return view('room_booking', compact('bookings'));
}

    public function show_payment()
    {
        $booking = Booking::where('product_id', session('room_id'))->latest()->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Ensure $booking is an object and has product_id
        $productId = is_object($booking) ? $booking->product_id : null;
        $room_data = $productId ? product::where('id', $productId)->first() : null;

        session(['room_id' => $booking->product_id]);
        session(['nights' => $booking->nights]);
        session(['total_amount' => $booking->total]);

        return view('payment', [
            'room_data' => $room_data,
            'booking' => $booking
        ]);
    }



    
    public function pay(Request $request)
    {
       
        $request->validate([
            'total_amount' => 'required|numeric|min:1',
            'email' => 'required|email',
        ]);

        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET')); 

            $orderData = [
                'receipt'         => 'room_rcpt_' . time(),
                'amount'          => $request->total_amount * 100,
                'currency'        => 'INR'
            ];

            $razorpayOrder = $api->order->create($orderData);

            $data = [
                "key"               => env('RAZORPAY_KEY'),
                "amount"            => $orderData['amount'],
                "order_id"          => $razorpayOrder['id'],
                "name"              => "Hotel LordsInn",
                "description"       => "Room Booking Payment",
                "prefill"           => [
                    "email"         => $request->email,
                ],
                
            ];

            return response()->json($data);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function callback(Request $request)
    {
        $input = $request->all();

        if ($request->has('razorpay_payment_id')) {
            payment::create([
                'user_id' => auth()->id(),
                'room_id' => session('room_id'),
                'payment_id' => $input['razorpay_payment_id'],
                'email' => session('email'),
                'nights' => session('nights'),
                'amount' => session('total_amount'),
                'status' => 'success'
            ]);

             return redirect()->route('payment.success')->with('success', 'Payment successful!');
        }

        return redirect()->route('home')->with('error', 'Payment failed!');
    }

    public function success_payment()
    {
        return view('pay_success');
    }


    public function submitReview(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        Review::create([
        'product_id' => $id,
        'email'      => $request->email,
        'rating'     => $request->rating,
        'review'     => $request->review,
        'user_id'    => Auth::id(),
        'approved'   => 0 // 👈 insert default value here
    ]);


        return redirect()->route('product.show', $id)
                     ->with('success', 'Review added successfully!');
    }

 public function show($id)
    {
        // Get the main product data
        $data = Product::findOrFail($id);
        
        // Get related images (assuming this is for image gallery)
        $row = Product::where('product_name', $data->product_name)->get();
        
        // Get reviews for this specific product
        $reviews = Review::where('product_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        // Pass all data to the view
        return view('productdetails', compact('data', 'row', 'reviews'));
        // Replace 'product.details' with your actual view name
    }


 
    public function adm_banner_list()
    {
        $banners = Slider::all();
        return view('adm_banner', compact('banners'));
    }


    public function adm_delete_banner($id)
    {
        $banner = Slider::find($id);
        $banner->delete();
        $banners = Slider::all();
        return redirect()->route('show_banner')->with('success', 'Banner image delted successfully');
    }

    public function adm_show_add_banner()
    {
        return view('adm_add_banner');
    }

    public function adm_add_banner(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|mimes:jpg,png,jpeg,webp'
        ]);


        $originalName = pathinfo($request->banner_image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->banner_image->getClientOriginalExtension();
        $fileName = $originalName . '_' . time() . '.' . $extension;
        $request->banner_image->storeAs('public/banners', $fileName);



        Slider::create([
            'slider_image' => $fileName,
        ]);


        return redirect()
            ->route('show_banner')
            ->with('success', 'Banner uploaded successfully');

    }

    public function adm_show_edit_banner($id)
    {
        $banner = Slider::find($id);
        return view('adm_edit_banner', compact('banner'));
    }

    public function adm_edit_banner($id, Request $request)
    {
        $request->validate([
            'banner_image' => 'required|mimes:jpg,png,jpeg,webp|max:2048'
        ]);

        $banner = slider::findOrFail($id);


        if ($banner->slider_image &&Storage::exists("public/banners/{$banner->slider_image}")) {
            Storage::delete("public/banners/{$banner->slider_image}");
        }

        $originalName = pathinfo($request->banner_image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->banner_image->getClientOriginalExtension();
        $fileName = $originalName . '_' . time() . '.' . $extension;
        $request->banner_image->storeAs('public/banners', $fileName);
        $banner->slider_image = $fileName;
        $banner->save();

        return redirect()
            ->route('show_banner')
            ->with('success', 'Banner updated successfully');
    }

    public function adm_blog_list()
    {
        $blogs = Blog::all();
        return view('adm_blog', compact('blogs'));
    }

    public function adm_show_add_blog()
    {
        return view('adm_add_blog');
    }

    public function adm_add_blog(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'published' => 'required|date',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
        ]);


        $originalName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->image->getClientOriginalExtension();
        $imageName = $originalName . '_' . time() . '.' . $extension;

        $request->image->storeAs('public/blogs', $imageName);

        Blog::create([
            'slug' => $request->slug,
            'name' => $request->name,
            'published_at' => $request->published,
            'image' => $imageName,
        ]);

        return redirect()->route('show_blog')->with('success', 'Blog added successfully!');
    }

    public function adm_delete_blog($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('show_blog')->with('success', 'Blog deleted successfully');
    }

    public function adm_show_edit_blog(Request $request, $id)
    {
        $blog = Blog::find($id);
        return view('adm_edit_blog', compact('blog'));
    }

    public function adm_edit_blog(Request $request, $id)
    {

        $request->validate([
            'slug' => "required|string|max:255",
            'name' => 'required|string|max:255',
            'published' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);


        $blog = Blog::findOrFail($id);

        $blog->slug = $request->slug;
        $blog->name = $request->name;
        $blog->published_at = $request->published;


        if ($request->hasFile('image')) {

            if ($blog->image && Storage::exists("public/blogs/{$blog->image}")) {
                Storage::delete("public/blogs/{$blog->image}");
            }

            $originalName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $fileName = $originalName . '_' . time() . '.' . $extension;
            $request->image->storeAs('public/blogs', $fileName);
            $blog->image = $fileName;

        }


        $blog->save();

        return redirect()->route('show_blog')->with('success', 'Bolg edited successfully');

    }

    public function adm_home_content_list()
    {
        $home_content = HomeContent::all();
        return view('adm_home_content', compact('home_content'));
    }

    public function adm_delete_home_content($id)
    {
        $home_content = HomeContent::find($id);
        $home_content->delete();

        return redirect()->route('show_home_content')->with('success', "Home content deleted successfully");
    }

    public function adm_show_add_home_content()
    {
        return view('adm_add_home_content');
    }

    public function adm_add_home_content(Request $request)
    {
        $request->validate([
            'section_title' => 'required|string|max:255',
            'hotel_name' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'side_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        $mainName = pathinfo($request->main_image->getClientOriginalName(), PATHINFO_FILENAME);
        $mainExt = $request->main_image->getClientOriginalExtension();
        $mainImageName = $mainName . '_' . time() . '.' . $mainExt;
        $request->main_image->storeAs('public/hotel_images', $mainImageName);


        $sideName = pathinfo($request->side_image->getClientOriginalName(), PATHINFO_FILENAME);
        $sideExt = $request->side_image->getClientOriginalExtension();
        $sideImageName = $sideName . '_' . time() . '.' . $sideExt;
        $request->side_image->storeAs('public/hotel_images', $sideImageName);


        HomeContent::create([
            'section_title' => $request->section_title,
            'hotel_name' => $request->hotel_name,
            'description' => $request->description,
            'main_image' => $mainImageName,
            'side_image' => $sideImageName,
        ]);

        return redirect()->route('show_home_content')->with('success', 'Hotel section added successfully!');
    }

    public function adm_show_edit_home_content($id)
    {
        $content = HomeContent::find($id);
        return view('adm_edit_home_content', compact('content'));
    }

    public function adm_edit_home_content(Request $request, $id)
    {
        $section = HomeContent::findOrFail($id);

        $request->validate([
            'section_title' => 'required|string|max:255',
            'hotel_name' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'side_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Upload main image if new one is provided
        if ($request->hasFile('main_image')) {
            $mainName = pathinfo($request->main_image->getClientOriginalName(), PATHINFO_FILENAME);
            $mainExt = $request->main_image->getClientOriginalExtension();
            $mainImageName = $mainName . '_' . time() . '.' . $mainExt;
            $request->main_image->storeAs('public/hotel_images', $mainImageName);
            $section->main_image = $mainImageName;
        }

        // Upload side image if new one is provided
        if ($request->hasFile('side_image')) {
            $sideName = pathinfo($request->side_image->getClientOriginalName(), PATHINFO_FILENAME);
            $sideExt = $request->side_image->getClientOriginalExtension();
            $sideImageName = $sideName . '_' . time() . '.' . $sideExt;
            $request->side_image->storeAs('public/hotel_images', $sideImageName);
            $section->side_image = $sideImageName;
        }

        // Update text fields
        $section->section_title = $request->section_title;
        $section->hotel_name = $request->hotel_name;
        $section->description = $request->description;
        $section->save();

        return redirect()->route('show_home_content')->with('success', 'Hotel section updated successfully!');
    }

    public function adm_about_section_list()
    {
        $aboutsections = AboutSections::all();
        $aboutservices = AboutServies::all();
        $bgimage = VideoSection::all();
        return view('adm_about_section', compact('aboutsections', 'aboutservices', 'bgimage'));
    }

    public function adm_delete_about_section($id)
    {
        AboutSections::findOrFail($id)->delete();
        return redirect()->route('show_about_section')->with('success', 'Service Deleted Successfully');

    }

    public function adm_show_add_about_section()
    {
        return view('adm_add_about_section');
    }

    public function adm_add_about_section(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'service_list' => 'required|array'
        ]);

        AboutSections::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'service_list' => $validated['service_list']
        ]);

        return redirect()->route('show_about_section')->with('success', 'Service Added Successfully');
    }

    public function adm_show_edit_about_section($id)
    {
        $section = AboutSections::find($id);
        return view('adm_edit_about_section', compact('section'));
    }

    public function adm_edit_about_section(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'service_list' => 'required|array',
            'service_list.*' => 'required|string|max:255'
        ]);

        $section = AboutSections::findOrFail($id);
        $section->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'service_list' => $validated['service_list'],
        ]);

        return redirect()->route('show_about_section')->with('success', 'About section updated successfully!');
    }

    public function adm_delete_about_service($id)
    {
        AboutServies::find($id)->delete();
        return redirect()->route('show_about_section')->with('success', 'service deleted successfully');
    }

    public function adm_show_add_about_service()
    {
        return view('adm_add_about_services');
    }

    public function adm_add_about_service(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $fileName = null;
        if ($request->hasFile('image')) {
            $originalName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $fileName = $originalName . '_' . time() . '.' . $extension;
            $request->image->storeAs('public/services', $fileName);
        }

        AboutServies::create([
            'title' => $request->title,
            'image' => $fileName,
        ]);

        return redirect()->route('show_about_section')->with('success', 'Service added successfully.');
    }

    public function adm_show_edit_about_service($id)
    {
        $service = AboutServies::find($id);
        return view('adm_edit_about_services', compact('service'));
    }

    public function adm_edit_about_service(Request $request, $id)
    {
        $service = AboutServies::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $originalName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->image->extension();
            $fileName = $originalName . '_' . time() . '.' . $extension;
            $request->image->storeAs('public/services', $fileName);
            $service->image = $fileName;
        }

        $service->title = $request->title;
        $service->save();

        return redirect()->route('show_about_section')->with('success', 'Service updated successfully.');
    }

    public function adm_delete_background_image($id)
    {
        VideoSection::findOrFail($id)->delete();
        return redirect()->route('show_about_section')->with('success', 'Hotel service deleted successfully.');
    }

    public function adm_show_add_background_image()
    {
        return view('adm_add_background_image');
    }

    public function adm_add_background_image(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'background_image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $fileName = null;
        if ($request->hasFile('background_image')) {
            $originalName = pathinfo($request->background_image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->background_image->getClientOriginalExtension();
            $fileName = $originalName . '_' . time() . '.' . $extension;
            $request->background_image->storeAs('public/backgrounds', $fileName);
        }

        VideoSection::create([
            'title' => $request->title,
            'description' => $request->description,
            'background_image' => $fileName,
        ]);

        return redirect()->route('show_about_section')->with('success', 'Hotel service added successfully.');
    }

    public function adm_show_edit_background_image($id)
    {
        $image = VideoSection::findOrFail($id);
        return view('adm_edit_background_image', compact('image'));
    }

    public function adm_edit_background_image(Request $request, $id)
    {
        $service = VideoSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('background_image')) {
            $originalName = pathinfo($request->background_image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->background_image->getClientOriginalExtension();
            $fileName = $originalName . '_' . time() . '.' . $extension;
            $request->background_image->storeAs('public/backgrounds', $fileName);
            $service->background_image = $fileName;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('show_about_section')->with('success', 'Hotel service updated successfully.');
    }

     
       
}





