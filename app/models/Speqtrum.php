<?php

class Speqtrum extends Eloquent{

    protected $table = 'speqtrum';
    protected $fillable = array('name','description_1','description_2','description_3','description_4','url');

    public static $rules = array(
        'name' => 'required',
    );


}