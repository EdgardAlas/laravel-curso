<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'status',
        'costumer_id'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function costumer()
    {
        return $this->belongsTo(User::class, "costumer_id");
    }

    public function products()
    {
        return $this->morphToMany(Product::class, "productable")->withPivot("quantity");
    }

    public function getTotalAttribute()
    {
        return $this->products->pluck("total")->sum();
    }
}
