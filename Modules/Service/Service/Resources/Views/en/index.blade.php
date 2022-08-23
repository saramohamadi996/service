
@extends('Master::en.master')
@section('header')
    <li><a href="{{route('services.index')}}" title="services">Services</a></li>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Services</h1>
            <a href="{{ route('services.create')}}"
               class="btn btn-sm btn-primary" style="float: right">Created New Service</a>
        </div>
        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
{{--                    <th>Meta_description</th>--}}
{{--                    <th>Priority</th>--}}
                    <th>Category</th>
                    <th>Image</th>
{{--                    <th>Base Price</th>--}}
{{--                    <th>Approved Price</th>--}}
{{--                    <th>Commission</th>--}}
{{--                    <th>Description</th>--}}
                    <th>Options</th>
                    <th>status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->title}}</td>
                        <td>{{$service->slug}}</td>
{{--                        <td>{{$service->meta_description}}</td>--}}
{{--                        <td>{{$service->priority}}</td>--}}
                        <td>{{$service->category->title}}</td>
                        <td width="80" height="40"><img src="{{asset($service->image)}}" width="80" height="40"></td>
{{--                        <td>{{$service->base_price}}</td>--}}
{{--                        <td>{{$service->approved_price}}</td>--}}
{{--                        <td>{{$service->commission}}</td>--}}
{{--                        <td>{!! $service->description !!}</td>--}}

                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('services.edit', $service->id)}}">
                                <i class="fa fa-list-alt"></i>
                            </a>
                            <a href="" onclick="deleteItem(event, '{{ route('services.destroy', $service->id) }}')"
                               class="btn btn-danger btn-sm" title="delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                        <td>
                            <a href="" onclick="status(event, '{{ route('services.waiting', $service->id) }}',
                                'Are you sure you want to wait for this item?' , 'waiting')" class="btn btn-info btn-sm" title="successful">
                            </a>
                            <a href="" onclick="status(event, '{{ route('services.accept', $service->id) }}',
                                'Are you sure you want to accept this item?' , 'accepted')" class="btn btn-info btn-sm" title="successful">
                            </a>
                            <a href="" onclick="status(event, '{{ route('services.reject', $service->id) }}',
                                'Are you sure you want to reject this item?' ,'rejected')" class="btn btn-danger btn-sm" title="Error">
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
