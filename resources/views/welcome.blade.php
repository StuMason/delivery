@extends('layouts.oosh')

@section('content')
<!-- <Example></Example> -->
<!-- <div class="container">
    <div class="row">
        <div class="col s12">
            <h1>Folkestone, delivered.</h1>
            <h4>We'll deliver your favourite local dish from restaurant to front door in minutes.</h4>
            <br />
            <form action="{{route('search.location')}}" method="POST">
                @csrf
                <div class="input-field">
                    <input placeholder="CT20 1RL" name="post_code" id="post_code" type="text" class="validate">
                    <label for="post_code">Enter your postcode to begin...</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Lets go!</button>
            </form>
            @if($errors->has('post_code')) 
                <span class="helper-text" data-error="{{$errors->first('post_code')}}"></span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card-panel red">
            <span class="white-text"><p>Right now we're only delivering Mexican street food from Uno Mas, and only to the CT19 and CT20 areas.</p>
            <p>We're currently looking for both partner restaurants and drivers - interested? email us <a class="white-text" href="mailto:help@oosh.it">help@oosh.it</a></p></span>
            </div>
        </div>
    </div>
</div> -->
@endsection