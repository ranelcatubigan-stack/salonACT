<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Management</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
  <h1>Payment Management</h1>

  <!-- ===================== -->
  <!-- ✅ PAYMENT FORM -->
  <!-- ===================== -->
  <form action="/payments" method="POST" class="service-form">
    @csrf

    <div class="form-group">
      <label for="appointment_id">Booking:</label>
      <select name="appointment_id" id="appointment_id">
        <option value="">Select Booking</option>
        @foreach($appointments as $appointment)
          <option value="{{ $appointment->id }}">
            Booking #{{ $appointment->id }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="amount">Amount:</label>
      <input type="text" id="amount" name="amount">
    </div>

    <button type="submit" class="btn-submit">Pay</button>
  </form>

  <hr>

  <!-- ===================== -->
  <!-- ✅ PAYMENT TABLE -->
  <!-- ===================== -->
  <table class="service-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Booking</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach($payments as $payment)
      <tr>
        <td>{{ $payment->id }}</td>
        <td>Booking #{{ $payment->appointment_id }}</td>
        <td>{{ $payment->amount }}</td>
        <td>{{ $payment->status }}</td>
        <td>{{ $payment->payment_date }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>