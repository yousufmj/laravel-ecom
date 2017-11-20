@extends('layout.main')

@section('content')
<section class="row">

    @if($content)

    <h2>{{ $content->name }}</h2>

    <p>
        {{ $content->page_content }}
    </p>
    @else

    <h2> 404</h2>
    <h4>Sorry page not found</h4>

    @endif
</section>


@stop