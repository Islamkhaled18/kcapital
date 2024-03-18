<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers';

    protected $guarded = [];

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
