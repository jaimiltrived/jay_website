<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jwellry;

//website page
Route::get('/', [jwellry::class, 'index']);
Route::get('/contact', [Jwellry::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [jwellry::class, 'submitContactForm'])->name('contact.submit');
Route::get('/productdetails/{id}', [jwellry::class, 'productdetails'])->name('product_details');
Route::get('/shop', [jwellry::class, 'shop'])->name('shop');
Route::get('/about', [jwellry::class, 'about']);
Route::get('/search', [jwellry::class, 'search'])->name('search');


//adm pages
Route::get('/adm_masterview', [jwellry::class, 'adm_masterview']);
Route::get('/adm_product', [jwellry::class, 'adm_product'])->name(name: 'show_adm_product');
Route::get('/adm_order', [jwellry::class, 'adm_order']);
Route::get('/adm_review', [jwellry::class, 'adm_review']);
Route::get('/form_rev', [jwellry::class, 'form_rev']);
Route::get('/productpage', [jwellry::class, 'productpage']);
Route::get('/form_pro/{id}', [jwellry::class, 'form_pro'])->name('update_pro');






Route::get('/activate/{email}', [jwellry::class, 'activate'])->name('activate');
Route::get('/adm_activate/{email}', [jwellry::class, 'activate'])->name('adm_activate');
Route::get('form', [jwellry::class, 'form']);

// Route::get('adm_data', [jwellry::class, 'data']);
// Route::get('/update_service/{id}', [jwellry::class, 'update_service'])->name('update_service');
// Route::post('update_service_data', [jwellry::class, 'update_service_data']);
// Route::get('/update_background/{id}', [jwellry::class, 'update_background'])->name('update_background');
// Route::post('/update_backgound_data', [jwellry::class, 'update_backgound_data']);


//room book
Route::post('/rooms/store', [jwellry::class, 'storeRoom'])->name('rooms_store');
Route::post('/book-room', [jwellry::class, 'booking'])->name('book.room');
Route::get('/adm_booking', [jwellry::class, 'adm_show_booking']);
Route::get('/product/{id}', [jwellry::class, 'show'])->name('product.show');



//razorpay
Route::get('/show_payment', [jwellry::class, 'show_payment'])->name('show_payment');
Route::post('/razorpay/pay', [jwellry::class, 'pay'])->name('razorpay.pay');
Route::post('/razorpay/callback', [jwellry::class, 'callback'])->name('razorpay.callback');
Route::get('/payment_success', [jwellry::class, 'success_payment'])->name('payment.success');

//review and rating
Route::post('/product/{id}/review', [jwellry::class, 'submitReview'])->name('product.review');
Route::get('/products', [jwellry::class, 'search'])->name('products.index');


//authentication
Route::get('/customer_login', [jwellry::class, 'showLoginForm'])->name('login');
Route::post('/customerlogin', [jwellry::class, 'login'])->name('customer.login');
Route::get('/register', [jwellry::class, 'showregisterForm'])->name('register');
Route::post('/register', [jwellry::class, 'register']);
Route::get('/logout', [jwellry::class, 'logout'])->name('logout');
Route::get('/profile', [jwellry::class, 'profile'])->name('profile');
Route::post('/edit_profile', [jwellry::class, 'edit_profile']);
Route::post('/change_password', [jwellry::class, 'change_password']);
Route::get('/otp-verify', [jwellry::class, 'showOtpForm'])->name('otp.verify');
Route::post('/otp-verify', [jwellry::class, 'verifyOtp']);
Route::get('/password-reset', [jwellry::class, 'showPasswordResetForm'])->name('password.reset');
Route::post('/password-update', [jwellry::class, 'updatePassword'])->name('password.update');
Route::post('/otp/resend', [jwellry::class, 'resendOtp'])->name('otp.resend');
Route::get('/forgot', [jwellry::class, 'showforgotForm'])->name('forgot');
Route::post('/forgot', [jwellry::class, 'forgot']);

//admin
Route::get('/adm_index', [jwellry::class, 'adm_index'])->name('adm_index');

//add user
Route::get('/adm_user', [jwellry::class, 'adm_user'])->name('adm_user');
Route::get('/delete_user/{id}', [jwellry::class, 'delete_user'])->name('delete_user');
Route::get('/update_user', [jwellry::class, 'update_user'])->name('update_user');
Route::post('/update_user_data', [jwellry::class, 'update_user_data']);
Route::get('/edit', [jwellry::class, 'edit']);
Route::get('/adm_add_user', [jwellry::class, 'adm_add_users'])->name('adm_add_user');
Route::post('adm_add_user', [jwellry::class, 'adm_add_user'])->name('adm_add_user');


//add room , update room and delete room
Route::get('/adm_add_product', [jwellry::class, 'show_add_room_form'])->name('show_add_room_form');
Route::post('/adm_add_product', [jwellry::class, 'add_room_form'])->name('rooms_store');
Route::get('update_room_form/{id}', [jwellry::class, 'show_update_room_form'])->name('show_update_room_form');
Route::post('update_room/{id}', [jwellry::class, 'update_room'])->name('update_room');
Route::post('update_product', [jwellry::class, 'update_product']);
Route::get('/delete_product/{id}', [jwellry::class, 'delete_product'])->name('delete');


//admin_profile
Route::get('adm_change_password', [jwellry::class, 'adm_change_password']);
Route::post('adm_changepassword', [jwellry::class, 'adm_changepassword']);
Route::get('adm_profile', [jwellry::class, 'adm_profile'])->name('admin_profile');
Route::get('adm_edit_profile', [jwellry::class, 'adm_edit_profile'])->name('adm_edit_profile');


//admin dynamic contnet

//banner
Route::get('adm_banner', [jwellry::class, 'adm_banner_list'])->name('show_banner');
Route::get('delete_banner/{id}', [jwellry::class, 'adm_delete_banner'])->name('delete_banner');
Route::get('adm_add_banner', [jwellry::class, 'adm_show_add_banner'])->name('adm_show_add_banner');
Route::post('add_banner', [jwellry::class, 'adm_add_banner'])->name('add_new_banner');
Route::post('edit_banner/{id}', [jwellry::class, 'adm_edit_banner'])->name('edit_banner');
Route::get('adm_edit_banner/{id}', [jwellry::class, 'adm_show_edit_banner'])->name('adm_edit_baner_show_form');



//blog
Route::get('adm_blog', [jwellry::class, 'adm_blog_list'])->name('show_blog');
Route::get('delete_blog/{id}', [jwellry::class, 'adm_delete_blog'])->name('delete_blog');
Route::get('adm_edit_blog/{id}', [jwellry::class, 'adm_show_edit_blog'])->name('adm_edit_blog_show_form');
Route::post('edit_blog/{id}', [jwellry::class, 'adm_edit_blog'])->name('edit_blog');
Route::get('adm_add_blog', [jwellry::class, 'adm_show_add_blog'])->name('adm_show_add_blog');
Route::post('add_blog', [jwellry::class, 'adm_add_blog'])->name('add_new_blog');


//about
Route::get('adm_home_content', [jwellry::class, 'adm_home_content_list'])->name('show_home_content');
Route::get('delete_home_content/{id}', [jwellry::class, 'adm_delete_home_content'])->name('delete_home_content');
Route::get('adm_add_home_content', [jwellry::class, 'adm_show_add_home_content'])->name('adm_show_add_home_content');
Route::post('add_home_content', [jwellry::class, 'adm_add_home_content'])->name('add_new_home_content');
Route::get('adm_edit_home_content/{id}', [jwellry::class, 'adm_show_edit_home_content'])->name('adm_edit_home_content_show_form');
Route::post('home_content/{id}', [jwellry::class, 'adm_edit_home_content'])->name('edit_home_content');


//about service
Route::get('adm_about_section', [jwellry::class, 'adm_about_section_list'])->name('show_about_section');
Route::get('delete_about_section/{id}', [jwellry::class, 'adm_delete_about_section'])->name('delete_about_section');
Route::get('adm_add_about_section', [jwellry::class, 'adm_show_add_about_section'])->name('adm_show_add_about_section');
Route::post('add_about_section', [jwellry::class, 'adm_add_about_section'])->name('add_new_about_section');
Route::get('adm_edit_about_section/{id}', [jwellry::class, 'adm_show_edit_about_section'])->name('adm_edit_about_section_show_form');
Route::post('about_section/{id}', [jwellry::class, 'adm_edit_about_section'])->name('edit_about_section');

//about services
Route::get('delete_about_service/{id}', [jwellry::class, 'adm_delete_about_service'])->name('delete_about_service');
Route::get('adm_add_about_service', [jwellry::class, 'adm_show_add_about_service'])->name('adm_show_add_about_service');
Route::post('add_about_service', [jwellry::class, 'adm_add_about_service'])->name('add_new_about_service');
Route::get('adm_edit_about_service/{id}', [jwellry::class, 'adm_show_edit_about_service'])->name('adm_edit_about_service_show_form');
Route::post('about_service/{id}', [jwellry::class, 'adm_edit_about_service'])->name('edit_about_service');

//video-bg
Route::get('delete_background_image/{id}', [jwellry::class, 'adm_delete_background_image'])->name('delete_background_image');
Route::get('adm_add_background_image', [jwellry::class, 'adm_show_add_background_image'])->name('adm_show_add_background_image');
Route::post('add_background_image', [jwellry::class, 'adm_add_background_image'])->name('add_new_background_image');
Route::get('adm_edit_background_image/{id}', [jwellry::class, 'adm_show_edit_background_image'])->name('adm_edit_background_image_show_form');
Route::post('background_image/{id}', [jwellry::class, 'adm_edit_background_image'])->name('edit_background_image');

Route::get('/reviews/{id}/approve', [jwellry::class, 'approve'])->name('reviews.approve');
Route::get('/reviews/{id}/disapprove', [jwellry::class, 'disapprove'])->name('reviews.disapprove');

