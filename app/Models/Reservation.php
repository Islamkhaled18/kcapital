<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'property_id',
        'customer_id',
        'status',
        'date',
        'type',
    ];
    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class)->select('id', 'name');
    }

    public function property()
    {
        return $this->belongsTo(Property::class)->select('id', 'title');
    }
}
