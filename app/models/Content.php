<?php

class Content extends Eloquent{

    protected $fillable = array('con_id','nav', 'name', 'url','meta_title','meta_description','page_content','published');

    protected $table = 'content';

    public static $rules = array(
        'con_id'            => 'integer',
        'nav'               => 'integer',
        'name'              => 'required|min:3'


    );



}