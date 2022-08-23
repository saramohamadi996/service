
@extends('Master::en.master')
@section('header')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('categories.view', $parent_id)}}">Categories</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.add', $parent_id)}}">Create</a></li>
        </ol>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Category</h1>
                </div>
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Category Title" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputSlug">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Category Slug" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea name="description" class="form-control"
                                      rows="4" placeholder="Category Description" autofocus></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image" class="btn btn-primary float-right" style="margin-right: 5px;">
                        </div>

                        <input type="hidden" name="parent_id" value="{{$parent_id}}">

                    </div>

                    <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                        <button type="submit" class="btn btn-success float-right">Create New Category</button>
                        <a href="{{ route('categories.view',$parent_id)}}"
                           class="btn btn-secondary" style="margin-left: 1%">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection



