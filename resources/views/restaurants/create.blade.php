@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new restaurant</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('restaurants.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" aria-describedby="nameHelp" placeholder="McDonalds">
                            <small id="nameHelp" class="form-text text-muted">The public name of the restaurant.</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea type="text" name="description" class="form-control" aria-describedby="descHelp"></textarea>
                            <small id="descHelp" class="form-text text-muted">50-100 words to briefly describe the restaurant.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
