@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <form class = "" action = "/items" method = "post" enctype="multipart/form-data">
                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                <div class="col-md-6 col-md-offset-3">
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
                                <option value = "{{ $category -> id }}">{{ $category -> title }}</option>
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
                        <input id = "title" class = "form-control" type = "text" name = "title"/>
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
                        <textarea id = "description" class = "form-control" name = "description"></textarea>
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
@endsection
