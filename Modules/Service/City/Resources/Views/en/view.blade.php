
@extends('Master::en.master')
@section('header')
    <li><a href="{{route('cities.view', 0)}}" title="cities">City</a></li>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">City</h1>
            <a href="{{ route('cities.add', $state_id)}}"
               class="btn btn-sm btn-primary" style="float: right">Created New City</a>
        </div>
        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>State</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{$city->name}}</td>
                        <td>{{$city->state->name}}</td>

                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('regions.view', $city->id)}}">
                                <i class="fas fa-list"></i>
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('cities.edit', $city->id)}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('cities.destroy', $city->id)}}">
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


