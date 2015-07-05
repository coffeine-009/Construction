@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <form class = "" action = "/advertisements" method = "post" enctype="multipart/form-data">
                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                <div class="col-md-6 col-md-offset-3">
                    <div class = "form-group">
                        <label for = "attachments">{{ trans( 'labels.attachments' ) }}:</label>
                        <input id = "attachments" class = "form-control" name = "attachment" type = "file"/>
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
                        <label for = "message">{{ trans( 'labels.message' ) }}:</label>
                        <input id = "message" class = "form-control" type = "text" name = "message"/>
                        <div>
                            @if($errors->has('message'))
                                <ul>
                                    @foreach( $errors->get('message') as $error )
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
