<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('service')->get();
        $services = Service::all();
        return view('appointments.index', ['Astore' => $appointments, 'Sstore' => $services]);
    }

    public function store(Request $request)
    {
        Appointment::create([
            'service_id' => $request->service_id123,
            'customer_name' => $request->customer_name123,
            'contact_info' => $request->contact_info123,
            'date_time' => $request->date_time123,
        ]);

        return redirect('/appointments');
    }
}
