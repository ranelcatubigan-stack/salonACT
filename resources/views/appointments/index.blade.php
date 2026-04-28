
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment Management</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
  <h1>Appointment Management</h1>
  <button class="btn-submit" onclick="window.location.href='/payments'">Payment</button>
  <button class="btn-submit" onclick="window.location.href='/services'">Service</button>
  <form action="/appointments123" method="POST" class="appointment-form">
    @csrf
    <div class="form-group">
      <label for="customer_name">Customer Name</label>
      <input type="text" id="customer_name" name="customer_name123" placeholder="e.g. Jane Doe">
    </div>

    <div class="form-group">
      <label for="contact_info">Contact Information</label>
      <input type="text" id="contact_info" name="contact_info123" placeholder="Phone or Email">
    </div>

    <div class="form-group">
      <label for="service_id">Service</label>
      <select name="service_id123" id="service_id" required>
        <option value="">Select a Treatment</option>
        @foreach($Sstore as $Sstores)
          <option value="{{ $Sstores->id}}">{{ $Sstores->service_name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="date_time">Date and Time</label>
      <input type="datetime-local" id="date_time" name="date_time123">
    </div>

    <button type="submit" class="btn-submit">Book Appointment</button>
  </form>

  <table class="service-table">
    <thead>
      <tr>
        <th>Client</th>
        <th>Service</th>
        <th>Date & Time</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Astore as $Astores)
      <tr>
        <td><strong>{{ $Astores->customer_name }}</strong></td>
        <td>{{ $Astores->service->service_name }}</td> <td>{{ date('M d, Y | h:i A', strtotime($Astores->date_time)) }}</td>
        <td class="price-tag">₱{{ number_format($Astores->service->service_price, 2) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  
</body>
</html>