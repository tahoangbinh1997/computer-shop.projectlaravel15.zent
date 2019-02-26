<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductResolution extends Model
{
    protected $table = 'product_resolutions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'resolution_id', 'resolution_name', 'import_price', 'price', 'sale_price', 'stock',
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

    public function resolution() {
        return $this->belongsTo('App\Models\Resolution');
    }
}
