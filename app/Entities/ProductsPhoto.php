<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model {

    protected $table = 'products_photos';
    
    protected $fillable = ['product_id', 'filename'];
    public $timestamps = true;

    public function product() {
        return $this->belongsTo('App\Entities\Product');
    }

}
