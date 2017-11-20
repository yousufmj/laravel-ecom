@extends('layout.main')

@section('content')

<section class="row">
    <h1>Speqtrum</h1>

    @foreach($specs as $spec)

        <div class="spec-container">

            <div class="spec">
                <strong class="spec-name">{{ $spec->name }}</strong>

            <br>

                <div class="large-7">
                    <div class="spec-tab hide">

                        <dl class="tabs" data-tab>
                          <dd class="active white"><a href="#White">White</a></dd>
                          <dd class="grey"><a href="#Grey">Grey</a></dd>
                          <dd class="green"><a href="#Green">Green</a></dd>
                          <dd class="red"><a href="#Red">Red</a></dd>
                        </dl>
                        <div class="tabs-content">
                          <div class="content active" id="White">
                            <p>{{ $spec->description_1 }}</p>
                          </div>
                          <div class="content" id="Grey">
                           <p>{{ $spec->description_2 }}</p>
                          </div>
                          <div class="content" id="Green">
                          <p> {{ $spec->description_3 }}</p>
                          </div>
                          <div class="content" id="Red">
                           <p> {{ $spec->description_4 }}</p>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endforeach

</section>


@stop