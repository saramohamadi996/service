
@extends('Master::en.master')
@section('header')
    <li><a href="{{route('states.index')}}" title="states">State</a></li>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">States</h1>
            <a href="{{ route('states.create')}}"
               class="btn btn-sm btn-primary" style="float: right">Created New State</a>
        </div>
        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($states as $state)
                    <tr>
                        <td>{{$state->name}}</td>

                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cities.view', $state->id)}}">
                                <i class="fas fa-list"></i>
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('states.edit', $state->id)}}">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('states.destroy', $state->id)}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
{{--                        <td>--}}
{{--                            <a href="" onclick="status(event, '{{ route('states.waiting', $state->id) }}',--}}
{{--                                'Are you sure you want to wait for this item?' , 'waiting')" class="btn btn-info btn-sm" title="successful">--}}
{{--                            </a>--}}
{{--                            <a href="" onclick="status(event, '{{ route('states.accept', $state->id) }}',--}}
{{--                                'Are you sure you want to accept this item?' , 'accepted')" class="btn btn-info btn-sm" title="successful">--}}
{{--                            </a>--}}
{{--                            <a href="" onclick="status(event, '{{ route('states.reject', $state->id) }}',--}}
{{--                                'Are you sure you want to reject this item?' ,'rejected')" class="btn btn-danger btn-sm" title="Error">--}}
{{--                            </a>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        function status(event, route, message, status, field = 'status') {
            event.preventDefault();
            if(confirm(message)){
                $.post(route, { _method: "PATCH", _token: $('meta[name="_token"]').attr('content') })
                    .done(function (response) {
                        $(event.target).closest('tr').find('td.' + field).text(status);
                        if (status == "accepted") {
                            $(event.target).closest('tr').find('td.' + field).html("<span class='text-success'>" + status + "</span>");
                        } else {
                            $(event.target).closest('tr').find('td.' + field).html("<span class='text-error'>" + status + "</span>");
                        }

                        $.toast({
                            heading: 'success',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                    })
                    .fail(function (response) {
                        $.toast({
                            heading: 'error',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'error'
                        })
                    })
            }
        }
    </script>
    @include('Master::en.layouts.data_table')
@endsection


