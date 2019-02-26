<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_code', 'thumbnail', 'slug', 'description', 'content', 'model', 'operation_system', 'cpu', 'monitor', 'ram', 'hdd', 'cd_dvd', 'card_video', 'card_audio', 'card_reader', 'webcam', 'finger_print', 'communications', 'port', 'bluetooth', 'pin', 'weight', 'category_id', 'view_count', 'admin_creator_id', 'admin_updated_id',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag','post_tags','product_id','tag_id');
    }

    public function resolutions(){
        return $this->belongsToMany('App\Models\Resolution','product_resolutions','product_id','resolution_id');
    }

    public function product_resolutions() {
        return $this->hasMany('App\Models\ProductResolution');
    }

    public function product_images() {
        return $this->hasMany('App\Models\ProductImage');
    }
}
