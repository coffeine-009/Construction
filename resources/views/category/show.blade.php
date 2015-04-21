@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class = "item col-xs-8 col-xs-offset-2">
                <div class = "title">{{ $category -> title }}</div>
                <div class = "description">{{ $category -> description }}</div>
            </div>
        </div>
    </div>
@endsection
