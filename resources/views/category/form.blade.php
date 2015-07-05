<form
    class = ""
    @if ( !is_null( $category -> id ) )
        action = "/categories/{{ $category -> id }}"
    @else
        action = "/categories"
    @endif
    method = "post"
>
    <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
    <div class="col-md-6 col-md-offset-3">
        <div class = "form-group">
            <label for = "parent">{{ trans( 'labels.parent' ) }}:</label>
            <select id = "parent" class = "form-control" name = "parent_id">
                <option value = ""></option>
                @foreach( $categories as $parentCategory )
                    <option
                        value = "{{ $parentCategory -> id }}"
                        @if ( $parentCategory -> id == $category -> id_parent_category )
                            selected = "selected"
                        @endif
                    >
                        {{ $parentCategory -> title }}
                    </option>
                @endforeach
            </select>
            <div>
                @if($errors->has('parent'))
                    <ul>
                        @foreach( $errors->get('parent') as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class = "form-group">
            <label for = "title">{{ trans( 'labels.title' ) }}:</label>
            <input id = "title" class = "form-control" type = "text" name = "title" value = "{{ $category -> title }}"/>
            <div>
                @if($errors->has('title'))
                    <ul>
                        @foreach( $errors->get('title') as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class = "form-group">
            <label for = "description">{{ trans( 'labels.description' ) }}:</label>
            <textarea id = "description" class = "form-control" name = "description">{{ $category -> description }}</textarea>
            <div>
                @if($errors->has('description'))
                    <ul>
                        @foreach( $errors->get('description') as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class = "form-group text-right">
            <button class = "btn btn-default" type = "reset">{{ trans( 'buttons.cancel' ) }}</button>
            <button class = "btn btn-primary" type = "submit">{{ trans( 'buttons.submit' ) }}</button>
        </div>

    </div>
</form>
