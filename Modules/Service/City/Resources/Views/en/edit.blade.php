
@extends('Master::en.master')
@section('header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('cities.view')}}">City</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cities.edit', $city->id)}}">Edit</a></li>
    </ol>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">City</h1>
                    </div>
                    <form action="{{ route('cities.update', $city->id) }}"
                          class="padding-30" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$city->name}}">
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control select2bs4 select2-hidden-accessible" name="state_id"
                                        style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
                                    @foreach($states  as $state)
                                        <option value="{{ $state->id }}" @if($state->id == $state->state_id)
                                        selected @endif class="form-control">{{ $state->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                            <button type="submit" class="btn btn-success float-right">Edit New City</button>
                            <a href="{{route('cities.view')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

