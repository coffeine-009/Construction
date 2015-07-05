@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <table id = "categories-list" width="100%">
                <thead>
                <th>#</th>
                <th>{{ trans( 'labels.message' ) }}</th>
                <th>{{ trans( 'labels.updated' ) }}</th>
                <th>{{ trans( 'labels.created' ) }}</th>
                <th>{{ trans( 'labels.actions' ) }}</th>
                </thead>
                @foreach($advertisements as $advertisement)
                <tr>
                    <td>
                        <a href = "/advertisements/{{ $advertisement -> id }}">{{ $advertisement -> id }}</a>
                    </td>
                    <td>{{ $advertisement -> message }}</td>
                    <td>{{ $advertisement -> updated_at }}</td>
                    <td>{{ $advertisement -> created_at }}</td>
                    <td>
                        <a href = "/advertisements/{{ $advertisement -> id }}/edit">{{ trans( 'labels.edit' ) }}</a>
                        <a href = "/advertisements/{{ $advertisement -> id }}/delete">{{ trans( 'labels.delete' ) }}</a>
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
