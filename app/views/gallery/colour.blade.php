@extends('...layout.main')

@section('content')
<section class="row">
    <h1>Colour</h1>

        @foreach($albums as $album)
            <div class="large-3 columns left">

                <div class="colour-album">
                    <div class="album-cover">
                        <a href="{{ url().'/colour/'.$album->url }}">
                            {{ HTML::image($album->image,$album->title) }}
                            <div class="album-name">
                                {{ $album->title }}
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        @endforeach

</section>





@stop