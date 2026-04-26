<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Show payment list
    public function index()
    {
        $payments = Payment::all();

    // IMPORTANT: load service relationship
        $appointments = Appointment::with('service')->get();

        return view('payments.index', compact('payments', 'appointments'));
    }

    // Show payment form
    public function create($appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        return view('payments.create', compact('appointment'));
    }

    // Store payment
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric',
            'pay' => 'required'
        ]);

        Payment::create([
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
            'status' => 'Paid',
            'payment_date' => now()
        ]);

            return redirect('/payments');
    }

    

    // Update status
    public function updateStatus($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = $payment->status == 'Paid' ? 'Unpaid' : 'Paid';
        $payment->save();

        return back();
    }
}