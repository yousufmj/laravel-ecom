<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Stylesheets -->
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/foundation.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}



    {{ HTML::style('css/style.css') }}
    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
    {{ HTML::script('js/tinymce/tinymce.min.js') }}



   <script type="text/javascript">
   tinymce.init({
       selector: "textarea#wysiwyg",
       plugins: [
           "advlist autolink lists link image charmap print preview anchor",
           "searchreplace visualblocks code fullscreen",
           "insertdatetime media table contextmenu paste"
       ],
       toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
   });
   </script>

</head>
<body>
    <main>

        <div class="fixed">
          <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
              <li class="name">
                <h1><a href="{{ url() }}">b.r.o.q  Admin</a></h1>
              </li>
               <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
              <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
              <!-- Right Nav Section -->
              <ul class="right">
                <li><a href="<?=url()?>/admin">{{ Auth::user()->firstname }}</a></li>
                <li>{{ HTML::link('users/signout','Log Out') }}</li>
                <li></li>
              </ul>


            </section>
            </nav>
        </div>

         <div class="fixed-side">
            <nav data-topbar role="navigation">
            <div class="admin-nav">

                <ul class="side-nav">
                  <li><a href="<?=url()?>/admin/navigation"><i class="fa fa-code"></i> &nbsp;&nbsp;Navigation</a></li>
                  <li><a href="<?=url()?>/admin/content"><i class="fa fa-comments-o"></i> &nbsp;&nbsp;Content</a></li>
                  <li><a href="<?=url()?>/admin/products"><i class="fa fa-file-text-o"></i>  &nbsp;&nbsp;Products</a></li>
                  <li><a href="<?=url()?>/admin/categories"><i class="fa fa-file-archive-o"></i>  &nbsp;&nbsp;Categories</a></li>
                  <li><a href="<?=url()?>/admin/orders"><i class="fa fa-credit-card"></i>  &nbsp;&nbsp;Orders</a></li>
                  <li><a href="<?=url()?>/admin/colour"><i class="fa fa-file-image-o"></i>  &nbsp;&nbsp;Colour gallery</a></li>
                  <li><a href="<?=url()?>/admin/speqtrum"><i class="fa fa-file-image-o"></i>  &nbsp;&nbsp;Spectrum</a></li>
                </ul>
            </div>
          </nav>
        </div>


        <section class="row admin-content">

             @if (Session::has('error'))

                <div data-alert class="alert-box alert radius">
                  {{ Session::get('error') }}
                  <a href="#" class="close">&times;</a>
                </div>

            @endif

            @if (Session::has('success'))

                <div data-alert class="alert-box success radius">
                  {{ Session::get('success') }}
                  <a href="#" class="close">&times;</a>
                </div>

            @endif

            @if (Session::has('message'))

                <div data-alert class="alert-box info radius">
                  {{ Session::get('message') }}
                  <a href="#" class="close">&times;</a>
                </div>

            @endif


           @yield('content')

        </section>

        <footer class="row">
        </footer>








    </main>


    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/foundation.min.js') }}

    {{ HTML::script('js/main.js') }}
</body>
</html>