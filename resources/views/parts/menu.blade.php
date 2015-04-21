@foreach($categories as $category)
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $category -> title }}<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            @foreach($category->children()->get() as $subCategory)
                <li>
                    <a href="{{ url('/categories/' . $subCategory -> id . '/items' ) }}">
                        {{ $subCategory -> title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
@endforeach
