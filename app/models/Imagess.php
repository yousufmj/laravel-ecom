<?php

class Imagess extends Eloquent{

    protected $table = 'image';
    protected $fillable = array('image','description','description_2','al_id','title');

    public static $rules = array(
        'title' => 'required',
        'description' => 'required'
    );


}