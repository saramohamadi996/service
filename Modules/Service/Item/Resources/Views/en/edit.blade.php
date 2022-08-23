
@extends('Master::en.master')
@section('header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('items.index')}}">Items</a></li>
        <li class="breadcrumb-item"><a href="{{ route('items.edit', $item->id)}}">Edit</a></li>
    </ol>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Items</h1>
                    </div>
                    <form action="{{ route('items.update', $item->id) }}"
                          class="padding-30" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputName">Title</label>
                                <input type="text" name="title" class="form-control" value="{{$item->title}}">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Amount</label>
                                <input type="number" name="amount" class="form-control" value="{{$item->amount}}">
                            </div>

                            <div class="form-group">
                                <label>Items</label>
                                <select class="form-control select2bs4 select2-hidden-accessible" name="attribute_id"
                                        style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
                                    @foreach($attributes  as $attribute)
                                        <option value="{{ $attribute->id }}" @if($attribute->id == $attribute->attribute_id)
                                        selected @endif class="form-control">{{ $attribute->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                            <button type="submit" class="btn btn-success float-right">Edit New Items</button>
                            <a href="{{route('items.index')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

