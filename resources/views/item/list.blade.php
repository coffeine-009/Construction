@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <table id = "items-list" width="100%">
                    <thead>
                    <th>#</th>
                    <th>{{ trans( 'labels.category' ) }}</th>
                    <th>{{ trans( 'labels.title' ) }}</th>
                    <th>{{ trans( 'labels.description' ) }}</th>
                    <th>{{ trans( 'labels.updated' ) }}</th>
                    <th>{{ trans( 'labels.created' ) }}</th>
                    <th>{{ trans( 'labels.actions' ) }}</th>
                    </thead>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <a href = "{{ url( '/items/' . $item -> id) }}">
                                    {{ $item -> id }}
                                </a>
                            </td>
                            <td>
                                <a href = "{{ url( '/categories/' . $item -> category_id) }}">
                                    {{ $item -> category_id }}
                                </a>
                            </td>
                            <td>{{ $item -> title }}</td>
                            <td>{{ $item -> description }}</td>
                            <td>{{ $item -> updated_at }}</td>
                            <td>{{ $item -> created_at }}</td>
                            <td>
                                <a href = "/items/{{ $item -> id }}/edit">{{ trans( 'labels.edit' ) }}</a>
                                <a href = "/items/{{ $item -> id }}/delete">{{ trans( 'labels.delete' ) }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#items-list').DataTable(
                    {
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.10.6/i18n/Ukranian.json'
                        }
                    }
            );
        });
    </script>
@endsection
