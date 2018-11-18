@extends('layouts.pages')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1>Journal</h1>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <p class="flow-text">News, Musings and updates from the Oosh team. Enter your email address to recieve regular updates straight into your inbox!</p>
            <br />

            <form action="{{ route('newsletter-signup') }}" method="POST">
                <div class="input-field">
                    <input placeholder="ilovefood@gmail.com" id="email" type="email" class="validate">
                    <label for="post_code">Enter your email address to sign up!</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </form>

            <p class="flow-text">Got an entry for our journal? Recieved a great meal recently or have a recipe emulating a local restuarant that you just have to share? send it to us, <a href="mailto:help@oosh.it">help@oosh.it</a> and we could feature it in our journal!</p> 
        </div>
    </div>
</div>
@endsection