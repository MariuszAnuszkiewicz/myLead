<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $timestamps = false;

    protected $fillable = ['amount', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function create($amount, $productId)
    {
        $this->amount = $amount;
        $this->product_id = $productId;
    }
}
