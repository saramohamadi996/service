
@extends('Master::en.master')
@section('header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('regions.index')}}">Region</a></li>
        <li class="breadcrumb-item"><a href="{{ route('regions.edit', $region->id)}}">Edit</a></li>
    </ol>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Region</h1>
                    </div>
                    <form action="{{ route('regions.update', $region->id) }}"
                          class="padding-30" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$region->name}}">
                        </div>

                        <div class="form-group">
                            <label>Region</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" name="city_id"
                                    style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
                                    @foreach($cities  as $city)
                                        <option value="{{$city->id}}" @if($city->id== $city->city_id)
                                        selected @endif class="form-control">{{ $city->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                        <button type="submit" class="btn btn-success float-right">Edit This Region</button>
                        <a href="{{route('regions.index')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

