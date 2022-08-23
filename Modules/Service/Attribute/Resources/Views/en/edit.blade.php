
@extends('Master::en.master')
@section('header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('attributes.index')}}">Attribute</a></li>
        <li class="breadcrumb-item"><a href="{{ route('attributes.edit', $attribute->id)}}">Edit</a></li>
    </ol>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Attribute</h1>
                    </div>
                    <form action="{{ route('attributes.update', $attribute->id) }}"
                          class="padding-30" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$attribute->title}}">
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label>Type</label>
                                    <select class="form-control select2bs4 select2-hidden-accessible" name="type"
                                            style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
                                        @foreach(\Service\Attribute\Models\Attribute::$types as $type)
                                            <option value="{{ $type }}" @if($type == $attribute->type) selected @endif
                                            class="form-control">@lang($type)</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Attribute</label>
                                    <select class="form-control select2bs4 select2-hidden-accessible" name="service_id"
                                            style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
                                            @foreach($services  as $service)
                                                <option value="{{$service->id}}" @if($service->id== $attribute->service_id)
                                                selected @endif class="form-control">{{ $service->title }}</option>
                                            @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                        <button type="submit" class="btn btn-success float-right">Edit This Attribute</button>
                        <a href="{{route('attributes.index')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

