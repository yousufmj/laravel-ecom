@extends('layout.main')

@section('content')

<section class="row">
    <h1>My Account Settings</h1>

    <ul class="breadcrumbs">
        <li>{{ HTML::link('account','account') }} </li>
        <li> Settings</li>
    </ul>
</section>


<section class="row">
    <div class="account-section">
        <div class="medium-3 columns">
            <h4>Settings</h4>

        </div>

        <div class="small-12 medium-8 columns end account-content">
            <h4 class="padding-bottom">My Account Settings</h4>

            @if($errors->has())
                <div class="alert-box alert" data-alert>
                    <p>Following errors have occurred</p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <a href="#" class="close">&times;</a>
                </div>
            @endif

            @if (Session::has('error'))

                            <div data-alert class="alert-box alert radius">
                              {{ Session::get('error') }}
                              <a href="#" class="close">&times;</a>
                            </div>

                        @endif

            {{ Form::open(array('url'=>'account/settings', 'data-abide' => true)) }}
                <div class="name-field">
                    <label>First Name <span class="soft-red">*</span>
                    {{ Form::text('firstname',$account->firstname, ['required']) }}
                    <small class="error">First name is required</small>
                    </label>
                </div>

                <div class="name-field">
                    <label>Last Name <span class="soft-red">*</span>
                    {{ Form::text('lastname',$account->lastname, ['required']) }}
                    <small class="error">Last name is required</small>
                    </label>
                </div>

                <div class="name-field">
                    <label>Email <span class="soft-red">*</span>
                    {{ Form::text('email',$account->email, ['required']) }}
                     <small class="error">Email is required</small>
                    </label>
                </div>


                {{ Form::label('old_password', 'Old Password') }}
                {{ Form::password('old_password')}}


                {{ Form::label('password') }}
                {{ Form::password('password') }}

                <div class="name-field">
                {{ Form::label('password_confirmation','Confirm Password') }}
                <input type="password" id="confirmPassword" name="password_confirmation" data-equalto="password" >
                 <small class="error">Passwords don't match</small>
                </div>

                {{ Form::submit('Save Changes', array('class'=>'button tiny')) }}



            {{ Form::close() }}
        </div>
    </div>

</section>

@stop