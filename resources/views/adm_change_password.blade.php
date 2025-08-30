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
    <h2>Change Password</h2>
    <form method="post" action="/adm_changepassword" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Enter Old Password</label>
            <input type="password" class="form-control" id="old_password" placeholder="Old password" required name="old_password">

        </div>
        <div class="form-group">
            <label>Enter New Password</label>
            <input type="password" class="form-control" id="new_password" placeholder="New password" required name="new_password">
    
        </div>
        <div class="form-group">
            <label>Enter conform Password</label>
            <input type="password" class="form-control" id="conform_password" placeholder="Conform password" required name="conform_password">
        </div>
       <input type="submit" value="Change Password" class="btn btn-primary">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
