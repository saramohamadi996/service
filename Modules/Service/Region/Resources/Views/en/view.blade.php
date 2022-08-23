
@extends('Master::en.master')
@section('header')
    <li><a href="{{route('regions.view',0)}}" title="regions">Region</a></li>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Region</h1>
            <a href="{{ route('regions.add',$city_id)}}"
               class="btn btn-sm btn-primary" style="float: right">Created New Region</a>
        </div>
        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($regions as $region)
                    <tr>
                        <td>{{$region->name}}</td>
                        <td>{{$region->city->name}}</td>

                        <td class="project-actions text-right">

                            <a class="btn btn-info btn-sm" href="{{ route('regions.edit', $region->id)}}">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('regions.destroy', $region->id)}}">
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


