@extends('layout.main')

@section('content')

    <section class="row">

        <div class="medium-6 columns">
            <h1>Sign In</h1>

            {{ Form::open(array('url'=>'users/signin')) }}
                <div class="row collapse">
                    <div class="small-3 large-2 columns">
                      <span class="prefix">@</span>
                    </div>
                    <div class="small-9 large-10 columns">
                      {{ Form::text('email',null,array('placeholder'=>'Email')) }}
                    </div>
                </div>

                <div class="row collapse">
                    <div class="small-3 large-2 columns">
                      <span class="prefix">*</span>
                    </div>
                    <div class="small-9 large-10 columns">
                      {{ Form::password('password',array('placeholder'=>'Password')) }}
                    </div>
                </div>

                {{ Form::submit('Log In',array('class'=>'button')) }}
            {{ Form::close() }}
        </div>

        <div class="divider-vertical"></div>

        <div class="medium-6 columns end">
            <h1>New Customer</h1>
            <h4>Click below to create a new account</h4>

            {{ HTML::link('users/newaccount', 'Create New account', array('class'=>'button')) }}

        </div>



    </section>

@stop