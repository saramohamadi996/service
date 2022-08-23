@extends('Master::en.master')
@section('header')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('services.index')}}">Service</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.edit', $service->id)}}">Edit</a></li>
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
                <form action="{{ route('services.update', $service->id) }}" class="padding-30"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">

                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$service->title}}">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{$service->slug}}">
                    </div>

                    <div class="form-group">
                        <label for="inputName">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control"
                               value="{{$service->meta_description}}">
                    </div>


                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="inputName">Base Price</label>
                                <input type="number" name="base_price" class="form-control" value="{{$service->base_price}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="inputName">Approved Price</label>
                                <input type="number" name="approved_price" class="form-control" value="{{$service->approved_price}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label for="inputName">Commission</label>
                                <input type="number" name="commission" class="form-control" value="{{$service->commission}}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="inputName">Priority</label>
                                <input type="number" name="priority" class="form-control" value="{{$service->priority}}">
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
                            <img src="{{asset($service->image)}}" width="80">
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="inputName">Description</label>
                            <textarea id="mytextarea" name="description">{!! $service->description !!}</textarea>
                        </div>
                </div>
                        <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                            <button type="submit" class="btn btn-success float-right">Edit This Service</button>
                            <a href="{{route('services.index')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
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



