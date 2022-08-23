@extends('Master::en.master')
@section('header')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('services.index')}}">Service</a></li>
            <li class="breadcrumb-item"><a href={{ route('services.create')}}>Create</a></li>
        </ol>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Service</h3>
                </div>
                <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Service Title" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputSlug">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Service Slug" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputName">Meta Description</label>
                            <input type="text" name="meta_description" class="form-control" placeholder="Meta Description" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputName">Priority</label>
                            <input type="number" name="priority" class="form-control" placeholder="Priority" autofocus>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="inputName">Base Price</label>
                                    <input type="number" name="base_price" class="form-control" placeholder="Base Price" autofocus>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="inputName">Approved Price</label>
                                    <input type="number" name="approved_price" class="form-control" placeholder="Approved Price" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="inputName">Commission</label>
                                    <input type="number" name="commission" class="form-control" placeholder="Service Commission" autofocus>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Category</label>
                                    <select class="form-control select2" name="category_id" style="width: 100%;">
                                        @foreach($categories  as $category)
                                            <option value="{{ $category->id }}" @if($category->id == old('category_id'))
                                            selected @endif class="form-control">{{ $category->showCategoriesParent() }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <select class="form-control select2" name="tag" style="width: 100%;">
                                    <option value="" class="form-control"></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image" class="btn btn-primary float-right" style="margin-right: 5px;">
                        </div>

                         <br>

                        <div class="form-group">
                            <label for="inputName">Description</label>
                            <textarea id="mytextarea" name="description"></textarea>
                        </div>

                        <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                            <button type="submit" class="btn btn-success float-right">Create New Service</button>
                            <a href="{{route('services.index')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('/panel/plugins/tinymce/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
    @include('Master::en.layouts.tinymce')
@endsection

