<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'service_id',
        'customer_name',
        'contact_info',
        'date_time',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
