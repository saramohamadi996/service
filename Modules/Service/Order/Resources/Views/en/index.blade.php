
@extends('Master::en.master')
@section('header')
    <li><a href="{{route('orders.index')}}" title="orders">Orders</a></li>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Orders</h1>
            <a href="{{ route('orders.create')}}"
               class="btn btn-sm btn-primary" style="float: right">Created New Order</a>
        </div>
        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Specialist</th>
                    <th>status</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->service->title}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->user->specialist_id}}</td>
                        <td>
                            <a href="" onclick="status(event, '{{ route('orders.waiting', $order->id) }}',
                                'Are you sure you want to wait for this item?' , 'waiting')" class="btn btn-info btn-sm" title="successful">
                            </a>
                            <a href="" onclick="status(event, '{{ route('orders.accept', $order->id) }}',
                                'Are you sure you want to accept this item?' , 'accepted')" class="btn btn-info btn-sm" title="successful">
                            </a>
                            <a href="" onclick="status(event, '{{ route('orders.reject', $order->id) }}',
                                'Are you sure you want to reject this item?' ,'rejected')" class="btn btn-danger btn-sm" title="Error">
                            </a>
                        </td>

                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('orders.view', $order->id)}}">
                                <i class="fa fa-list"></i>
                            </a>
                        </td>
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
