<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    protected $table = 'resolutions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resolution_name', 'resolution_detail',
    ];

    public function product_resolutions() {
        return $this->hasMany('App\Models\ProductResolution');;
    }
}
