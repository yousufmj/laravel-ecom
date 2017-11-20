<?php

class AdminController extends BaseController{

    public function __construct(){
        $this->beforeFilter('csrf,', array('on' => 'post'));
        $this->beforeFilter('admin');

    }

    public function getIndex(){
        /*return View::make('admin/index')
            ->with('categories',Category::all());*/
        return Redirect::to('admin/orders');
    }

    /****************
    ** Categories **
    ****************/
    public function getCategories(){
        return View::make('admin/categories.index')
            ->with('categories',Category::all());
    }

    public function postCreatecategories(){
        $validator = Validator::make(Input::all(),Category::$rules);

        if($validator->passes()){
            $category       = new Category;
            $category->name = ucfirst(Input::get('name'));
            $category->save();

            return Redirect::to('admin/categories')
                ->with('success','Category Created');
        }

        return Redirect::to('admin/categories/index')
            ->with('error', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();

    }

    public function postAmendcategory(){

        $validator = Category::find(Input::get('id'));

        if($validator){

            $validator->name  = ucfirst(Input::get('name'));
            $validator->save();


            return Redirect::to('admin/categories')
                ->with('success','Category name amended');
        }

        return Redirect::to('admin/categories')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);

    }

    public function postDestroycategories(){
        $category = Category::find(Input::get('id'));

        if($category){
            $category->delete();
            return Redirect::to('admin/categories')
                ->with('success', 'Category Deleted');
        }

        return Redirect::to('admin/categories')
            ->with('error', 'Something went wrong, please try again');
    }


    /****************
     *** Products ***
     ****************/
    public function getProducts(){
        $categories = array();

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }

        return View::make('admin/products.index')
            ->with('products',Product::all())
            ->with('categories',$categories);
    }

    public function getProductstamend($id){
        $categories = array();

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }
        return View::make('admin/products.amend')
            ->with('products',Product::where('id','=',$id)->first())
            ->with('categories',$categories);
    }

    public function postCreateproducts()
    {


        $validator = Validator::make(Input::all(), Product::$rules);
        if ($validator->passes()) {
            $url              = Input::get('title');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $product = new Product;
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->url = $url;
            $product->description = Input::get('description');
            $product->price = Input::get('price');

            $imgUrl = url().'/img/products/'.$url;

            if(Input::hasFile('images_1')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_1.'.Input::file('images_1')->getClientOriginalExtension();
                Input::file('images_1')->move($destinationPath, $filename);
                $product->image_1 = $filename;
            }

            if(Input::hasFile('images_2')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_2.'.Input::file('images_2')->getClientOriginalExtension();
                Input::file('images_2')->move($destinationPath, $filename);
                $product->image_2 = $filename;
            }

            if(Input::hasFile('images_3')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_3.'.Input::file('images_3')->getClientOriginalExtension();
                Input::file('images_3')->move($destinationPath, $filename);
                $product->image_3 = $filename;
            }

            if(Input::hasFile('images_4')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_4.'.Input::file('images_4')->getClientOriginalExtension();
                Input::file('images_4')->move($destinationPath, $filename);
                $product->image_4 = $filename;
            }

            if(Input::hasFile('images_5')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_5.'.Input::file('images_5')->getClientOriginalExtension();
                Input::file('images_5')->move($destinationPath, $filename);
                $product->image_5 = $filename;
            }

            if(Input::hasFile('images_6')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_6.'.Input::file('images_6')->getClientOriginalExtension();
                Input::file('images_6')->move($destinationPath, $filename);
                $product->image_6 = $filename;
            }

            if(Input::hasFile('images_7')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_1.'.Input::file('images_7')->getClientOriginalExtension();
                Input::file('images_7')->move($destinationPath, $filename);
                $product->image_7 = $filename;
            }

            if(Input::hasFile('images_8')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_8.'.Input::file('images_8')->getClientOriginalExtension();
                Input::file('images_8')->move($destinationPath, $filename);
                $product->image_8 = $filename;
            }

            if(Input::hasFile('images_9')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_9.'.Input::file('images_9')->getClientOriginalExtension();
                Input::file('images_9')->move($destinationPath, $filename);
                $product->image_9 = $filename;
            }

            if(Input::hasFile('images_10')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_10.'.Input::file('images_10')->getClientOriginalExtension();
                Input::file('images_10')->move($destinationPath, $filename);
                $product->image_10 = $filename;
            }


          /*  $i=1;
            foreach($images as $image => $im){
                $i=$i+1;
                $destinationPath = public_path() . '/img/products/';
                $filename = $url.'-'.$i.$im->getClientOriginalExtension();;
                $im->move($destinationPath, $filename);
                $product->image.'_'.$i = $filename;
                $i++;
            }

*/
            $product->save();

            return Redirect::to('admin/products')
                ->with('success', 'Product Created');
        }

            return Redirect::to('admin/products/index')
                ->with('error', 'Something went wrong')
                ->withErrors($validator)
                ->withInput();

    }

    public function postProductstamend()
    {
        $id = Input::get('id');
        $product = Product::find($id);

        $validator = Validator::make(Input::all(), Product::$rules);
        if ($validator->passes()) {
            $url              = Input::get('title');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);



            $product->title = Input::get('title');
            #$product->meta_title = Input::get('meta_title');
            #$product->meta_description = Input::get('meta_description');
            $product->url = $url;
            $product->description = Input::get('description');
            $product->description_2 = Input::get('description_2');
            $product->description_3 = Input::get('description_3');
            $product->price = Input::get('price');
            $product->small = Input::get('small');
            $product->medium = Input::get('medium');
            $product->large = Input::get('large');


            $imgUrl = url().'/img/products/'.$url;

            if(Input::hasFile('images_1')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_1.'.Input::file('images_1')->getClientOriginalExtension();
                Input::file('images_1')->move($destinationPath, $filename);
                $product->image_1 = $filename;
            }

            if(Input::hasFile('images_2')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_2.'.Input::file('images_2')->getClientOriginalExtension();
                Input::file('images_2')->move($destinationPath, $filename);
                $product->image_2 = $filename;            }

            if(Input::hasFile('images_3')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_3.'.Input::file('images_3')->getClientOriginalExtension();
                Input::file('images_3')->move($destinationPath, $filename);
                $product->image_3 = $filename;
            }

            if(Input::hasFile('images_4')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_4.'.Input::file('images_4')->getClientOriginalExtension();
                Input::file('images_4')->move($destinationPath, $filename);
                $product->image_4 = $filename;
            }

            if(Input::hasFile('images_5')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_5.'.Input::file('images_5')->getClientOriginalExtension();
                Input::file('images_5')->move($destinationPath, $filename);
                $product->image_5 = $filename;
            }

            if(Input::hasFile('images_6')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_6.'.Input::file('images_6')->getClientOriginalExtension();
                Input::file('images_6')->move($destinationPath, $filename);
                $product->image_6 = $filename;
            }

            if(Input::hasFile('images_7')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_1.'.Input::file('images_7')->getClientOriginalExtension();
                Input::file('images_7')->move($destinationPath, $filename);
                $product->image_7 = $filename;
            }

            if(Input::hasFile('images_8')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_8.'.Input::file('images_8')->getClientOriginalExtension();
                Input::file('images_8')->move($destinationPath, $filename);
                $product->image_8 = $filename;
            }

            if(Input::hasFile('images_9')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_9.'.Input::file('images_9')->getClientOriginalExtension();
                Input::file('images_9')->move($destinationPath, $filename);
                $product->image_9 = $filename;
            }

            if(Input::hasFile('images_10')){
                $destinationPath = public_path() . '/img/products/';
                $filename = $imgUrl.'_10.'.Input::file('images_10')->getClientOriginalExtension();
                Input::file('images_10')->move($destinationPath, $filename);
                $product->image_10 = $filename;
            }


            $product->save();

           return Redirect::to('admin/products/amend/'.$id)
                ->with('success', 'Product Created');
        }

        return Redirect::to('admin/products/amend/'.$id)
            ->with('error', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();

    }

    public function postDestroyproducts(){
        $product = Product::find(Input::get('id'));

        if($product){

            File::delete('public/'.$product->image);
            $product->delete();
            return Redirect::to('admin/products/index')
                ->with('success', 'Products Deleted');
        }

        return Redirect::to('admin/products/index')
            ->with('error', 'Something went wrong, please try again');
    }

    public function postToggleAvailability() {
        $product = Product::find(Input::get('id'));

        if($product){
            $product->availability = Input::get('availability');
            $product->save();

            return Redirect::to('admin/products/index')
                ->with('success', 'Product updated');
        }

        return Redirect::to('admin/products/index')
            ->with('error','Invalid Product');
    }

    public function postRemoveimg()
    {
        $product = Product::find($id);
        $album = Album::find($image->al_id);

        $path = public_path().$image->image;
        if($image){
            File::delete($path);
            $image->delete();
            return Redirect::to('admin/colour/'.$album->url)
                ->with('success', 'Image Deleted');
        }
    }



    /****************
     ** Content *****
     ****************/

    public function getContent(){
        return View::make('admin/content.index')
            ->with('content',Content::where('nav','=','0')->get());
    }

    public function getContentammend($url){
        return View::make('admin/content.ammend')
            ->with('content',Content::where('url','=',$url)->first());
    }

    public function postCreatecontent(){

        $validator = Validator::make(Input::all(),Content::$rules);

        if($validator->passes()){
            $url              = Input::get('name');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $content                    = new Content();
            $content->name              = ucfirst(Input::get('name'));
            $content->url               = $url;
            $content->nav               = 0;
            $content->save();




            return Redirect::to('admin/content')
                ->with('success','New page content');
        }

        return Redirect::to('admin/content')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);


    }

    public function postAmendcontent(){

        $validator = Content::find(Input::get('id'));
        $url              = Input::get('name');
        if($validator){

            $url              = Input::get('name');
            $url = strtolower($url);
            //Make alphanumeric (removes all other characters)
            $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
            //Clean up multiple dashes or whitespaces
            $url = preg_replace("/[\s-]+/", " ", $url);
            //Convert whitespaces and underscore to dash
            $url = preg_replace("/[\s_]/", "-", $url);

            $validator->name              = ucfirst(Input::get('name'));
            $validator->meta_title        = Input::get('meta_title');
            $validator->meta_description  = Input::get('meta_description');
            $validator->page_content      = Input::get('page_content');
            $validator->url               = $url;

            if(Input::get('published'))
            {
                $validator->published         = 1;
            }else{
                $validator->published         = 0;
            }



            $validator->save();

           # dd($validator);

            return Redirect::to('admin/content/amend/'.$url)
                ->with('success','Page successfully updated');
        }

       return Redirect::to('admin/content/amend/'.$url)
            ->with('error', 'Something went wrong')
            ->withErrors($validator);

    }

    public function postDestroycontent(){
        $validator = Content::find(Input::get('id'));

        if($validator){

            $validator->delete();

            return Redirect::to('admin/content')
                ->with('success','Link Deleted');
        }

        return Redirect::to('admin/content')
            ->with('error', 'Something went wrong');
    }


    /********************
     ** Navigation *****
     *******************/

    public function getNavigation(){
        return View::make('admin/content.navigation')
            ->with('content',Content::where('nav','=',1)->get());
    }

    public function postCreatenavigation(){

        $validator = Validator::make(Input::all(),Content::$rules);

        if($validator->passes()){
            $content        = new Content();
            $content->name  = ucfirst(Input::get('name'));
            $content->url  = Input::get('url');
            $content->nav   = 1;
            $content->save();


            return Redirect::to('admin/navigation')
                ->with('success','Link Created');
        }

        return Redirect::to('admin/navigation')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);


    }

    public function postAmendnavigation(){

        $navigation = Content::find(Input::get('id'));

        if($navigation){

            $navigation->name  = Input::get('name');
            $navigation->url  = Input::get('url');
            $navigation->save();


            return Redirect::to('admin/navigation')
                ->with('success','Link Created');
        }

        return Redirect::to('admin/navigation')
            ->with('error', 'Something went wrong')
            ->withErrors($navigation);

    }

    public function postDestroynavigation(){
        $navigation = Content::find(Input::get('id'));

        if($navigation){

            $navigation->delete();

            return Redirect::to('admin/navigation')
                ->with('success','Link Deleted');
        }

        return Redirect::to('admin/navigation')
            ->with('error', 'Something went wrong');
    }

    /********************
     ** Orders *****
     *******************/

    public function getOrders()
    {
        $order = DB::table('orders')
            ->select('stripe_token')
            ->where('processed',0)
            ->groupBy('stripe_token')
            ->get();

        foreach($order as $o) {
            $basket = DB::table('basket')
                ->join('products','basket.product_id','=','products.id')
                ->join('users','basket.user_id','=','users.id')
                ->select(DB::raw('sum(total_price) as overall_price, firstname, lastname, email, basket.id as basID, basket.updated_at as updated_last'))
                ->where('paid', '=', 1)
                ->where('stripe_token', '=', $o->stripe_token)
                ->groupBy('stripe_token')

                ->get();
        }

        if(empty($basket))
        {
            $basket = null;
        }

        $total = DB::table('basket')
            ->where('user_id','=',Auth::id())
            ->sum('total_price');

        return View::make('admin/orders.index')
                ->with('basket',$basket)
                ->with('orders',$order);
    }

    public function getOrdersview($id)
    {
        $getID = Basket::find($id);

        $order =   DB::table('basket')
            ->join('products','basket.product_id','=','products.id')
            ->select(DB::raw('basket.id as bas_id, user_id, product_id, quantity, products.id, title, price, image_1,
                    total_price, basket.size as bsize'))
            ->where('paid','=',1)
            ->where('stripe_token','=',$getID->stripe_token)
            ->get();

        $user = User::find($getID->user_id);

        $total = DB::table('basket')
            ->where('stripe_token','=',$getID->stripe_token)
            ->select(DB::raw('sum(total_price) as total, updated_at, stripe_token, user_id'))
            ->first();



        return View::make('admin/orders.view')
                ->with('user',$user)
                ->with('total',$total)
                ->with('orders',$order);
    }

    public function postOrderprocess()
    {
        $token = Input::get('token');
        $userID = Input::get('user');
        $user = User::find($userID);
        $orders = Orders::where('stripe_token','=',$token)->get();

        $total = DB::table('basket')
            ->where('stripe_token','=',$token)
            ->select(DB::raw('sum(total_price) as total, updated_at, stripe_token'))
            ->first();

        // Update orders to processed
        foreach($orders as $or)
        {
            $order = Orders::find($or->id);

            $order->processed = 1;

            $order->save();
        }

        $emailBasket = DB::table('basket')
            ->join('products','basket.product_id','=','products.id')
            ->select(DB::raw('basket.id as bas_id, user_id, product_id, quantity, products.id, title, price, image_1,
                    total_price'))
            ->where('paid','=',1)
            ->where('stripe_token','=',$token)
            ->get();

        $data = array(
            'products' => $emailBasket,
            'firstname' => $user->firstname,
            'total_price' => $total->total

        );

            Mail::send('emails/order.processed', $data, function($message) use($user)
            {
                $message->to($user->email, $user->firstname)->subject('Order has been dispatched');
            });



        return Redirect::to('admin/orders')
                ->with('success','Product marked as processed and dispatched');


    }

    /********************
     **** Spectrum *****
     *******************/

    public function getSpeqtrum()
    {
        $spec = Speqtrum::all();
        return View::make('admin/spec.index')
            ->with('specs',$spec);
    }

    public function postCreatespec()
    {
        $validator = Validator::make(Input::all(),Speqtrum::$rules);
        $url              = Input::get('name');
        $url = strtolower($url);
        //Make alphanumeric (removes all other characters)
        $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
        //Clean up multiple dashes or whitespaces
        $url = preg_replace("/[\s-]+/", " ", $url);
        //Convert whitespaces and underscore to dash
        $url = preg_replace("/[\s_]/", "-", $url);


        if($validator->passes()){
            $spec        = new Speqtrum();
            $spec->name  = ucfirst(Input::get('name'));
            $spec->url  = $url;
            $spec->description_1  = Input::get('white');
            $spec->description_2  = Input::get('grey');
            $spec->description_3  = Input::get('green');
            $spec->description_4  = Input::get('red');
            $spec->save();


            return Redirect::to('admin/speqtrum')
                ->with('success','Content created');
        }

        return Redirect::to('admin/speqtrum')
            ->with('error', 'Something went wrong')
            ->withErrors($validator);

    }

    public function getSpeqtrumammend($id)
    {
        $spec = Speqtrum::where('url',$id)->first();
        return View::make('admin/spec.ammend')
            ->with('spec',$spec);
    }

    public function postSpeqtrumammend()
    {
        $validator = Validator::make(Input::all(),Speqtrum::$rules);
        $url              = Input::get('name');
        $url = strtolower($url);
        //Make alphanumeric (removes all other characters)
        $url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
        //Clean up multiple dashes or whitespaces
        $url = preg_replace("/[\s-]+/", " ", $url);
        //Convert whitespaces and underscore to dash
        $url = preg_replace("/[\s_]/", "-", $url);


        if($validator->passes()){
            $spec        = Speqtrum::find(Input::get('id'));
            $spec->name  = ucfirst(Input::get('name'));
            $spec->url  = $url;
            $spec->description_1  = Input::get('white');
            $spec->description_2  = Input::get('grey');
            $spec->description_3  = Input::get('green');
            $spec->description_4  = Input::get('red');
            $spec->save();


            return Redirect::to('admin/speqtrum/amend/'.$url)
                ->with('success','Content changed');
        }

        return Redirect::to('admin/speqtrum/amend/'.$url)
            ->with('error', 'Something went wrong')
            ->withErrors($validator);
    }


}