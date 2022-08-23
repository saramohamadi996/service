
@extends('Master::en.master')
@section('header')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('cities.view',$state_id)}}">City</a></li>
            <li class="breadcrumb-item"><a href={{ route('cities.add',$state_id)}}>Create</a></li>
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
                <form action="{{ route('cities.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="City Name" autofocus required>
                        </div>

                        <input type="hidden" name="state_id" value="{{$state_id}}">

                    </div>

                    <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                        <button type="submit" class="btn btn-success float-right">Create New City</button>
                        <a href="{{route('cities.view', $state_id)}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection

