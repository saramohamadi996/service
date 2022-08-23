
@extends('Master::en.master')
@section('header')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('states.index')}}">State</a></li>
            <li class="breadcrumb-item"><a href={{ route('states.create')}}>Create</a></li>
        </ol>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">State</h1>
                </div>
                <form action="{{ route('states.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="State Name" autofocus required>
                        </div>

                    </div>

                    <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                        <button type="submit" class="btn btn-success float-right">Create New State</button>
                        <a href="{{route('states.index')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection

