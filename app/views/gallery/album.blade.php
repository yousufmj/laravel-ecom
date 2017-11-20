@extends('layout.main')


@section('content')
<section class="row">
    <h1>{{ $album->title }}</h1>


    <div class="large-4 columns album-description">
            <h3 class="soft-red">Concept</h3>
            {{ $album->description }}
    </div>
    <div class="large-8 columns">

        <div id="slider" class="flexslider">
              <ul class="slides">

                @foreach($images as $image)

                    <li>
                        {{ HTML::image($image->image,$image->title) }}
                        <div class="description">{{ $image->description }}</div>
                    </li>


                @endforeach

              </ul>
        </div>

        <div id="carousel" class="flexslider">
          <ul class="slides">

            @foreach($images as $image)

                <li>
                    {{ HTML::image($image->image,$image->title) }}
                </li>

            @endforeach

          </ul>
        </div>

    </div>

</section>
<section class="row">


    <div class="large-10 large-centered columns">



    </div>



</section>




@stop