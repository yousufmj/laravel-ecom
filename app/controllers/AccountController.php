<?php
class AccountController extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf',array('on' =>'post'));
        $this->beforeFilter('auth',array('only'=>array('getSettings','postSettings','getIndex','getDelivery','postDelivery','getOrders')));
        $this->user = Auth::user();

    }

    public function getIndex(){

        $order = DB::table('orders')
            ->select('stripe_token')
            ->where('processed',0)
            ->groupBy('stripe_token')
            ->get();

        foreach($order as $o) {
            $outstanding = DB::table('basket')
                ->join('products','basket.product_id','=','products.id')
                ->join('users','basket.user_id','=','users.id')
                ->select(DB::raw('basket.id as order_id,sum(total_price) as overall_price, firstname, lastname, email, basket.id as basID, basket.updated_at as updated_last, sum(quantity) as qty'))
                ->where('paid', '=', 1)
                ->where('stripe_token', '=', $o->stripe_token)
                ->where('basket.user_id',$this->user->id)
                ->groupBy('stripe_token')

                ->get();
        }

        if(empty($outstanding))
        {
            $outstanding = null;
        }


        return View::make('account.account')
            ->with('outstanding',$outstanding)
            ->with('account',$this->user);
    }

    public function getSettings() {

        return View::make('account.settings')
            ->with('account',$this->user);
    }

    public function postSettings(){
        $user = User::find($this->user->id);
        $password       = Input::get('password');

        if(empty($password)){
            $validator = Validator::make(Input::all(),
                array(
                    'firstname' => 'required'

                ));
        }else{
            $validator = Validator::make(Input::all(),
                array(
                    'password_confirmation' => 'required|same:password'
                ));
        }


        if($validator->fails()) {
            return Redirect::to('account/settings')
                ->withErrors($validator)
                ->with('error','Something went wrong');
        }else {

            $user->firstname = ucfirst(Input::get('firstname'));
            $user->lastname = ucfirst(Input::get('lastname'));
            $user->email = Input::get('email');

            if(empty($password)){
                $user->save();

                return Redirect::to('account/settings')
                    ->with('success', 'Settings updated');

            }else {
                $old_password = Input::get('old_password');
                $password = Input::get('password');

                if (Hash::check($old_password, $user->getAuthPassword())) {
                    $user->password = Hash::make($password);

                    if ($user->save()) {
                        return Redirect::to('account/settings')
                            ->with('success', 'Settings updated');
                    } else {
                        return Redirect::to('account/settings')
                               ->with('error', 'Something went wrong');
                    }
                }else{
                    return Redirect::to('account/settings')
                        ->with('error', "Your old passwords don't match");
                }

            }



        }







    }

    public function getDelivery(){
        return View::make('account.delivery')
            ->with('account',$this->user);
    }

    public function postDelivery(){

        $delivery = User::find($this->user->id);

        if($delivery)
        {
            $delivery->delivery_name = Input::get('delivery_name');
            $delivery->address = Input::get('street');
            $delivery->address_2 = Input::get('street2');
            $delivery->town = Input::get('town');
            $delivery->county = Input::get('county');
            $delivery->postcode = Input::get('postcode');

            $delivery->save();

            return Redirect::to('account/delivery')
                ->with('success','Delivery details successfully changed');
        }


        return Redirect::to('account/delivery')
            ->withErrors($delivery)
            ->with('error','Something went wrong');

    }

    public function getOrders(){

        $order = DB::table('orders')
            ->select('stripe_token')
            ->where('processed',0)
            ->groupBy('stripe_token')
            ->get();

        foreach($order as $o) {
            $outstanding = DB::table('basket')
                ->join('products','basket.product_id','=','products.id')
                ->join('users','basket.user_id','=','users.id')
                ->select(DB::raw('basket.id as order_id,sum(total_price) as overall_price, firstname, lastname, email, basket.id as basID, basket.updated_at as updated_last, sum(quantity) as qty'))
                ->where('paid', '=', 1)
                ->where('stripe_token', '=', $o->stripe_token)
                ->where('basket.user_id',$this->user->id)
                ->groupBy('stripe_token')

                ->get();
        }


        $previous_order = DB::table('orders')
            ->select('stripe_token')
            ->where('processed',1)
            ->groupBy('stripe_token')
            ->get();

        foreach($previous_order as $p) {
            $previous = DB::table('basket')
                ->join('products','basket.product_id','=','products.id')
                ->join('users','basket.user_id','=','users.id')
                ->select(DB::raw('basket.id as order_id,sum(total_price) as overall_price, firstname, lastname, email, basket.id as basID, basket.updated_at as updated_last, sum(quantity) as qty'))
                ->where('paid', '=', 1)
                ->where('stripe_token', '=', $p->stripe_token)
                ->where('basket.user_id',$this->user->id)
                ->groupBy('stripe_token')

                ->get();
        }

        if(empty($outstanding))
        {
            $outstanding = null;
        }


        return View::make('account.orders')
            ->with('outstanding',$outstanding)
            ->with('previous',$previous);

    }

    public function getPreviousorders($id){

        $getID = Basket::find($id);

        if(empty($getID)){
            return Response::view('404', array(), 404);
        }

        $order =   DB::table('basket')
            ->join('products','basket.product_id','=','products.id')
            ->select(DB::raw('basket.id as bas_id, user_id, product_id, quantity, products.id, title, price, image_1,
                    total_price, basket.size as bsize'))
            ->where('paid','=',1)
            ->where('stripe_token','=',$getID->stripe_token)
            ->get();

        $despatch = DB::table('orders')
           # ->select('processed, updated_at')
            ->where('stripe_token','=',$getID->stripe_token)
            ->first();

        $user = User::find($getID->user_id);

        if($this->user == $user)
        {
            $total = DB::table('basket')
                ->where('stripe_token','=',$getID->stripe_token)
                ->select(DB::raw('sum(total_price) as total, updated_at, stripe_token, user_id'))
                ->first();

            return View::make('account.view')
                ->with('user',$user)
                ->with('total',$total)
                ->with('orders',$order)
                ->with('despatch',$despatch);
        }else{
            return View::make('404');
        }


    }

}