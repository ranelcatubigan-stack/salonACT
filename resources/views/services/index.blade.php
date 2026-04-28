<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Management</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>



  <h1>Service Management</h1>
  <button class="btn-submit" onclick="window.location.href='/appointments'">Appointment</button>
  <button class="btn-submit" onclick="window.location.href='/payments'">Payment</button>

  <form action="/services123" method="POST" class="service-form">
    @csrf

    <div class="form-group">
      <label for="service_name">Name:</label>
      <input type="text" id="service_name" name="service_name123">
    </div>

    <div class="form-group">
      <label for="service_description">Description:</label>
      <textarea id="service_description" name="service_description123"></textarea>
    </div>

    <div class="form-group">
      <label for="service_price">Price:</label>
      <input type="text" id="service_price" name="service_price123">
    </div>

    <div class="form-group">
      <label for="service_duration">Duration:</label>
      <input type="text" id="service_duration" name="service_duration123">
    </div>

    <button type="submit" class="btn-submit">Save</button>
  </form>


  <hr>

  <table class="service-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Duration (minutes)</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Sstore as $Sstores)
      <tr>
        <td>{{ $Sstores->id }}</td>
        <td>{{ $Sstores->service_name }}</td>
        <td>{{ $Sstores->service_description }}</td>
        <td>{{ $Sstores->service_price }}</td>
        <td>{{ $Sstores->service_duration }}</td>
        <td>
          <a href="/services/{{ $Sstores->id }}/edit">Edit</a>
          <form action="/services/{{ $Sstores->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>



</body>
</html>