@extends('layout.main')

@section('content')

    <section class="row">
        <div class="large-centered large-6 column">
            <h1>Create New account</h1>

                    @if($errors->has())
                        <div class="alert-box" data-alert>
                            <p>Following errors have occurred</p>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <a href="#" class="close">&times;</a>
                        </div>
                    @endif

                    {{ Form::open(array('url' => 'users/create')) }}

                        <p>
                            {{ Form::label('firstname') }}
                            {{ Form::text('firstname') }}
                        </p>

                        <p>
                            {{ Form::label('lastname') }}
                            {{ Form::text('lastname') }}
                        </p>

                        <p>
                            {{ Form::label('email') }}
                            {{ Form::text('email') }}
                        </p>

                        <p>
                            {{ Form::label('telephone') }}
                            {{ Form::text('telephone') }}
                        </p>

                        <p>
                            {{ Form::label('password') }}
                            {{ Form::password('password') }}
                        </p>

                        <p>
                            {{ Form::label('password_confirmation') }}
                            {{ Form::password('password_confirmation') }}
                        </p>

                        {{ Form::submit('Create Account', array('class' => 'button')) }}

                    {{ Form::close() }}
        </div>

    </section>

@stop