<?php

class Basket extends Eloquent{

    protected $table = 'basket';

    protected $fillable = array('user_id','product_id','total_price','quantity','paid','size');

    public static $rules = array('product_id' => 'numeric');


}