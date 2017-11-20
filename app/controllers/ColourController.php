<?php
class ColourController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => array('postAddtocart', 'getCart', 'getRemoveitem', 'getAccount')));
        $this->user = Auth::user();

    }

    public function getIndex(){
        $albums = Album::all();
        return View::make('gallery.colour')
            ->with('albums',$albums);
    }

    public function getAlbum($url){
        $album = Album::where('url',$url)->first();

        $images = Imagess::where('al_id',$album->id)->get();

        return View::make('gallery.album')
            ->with('images',$images)
            ->with('album',$album);

    }


}