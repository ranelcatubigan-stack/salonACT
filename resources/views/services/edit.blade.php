<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Management</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>



<div class="container">
  <h1>Service Management</h1>

  <form action="/services/{{$Sstore->id}}" method="POST" class="service-form">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="service_name">Name:</label>
      <input type="text" id="service_name" name="service_name123" value="{{$Sstore->service_name}}">
    </div>

    <div class="form-group">
      <label for="service_description">Description:</label>
      <textarea id="service_description" name="service_description123">{{$Sstore->service_description}}</textarea>
    </div>

    <div class="form-group">
      <label for="service_price">Price:</label>
      <input type="text" id="service_price" name="service_price123" value="{{$Sstore->service_price}}">
    </div>

    <div class="form-group">
      <label for="service_duration">Duration:</label>
      <input type="text" id="service_duration" name="service_duration123" value="{{$Sstore->service_duration}}">
    </div>

    <button type="submit" class="btn-submit">Update</button>
  </form>


</div>
</body>
</html>