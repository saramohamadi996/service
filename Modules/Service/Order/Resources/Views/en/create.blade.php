@extends('Master::en.master')
@section('header')
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('orders.index')}}">Order</a></li>
            <li class="breadcrumb-item"><a href={{ route('orders.create')}}>Create</a></li>
        </ol>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-10" style="margin-left: 7%; margin-bottom: 1%">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Order</h3>
                </div>
                <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label for="inputName">Date</label>
                                    <input type="date" name="date" class="form-control" placeholder="Date" autofocus>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="inputName">Time</label>
                                    <input type="time" name="time" class="form-control" placeholder="Time" autofocus>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName">Amount</label>
                            <input type="number" name="amount" class="form-control" placeholder="Amount" autofocus>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Category</label>
                                    <select class="form-control select2" name="user_id" style="width: 100%;">
                                        @foreach($users  as $user)
                                            <option value="{{ $user->id }}" @if($user->id == old('user_id'))
                                            selected @endif class="form-control">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Specialist</label>
                                    <select class="form-control select2" name="specialist_id" style="width: 100%;">
                                        @foreach($specialists as $specialist)
                                            <option value="{{ $specialist->id }}" @if($specialist->id == old('specialist_id'))
                                            selected @endif>{{ $specialist->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address</label>
                                    <select class="form-control select2" name="address_id" style="width: 100%;">
                                        @foreach($addresses as $address)
                                            <option value="{{ $address->id }}" @if($address->id == old('address_id'))
                                            selected @endif>{{ $address->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName">Digital Verification</label>
                            <input type="text" name="digital_verification" class="form-control" placeholder="Order Digital Verification" autofocus>
                        </div>
                    </div>
                    <div class="col-md-10 d-flex" style="margin-left: 7%; margin-bottom: 2%">
                        <button type="submit" class="btn btn-success float-right">Create New Order</button>
                        <a href="{{route('orders.index')}}" class="btn btn-secondary" style="margin-left:1%">Cancel</a>
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

