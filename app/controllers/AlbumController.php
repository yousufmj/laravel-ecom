<?php
class AlbumController extends BaseController{

    /********************
     ** Colour Gallery **
     *******************/

    public function getIndex(){

        return View::make('admin/gallery.colour')
            ->with('albums',Album::all());
    }

    public function postNewcolour(){

        $validator = Validator::make(Input::all(),Album::$rules);

        if($validator->passes()){
            $url              = Input::get('title');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $album = new Album();

            $album->title = ucfirst(Input::get('title'));
            $album->description = Input::get('description');
            $album->url = $url;

            //create new folder for album
            $albUrl = public_path().'/img/album/'.$url;
            File::makeDirectory($albUrl,0777,true,true);

            $imgUrl = '/img/album/'.$url;

            if(Input::hasFile('image')){
                $destinationPath = $albUrl;
                $filename = $url.'_cover.'.Input::file('image')->getClientOriginalExtension();
                Input::file('image')->move($destinationPath, $filename);
                $album->image = $imgUrl.'/'.$filename;
            }

            $album->save();

            $al = Album::where('url',$url)->first();

            // create image in images table
            $image = new Imagess();

            $image->title = ucfirst(Input::get('title'));
            $image->description = Input::get('description');
            $image->al_id = $al->id;
            $image->image = $imgUrl.'/'.$filename;

            $image->save();

            return Redirect::to('admin/colour')
                ->withErrors($validator)
                ->with('success','New album created');


        }

        return Redirect::to('admin/colour')
            ->with('error','Something went wrong');

    }

    public function getAlbum($url){

        $album = Album::where('url',$url)->first();

        $images = Imagess::where('al_id',$album->id)->get();
        return View::make('admin/gallery.album')
            ->with('images',$images)
            ->with('album',$album);
    }

    public function postAlbum(){

        $validator = Validator::make(Input::all(),Imagess::$rules);

        if($validator->passes()){
            $url              = Input::get('title');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $image = new Imagess();

            $image->title = ucfirst(Input::get('title'));
            $image->description = Input::get('description');
            $image->al_id = Input::get('id');

            //folder for album
            $albums_url = Input::get('album_url');
            $albUrl = public_path().'/img/album/'.$albums_url;

            $imgUrl = '/img/album/'.$albums_url;

            if(Input::hasFile('image')){
                $destinationPath = $albUrl;
                $filename = $url.'.'.Input::file('image')->getClientOriginalExtension();
                Input::file('image')->move($destinationPath, $filename);
                $image->image = $imgUrl.'/'.$filename;
            }

            $image->save();

            return Redirect::to('admin/colour/'.$albums_url)
                ->withErrors($validator)
                ->with('success','New image added');


        }

        return Redirect::to('admin/colour')
            ->with('error','Something went wrong');

    }

    public function getImage($id)
    {
        $image = Imagess::find($id);
        $album = Album::find($image->al_id);
        $all = Album::all();
        return View::make('admin/gallery.image')
            ->with('image',$image)
            ->with('all',$all)
            ->with('album',$album);

    }

    public function postImage(){

        $validator = Validator::make(Input::all(),Imagess::$rules);

        if($validator->passes()){
            $url              = Input::get('title');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $image = Imagess::find(Input::get('id'));

            $image->title = ucfirst(Input::get('title'));
            $image->description = Input::get('description');
            $image->al_id = Input::get('album');

            //folder for album
            $albums_url = Input::get('album_url');
            $albUrl = public_path().'/img/album/'.$albums_url;

            $imgUrl = '/img/album/'.$albums_url;

            if(Input::hasFile('image')){
                $destinationPath = $albUrl;
                $filename = $url.'.'.Input::file('image')->getClientOriginalExtension();
                Input::file('image')->move($destinationPath, $filename);
                $image->image = $imgUrl.'/'.$filename;
            }

            $image->save();

            return Redirect::to('admin/colour/edit/'.Input::get('id'))
                ->withErrors($validator)
                ->with('success','Image updated');


        }

        return Redirect::to('admin/colour')
            ->with('error','Something went wrong');

    }

    public function getRemove($id){

        $image = Imagess::find($id);
        $album = Album::find($image->al_id);

        $path = public_path().$image->image;
        if($image){
            File::delete($path);
            $image->delete();
            return Redirect::to('admin/colour/'.$album->url)
                ->with('success', 'Image Deleted');
        }
    }

    public function getRemovealbum($id){

        $album = Album::find($id);
        $images = Imagess::where('al_id',$album->id)->get();

        foreach($images as $image)
        {
            $path = public_path().$image->image;
            if($image){
                File::delete($path);
                $image->delete();

            }
        }
        $directory = public_path().'/img/album/'.$album->url;
        File::deleteDirectory($directory);
        $album->delete();

        return Redirect::to('admin/colour/')
            ->with('success', 'Album Deleted');
    }
}