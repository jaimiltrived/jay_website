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
    <form method="post" action="/update_service_data" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Enter product name">Enter Service Name:</label>
            <input type="hidden" value="{{$row->id}}" name="s_id">
            <input type="text" class="form-control" id="name" placeholder="Enter Service Name" required name="service_name">

        </div>

        <div class="form-group">
            <label for="Enter last Name">Enter Service Discription</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Service Discription" required name="service_discription">
    
        </div>

        <div class="form-group">
            <label for="address">Enter Profile Picture:</label>
            <input type="file" class="form-control" required name="service_photo">
        </div>
       <input type="submit" value="Update" class="btn btn-primary">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
