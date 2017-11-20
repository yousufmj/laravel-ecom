@extends('layout.main')

@section('content')

<section class="row">
    <h1>My Delivery Details</h1>

    <ul class="breadcrumbs">
        <li>{{ HTML::link('account','account') }} </li>
        <li>Delivery</li>
    </ul>
</section>


<section class="row">
    <div class="account-section">
        <div class="medium-3 columns">
            <h4>Delivery</h4>

        </div>

        <div class="small-12 medium-8 columns end account-content">
            <h4 class="padding-bottom">Edit Delivery Details</h4>

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

            {{ Form::open(array('url'=>'account/delivery', 'data-abide' => true)) }}
                <div class="name-field">
                    <label>Delivery Name  <span class="soft-red">*</span>
                    {{ Form::text('delivery_name',$account->delivery_name, ['required']) }}
                    <small class="error">Name is required</small>
                    </label>
                </div>

                <div class="name-field">
                    <label>Street <span class="soft-red">*</span>
                        {{ Form::text('street',$account->address, ['required']) }}
                        <small class="error">Street name is required </small>
                    </label>
                </div>

                <div class="name-field">
                    {{ Form::text('street2',$account->address_2) }}
                </div>

                <div class="name-field">
                    <label>Town/City <span class="soft-red">*</span>
                        {{ Form::text('town',$account->town, ['required']) }}
                        <small class="error">Town or City is required </small>
                    </label>
                </div>

                <div class="name-field">
                    <label>County <span class="soft-red">*</span>
                        {{ Form::text('county',$account->county, ['required']) }}
                        <small class="error">Town or City is required </small>
                    </label>
                </div>

                <div class="name-field">
                    <label>Post Code <span class="soft-red">*</span>
                        {{ Form::text('postcode',$account->postcode, ['required']) }}
                        <small class="error">Town or City is required </small>
                    </label>
                </div>

                 {{ Form::submit('Save Changes', array('class'=>'button tiny')) }}

            {{ Form::close() }}
        </div>
    </div>

</section>

@stop