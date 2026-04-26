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
  <form action="/payments123" method="POST" class="service-form">
  @csrf

  <div class="form-group">
    <label for="appointment_id">Booking:</label>
    <select name="appointment_id" id="appointment_id">
      <option value="">Select Booking</option>
      @foreach($appointments as $appointment)
        <option value="{{ $appointment->id }}">
        {{ $appointment->service->service_name }} - Appointment {{ $appointment->id }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Bill:</label>
    <div id="billBox">
        <p>Select a booking to see bill</p>
    </div>

    <!-- hidden input to send amount -->
    <input type="hidden" name="amount" id="amount">
</div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="pay" value="1" required>
      I confirm payment
    </label>
  </div>

  <button type="submit" class="btn-submit">Pay Now</button>
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

<script>
let appointments = @json($appointments);

document.getElementById('appointment_id').addEventListener('change', function () {
    let id = this.value;

    let appointment = appointments.find(a => a.id == id);

    if (appointment && appointment.service) {

        let price = appointment.service.service_price;

        document.getElementById('billBox').innerHTML =
            "<p><b>Service:</b> " + appointment.service.service_name + "</p>" +
            "<p><b>Price:</b> ₱" + price + "</p>";

        document.getElementById('amount').value = price;

    } else {
        document.getElementById('billBox').innerHTML =
            "<p>Select a booking to see bill</p>";

        document.getElementById('amount').value = "";
    }
});
</script>