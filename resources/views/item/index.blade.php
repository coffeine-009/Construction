@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class = "elements">
                @foreach ( $items as $item )
                    <div class = "element">
                        <a href = "/items/{{ $item -> id }}">
                            <div class = "photo">
                                <img
                                    src = "/files/{{ $item -> category_id }}/{{ $item -> id }}/{{ $item -> attachments() -> first() -> file_name }}"
                                />
                            </div>
                            <div class = "title">{{ $item -> title }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
