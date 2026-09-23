<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'whatsapp', 'province', 'city', 'district',
        'postal_code', 'street_name', 'building', 'house_number',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->street_name,
            $this->building,
            $this->house_number ? 'No. ' . $this->house_number : null,
            $this->district,
            $this->city,
            $this->province,
            $this->postal_code,
        ]);

        return implode(', ', $parts);
    }
}
