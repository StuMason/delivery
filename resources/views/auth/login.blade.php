@extends('layouts.pages')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <h4>Login</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input  id="email" 
                                type="email" 
                                name="email" 
                                class="validate"
                                value="{{ old('email') }}" 
                                required autofocus>
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <span class="helper-text" data-error="Doesn't look right?" data-success="What a delicious looking email address!">{{ $errors->first('email') }}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input  id="password" 
                                type="password" 
                                name="password" 
                                class="validate"
                                value="{{ old('password') }}" 
                                required autofocus>
                        <label for="password">{{ __('Password') }}</label>
                        <span class="helper-text" data-error="that didn't work..." data-success="looks good...">{{ $errors->first('password') }}</span>
                    </div>
                </div> 

                <div class="row">
                    <div class="input-field col s12">
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                            <span>{{ __('Remember Me') }}</span>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" 
                                type="submit" 
                                name="action">
                            {{ __('Login') }}
                            <i class="material-icons right">send</i>
                        </button>
                        <a  href="{{ route('password.request') }}"
                            class="btn waves-effect waves-light">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
