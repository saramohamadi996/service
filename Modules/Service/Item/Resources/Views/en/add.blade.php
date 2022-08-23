
@extends('Master::en.master')
@section('header')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('items.view',$attribute_id)}}">Item</a></li>
            <li class="breadcrumb-item"><a href={{ route('items.add',$attribute_id)}}>Create</a></li>
        </ol>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Item</h1>
                </div>
                <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="Item Title" autofocus required>
                        </div>

                        <div class="form-group">
                            <label for="inputName">Amount</label>
                            <input type="number" name="amount" class="form-control" placeholder="Amount" autofocus>
                        </div>

                        <input type="hidden" name="attribute_id" value="{{$attribute_id}}">

                    </div>

                    <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                        <button type="submit" class="btn btn-success float-right">Create New Item</button>
                        <a href="{{route('items.view', $attribute_id)}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection

