@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            @include(
                'category.form',
                [
                    'categories'    => $categories,
                    'category'      => $category,
                    'errors'        => $errors
                ]
            )
        </div>
    </div>
@endsection
