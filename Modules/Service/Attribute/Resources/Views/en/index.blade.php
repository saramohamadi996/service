
@extends('Master::en.master')
@section('header')
    <li><a href="{{route('attributes.index')}}" title="attributes">Attribute</a></li>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Attributes</h1>
            <a href="{{ route('attributes.create')}}"
               class="btn btn-sm btn-primary" style="float: right">Created New Attribute</a>
        </div>
        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Service</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($attributes as $attribute)
                    <tr>
                        <td>{{$attribute->title}}</td>
                        <td>{{$attribute->type}}</td>
                        <td>{{$attribute->service->title}}</td>

                        <td class="project-actions text-right">

                            @if($attribute->type == 'select')
                                <a class="btn btn-primary btn-sm" href="{{ route('items.view', $attribute->id)}}">
                                    <i class="fas fa-list"></i>
                                </a>
                            @endif

                            <a class="btn btn-info btn-sm" href="{{ route('attributes.edit', $attribute->id)}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('attributes.destroy', $attribute->id)}}">
                                <i class="fa fa-trash"></i>
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
    @include('Master::en.layouts.data_table')
@endsection


