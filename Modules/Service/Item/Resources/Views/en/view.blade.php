
@extends('Master::en.master')
@section('header')
    <li><a href="{{route('items.view', 0)}}" title="items">Items</a></li>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Items</h1>
            <a href="{{ route('items.add', $attribute_id)}}"
               class="btn btn-sm btn-primary" style="float: right">Created New Items</a>
        </div>
        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Attribute</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->attribute->title}}</td>

                        <td class="project-actions text-right">

                            <a class="btn btn-info btn-sm" href="{{ route('items.edit', $item->id)}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('items.destroy', $item->id)}}">
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


