@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <table id = "categories-list" width="100%">
                    <thead>
                        <th>#</th>
                        <th>{{ trans( 'labels.parent' ) }}</th>
                        <th>{{ trans( 'labels.title' ) }}</th>
                        <th>{{ trans( 'labels.description' ) }}</th>
                        <th>{{ trans( 'labels.updated' ) }}</th>
                        <th>{{ trans( 'labels.created' ) }}</th>
                        <th>{{ trans( 'labels.actions' ) }}</th>
                    </thead>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <a href = "/categories/{{ $category -> id }}">{{ $category -> id }}</a>
                                </td>
                                <td>
                                    <a href = "/categories/{{ $category -> id_parent_category }}">{{ $category -> id_parent_category }}</a>
                                </td>
                                <td>
                                    <a href = "/categories/{{ $category -> id }}">{{ $category -> title }}</a>
                                </td>
                                <td>{{ $category -> description }}</td>
                                <td>{{ $category -> updated_at }}</td>
                                <td>{{ $category -> created_at }}</td>
                                <td>
                                    <a href = "/categories/{{ $category -> id }}/edit">{{ trans( 'labels.edit' ) }}</a>
                                    <a href = "/categories/{{ $category -> id }}/delete">{{ trans( 'labels.delete' ) }}</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
                @if(!empty($message))
                    <p>{{ $message }}</p>
                @endif
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#categories-list').DataTable(
                {
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.10.6/i18n/Ukranian.json'
                    }
                }
            );
        });
    </script>
@endsection
