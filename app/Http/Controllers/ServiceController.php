<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', ['Sstore'=> $services]);
    }

    public function store(Request $request)
    {
        Service::create([
            'service_name' => $request->service_name123,
            'service_description' => $request ->service_description123,
            'service_price' => $request ->service_price123,
            'service_duration' => $request ->service_duration123,
        ]);

        return redirect('/services');

    }

    public function edit($id)
    {
        $services = Service::findorfail($id);
        return view('services.edit', ['Sstore' => $services]);
    }

    public function update(Request $request, $id)
    {
        $services = Service::findorfail($id);
        $services -> update([
            'service_name' => $request->service_name123,
            'service_description' => $request ->service_description123,
            'service_price' => $request ->service_price123,
            'service_duration' => $request ->service_duration123,
        ]);

        return redirect('/services');
    }

    public function destroy($id)
    {
        $services = Service::findorfail($id);
        $services ->delete();
        return redirect('/services');
    }
}
