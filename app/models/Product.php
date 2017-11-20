<?php

class Product extends Eloquent{

    protected $fillable = array('category_id','title', 'description','description_2','description_3','short_description','price','availability','image_1'
    ,'image_2','image_3','image_4','image_5','image_6','image_7','image_8','image_9','image_10','small','medium','large','url'
    );

    public static $rules = array(
        'category_id'   =>'required|integer',
        'title'         => 'required|min:2',
        'description'   => 'required|min:20',
        'price'         => 'required|numeric',
        'availability'  => 'integer',
        'image'         => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000'

    );

    public function category() {
        return $this->belongsTo('Category');
    }

}