@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            @include(
                'category.form',
                [
                    'categories'    => $categories,
                    'category'      => ( object ) [
                        'id'            => null,
                        'id_parent_category' => null,
                        'title'         => null,
                        'description'   => null
                    ],
                    'errors'        => $errors
                ]
            )
        </div>
    </div>
@endsection
