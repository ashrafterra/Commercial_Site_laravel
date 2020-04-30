<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['price', 'brand_id', 'image', 'user_id', 'fileName', 'contact_telephone', 'contact_email','description','category','name'];



    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
