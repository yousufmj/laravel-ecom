<?php

class Orders extends Eloquent{

    protected $fillable = array('basket_id', 'stripe_token','processed');

    public static $rules = array('basket_id' => 'required');


}