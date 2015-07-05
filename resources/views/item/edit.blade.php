@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <form class = "" action = "/items/{{ $item -> id }}" method = "post" enctype="multipart/form-data">
                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                <div class = "attachments col-xs-4">
                    <div id="links">
                        @forelse( $item -> attachments() -> get() as $attachment )
                            <div id = "attachment_{{ $attachment -> id }}" class = "closable">
                                <a id = "{{ $attachment -> id }}" class="close" href = "/attachments/{{ $attachment -> id }}">×</a>
                                <img
                                    src="/files/{{ $item -> category_id }}/{{ $item -> id }}/{{ $attachment -> file_name }}"
                                    alt="{{ $attachment -> file_name }}"
                                />
                            </div>
                        @empty
                            <img
                                src="/files/no-attachments.jpg"
                                alt="No images"
                            />
                        @endforelse
                    </div>
                </div>
                <div class = "col-xs-8">
                    <div class = "form-group">
                        <label for = "parent">{{ trans( 'labels.attachments' ) }}:</label>
                        <input id = "attachments" class = "form-control" name = "attachments[]" type = "file" multiple/>
                        <div>
                            @if($errors->has('attachments'))
                                <ul>
                                    @foreach( $errors->get('attachments') as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "parent">{{ trans( 'labels.category' ) }}:</label>
                        <select id = "parent" class = "form-control" name = "category">
                            @foreach( $categories as $category )
                                @if ( $item -> category -> id == $category -> id )
                                    <option value = "{{ $category -> id }}" selected = "selected">
                                        {{ $category -> title }}
                                    </option>
                                @else
                                    <option value = "{{ $category -> id }}">{{ $category -> title }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div>
                            @if($errors->has('category'))
                                <ul>
                                    @foreach( $errors->get('category') as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "title">{{ trans( 'labels.title' ) }}:</label>
                        <input id = "title" class = "form-control" type = "text" name = "title" value = "{{ $item -> title }}"/>
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
                        <textarea id = "description" class = "form-control" name = "description">{{ $item -> description }}</textarea>
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
        </div>
    </div>

    <script type = "application/javascript">
        $( 'a.close' ).click(function() {
            var attachmentId = $(this).attr('id');
            $.ajax({
                url: $( this ).attr( 'href' ),
                method: 'DELETE',

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function( xch ) {
                    $( '#attachment_' +  attachmentId ).remove();
                },
                error: function( xch ) {

                }
            });

            return false;
        });
    </script>
@endsection
