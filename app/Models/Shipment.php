<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tracking_id',
        'recipient_name',
        'destination',
        'shipment_date',
        'due_date',
        'package_weight',
        'reference_number',
        'package_qty',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'shipment_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    /**
     * Define the relationship with the TravelHistory model.
     */
    public function travelHistories()
    {
        return $this->hasMany(TravelHistory::class);
    }
}
