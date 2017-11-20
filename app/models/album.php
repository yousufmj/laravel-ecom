<?php

class Album extends Eloquent{

    protected $table = 'album';
    protected $fillable = array('title','description','image','url');

    public static $rules = array(
        'title' => 'required',
        'description' => 'required',
        'image' => 'required'

    );


}