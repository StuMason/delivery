@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restaurants</div>
                <div class="card-body">
                    @foreach($restaurants as $restaurant)
                        <a href="{{ route('restaurants.show', ['restaurant_id' => $restaurant->id]) }}" >Name: {{$restaurant->name}}</a><br />
                        Desc: {{$restaurant->description}}<br />
                        minimum_order: {{$restaurant->minimum_order}}<br />
                        contact_number: {{$restaurant->contact_number}}<br />
                        Open: {{$restaurant->open}}<br />
                        Status: {{$restaurant->status}}<br />
                        opening_times: {{$restaurant->opening_times}}<br />
                        created: {{$restaurant->created_at}}<br />
                        updated: {{$restaurant->updated_at}}</p>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
