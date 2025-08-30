<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Four Field Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit</h2>
    <form method="post" action="/update_user_data" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Enter product name">Enter First Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Your First Name" required name="first_name">

        </div>
        <div class="form-group">
            <label for="Enter last Name">Enter Last Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Your Last Name" required name="last_name">
    
        </div>
        <div class="form-group">
            <label for="Email">Enter User Mail:</label>
            <input type="text" class="form-control" id="Email" placeholder="Email" required name="user_mail">
        </div>
        <div class="form-group">
            <label for="address">Enter User Mail:</label>
            <input type="text" class="form-control" id="address" placeholder="address" required name="address">
        </div>
        {{-- <div class="form-group">
            <label for="field4">Field 4</label>
            <input type="text" class="form-control" id="field4" placeholder="Enter Field 4" required>
        </div> --}}
        <div class="form-group">
            <label for="address">Enter Profile Picture:</label>
            <input type="file" class="form-control" id="profile_photo" required name="profile_photo">
        </div>
       <input type="submit" value="Update" class="btn btn-primary">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
