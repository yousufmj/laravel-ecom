<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eCommerce - Product</title>


   <!-- Stylesheets -->
   {{ HTML::style('css/normalize.css') }}
   {{ HTML::style('css/foundation.min.css') }}
   {{ HTML::style('css/flexslider.css') }}
   {{ HTML::style('css/style.css') }}
   {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}

   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body>
    <div class="main-wrapper">
    <main>

        <header class="main-nav">

            <section class="grey top-nav">

                <div class="row">
                    <div class="right">
                         @if(Auth::check())
                            <ul class="inline-list">
                                @if(Auth::user()->admin == 1)
                                    <li>{{ HTML::link('admin','Admin') }}</li>
                                @endif
                                <li>
                                    <a href="">{{ HTML::link('account', 'My Account') }}</a>
                                </li>
                                <li>{{ HTML::link('users/signout','Log Out') }}</li>

                            </ul>
                         @else
                            <ul class="inline-list">
                                <li>{{ HTML::link('users/signin','Sign In') }}</li>
                                <li>{{ HTML::link('users/newaccount','Register') }}</li>
                            </ul>
                         @endif
                     </div>

                </div>
            </section>

            <section class="contain-to-grid sticky">
                <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
                <section class="top-bar-section">
                    <!-- mobile view of nav -->
                    <ul class="title-area">
                        <li class="name">
                            <h1><a href="<?=url()?>">B.r.o.q</a></h1>
                        </li>

                        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                    </ul>

                    <!-- right of nav -->
                    <ul class="right">
                        <li class="has-form">
                            {{ Form::open(array('url' => 'store/search', 'method' => 'get')) }}

                                    <div class="row collapse">
                                            <div class="large-8  columns">
                                                {{ Form::text('keyword', null, array('placeholder'=>'Search Products')) }}
                                            </div>

                                            <div class="large-4 columns ">
                                                {{ Form::submit('Search', array('class'=>'button postfix')) }}
                                            </div>
                                    </div>

                            {{ Form::close() }}
                        </li>

                        <li class="show-for-medium-down"><a href="<?=url()?>/store/cart">Basket ({{ $basket }})</a></li>



                        <li class="has-dropdown">
                            <a href="#">Basket ({{ $basket }})</a>
                            @if($basket > 0)
                                <ul class="dropdown">
                                  <li class="padding">
                                        @foreach($basket_drop as $db)
                                        <div class="row">
                                            <div class="large-4 columns">
                                                {{ HTML::image($db->image_1,$db->title) }}
                                            </div>
                                            <div class="large-8 columns">
                                                <b>{{ $db->title }} </b><br>
                                                <b>&pound;{{ $db->total_price }}</b><br>
                                                 {{ $db->size }}<br>
                                                 {{ $db->quantity }}

                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                        <div class="row padding-left">
                                            {{ HTML::link(url().'/store/cart','View Basket',array('class'=>'button tiny grey')) }}
                                            {{ HTML::link('store/checkout','Checkout',array('class'=>'button tiny soft-blue')) }}
                                        </div>
                                  </li>

                                </ul>
                            @endif
                        </li>


                    </ul>

                    <!-- Left of nav -->
                    <ul class="left">

                        @foreach($navigation as $nav)
                            <li>{{ HTML::link(url().'/'.$nav->url,$nav->name) }}</li>
                        @endforeach
                    </ul>
                    </section>
                </nav>
            </section>
        </header>

        @yield('promo')
        @yield('search-keyword')

        <div class="full-content">
        <section class="row">
            @if (Session::has('success'))
                   <p class="alert-box success">{{ Session::get('success') }}</p>
            @endif
        </section>

        <section class="row">
            @if (Session::has('message'))
                   <p class="alert-box warning ">{{ Session::get('message') }}</p>
            @endif
        </section>


        @yield('content')
        </div>
        <!--Footer -->
        <div class="footer-wrapper">
        <footer>

            <section class="row footer">

                <div class="large-8 large-centered columns ">

                    <ul class="inline-list" >
                        <li><a href="{{ url('account') }}">Your Account</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Delivery </a></li>
                        <li><a href="#">Returns </a></li>
                        <li><a href="#">Q&A  </a></li>
                        <li>{{ HTML::image(url().'/img/payment-sprite.png','Payments') }}</li>

                    </ul>
                </div><!-- end my-account -->





            </section><!-- end links -->





        </footer>
        </div>
    </main>
    </div>

    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/jquery.flexslider-min.js') }}
    {{ HTML::script('js/main.js') }}

</body>
</html>