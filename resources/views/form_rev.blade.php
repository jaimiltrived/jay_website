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
    <form>
        <div class="form-group">
            <label for="Enter product name">Enter product name:</label>
            <input type="text" class="form-control" id="field1" placeholder="Enter product name" required>
        </div>
        <div class="form-group">
            <label for="Rating">Rating</label>
            <input type="text" class="form-control" id="field2" placeholder="Rating" required>
        </div>
        {{-- <div class="form-group">
            <label for="field3">Field 3</label>
            <input type="text" class="form-control" id="field3" placeholder="Enter Field 3" required>
        </div>
        <div class="form-group">
            <label for="field4">Field 4</label>
            <input type="text" class="form-control" id="field4" placeholder="Enter Field 4" required>
        </div> --}}
       <a href="\review"> <button type="submit" class="btn btn-primary">Submit</button></a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
