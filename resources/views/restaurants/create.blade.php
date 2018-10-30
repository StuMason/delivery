@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new restaurant</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('restaurants.store') }}" novalidate>
                        @csrf
                        <h4>Details</h4>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input  type="text" 
                                    name="name" 
                                    class="form-control @if($errors->has('name')) is-invalid @endif"
                                    aria-describedby="nameHelp"
                                    placeholder="McDonalds"
                                    value="{{ old('name') }}"> 
                            @if($errors->has('name')) 
                                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                            @endif
                            <small id="nameHelp" class="form-text text-muted">The public name of the restaurant.</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea   type="text" 
                                        name="description" 
                                        class="form-control @if($errors->has('description')) is-invalid @endif" 
                                        aria-describedby="descHelp">
                                        Burritos and Tacos
                                        {{ old('description') }}</textarea>
                            @if($errors->has('description')) 
                                <div class="invalid-feedback">{{$errors->first('description')}}</div>
                            @endif
                            <small id="descHelp" class="form-text text-muted">50-100 words to briefly describe the restaurant.</small>
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input  type="text" 
                                    name="contact_number" 
                                    class="form-control @if($errors->has('contact_number')) is-invalid @endif" 
                                    aria-describedby="numberHelp" 
                                    placeholder="01303 333 555"
                                    value="{{ old('contact_number') }}">
                            @if($errors->has('contact_number')) 
                                <div class="invalid-feedback">{{$errors->first('contact_number')}}</div>
                            @endif
                            <small id="numberHelp" class="form-text text-muted">Best number for customers to contact the restaurant on</small>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">£</div>
                                </div>
                                <input  type="text" 
                                        name="minimum_order" 
                                        class="form-control @if($errors->has('minimum_order')) is-invalid @endif" 
                                        aria-describedby="minHelp" 
                                        placeholder="5.00"
                                        value="{{ old('minimum_order') }}">
                            </div>
                            @if($errors->has('minimum_order')) 
                                <div class="invalid-feedback">{{$errors->first('minimum_order')}}</div>
                            @endif
                            <small id="minHelp" class="form-text text-muted">The minimum amount in which the restaurant will deliver</small>
                        </div>
                        <h4>Opening Times</h4>
                        @foreach($days as $day)
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input  type="text" 
                                        name="openingTimes[{{$day}}][open]" 
                                        class='form-control @if($errors->has("openingTimes.{$day}.open")) is-invalid @endif'
                                        placeholder="{{ucwords($day)}} open e.g. 10:00"
                                        value='{{ old("openingTimes.{$day}.open") }}'>
                                @if($errors->has("openingTimes.{$day}.open")) 
                                    <div class="invalid-feedback">{{$errors->first("openingTimes.{$day}.open")}}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <input  type="text" 
                                        name="openingTimes[{{$day}}][close]"
                                        class='form-control @if($errors->has("openingTimes.{$day}.close")) is-invalid @endif'
                                        placeholder="{{ucwords($day)}} close e.g. 22:00"
                                        value='{{ old("openingTimes.{$day}.close") }}'>
                                @if($errors->has("openingTimes.{$day}.close")) 
                                    <div class="invalid-feedback">{{$errors->first("openingTimes.{$day}.close")}}</div>
                                @endif
                            </div>
                            <div class="form-check col-md-3 form-check-inline">
                                <input  type="checkbox" 
                                        name="openingTimes[{{$day}}][closed]"
                                        class="form-check-input"
                                        @if(old("openingTimes.{$day}.closed")) checked @endif>
                                <label  class="form-check-label" for="openingTimes[{{$day}}][closed]">Closed</label>
                                @if($errors->has("openingTimes.{$day}.closed")) 
                                    <div class="invalid-feedback">{{$errors->first("openingTimes.{$day}.closed")}}</div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <input type="hidden" name="open" value=1>
                        <input type="hidden" name="status" value=pending>
                        <input type=submit value="Submit" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
