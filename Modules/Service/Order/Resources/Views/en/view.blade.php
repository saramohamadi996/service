
@extends('Master::en.master')
@section('header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('orders.index')}}">Orders</a></li>
        <li class="breadcrumb-item"><a href={{ route('orders.view',0)}}>Details</a></li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3">
                <br>
{{--                <section class="content">--}}
{{--                    <div class="container-fluid">--}}
{{--                        <h2 class="text-center display-4">Enhanced Search</h2>--}}
{{--                        <form action="enhanced-results.html">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-10 offset-md-1">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Result Type:</label>--}}
{{--                                                <select class="select2 select2-hidden-accessible" multiple=""--}}
{{--                                                        data-placeholder="Any" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">--}}
{{--                                                    <option>Text only</option>--}}
{{--                                                    <option>Images</option>--}}
{{--                                                    <option>Video</option>--}}
{{--                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;">--}}
{{--                                                    <span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox"--}}
{{--                                                                                  aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">--}}
{{--                                                            <ul class="select2-selection__rendered">--}}
{{--                                                                <li class="select2-search select2-search--inline">--}}
{{--                                                                    <input class="select2-search__field" type="search" tabindex="0"--}}
{{--                                                                           autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox"--}}
{{--                                                                           aria-autocomplete="list" placeholder="Any" style="width: 422.25px;">--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                                    <span class="dropdown-wrapper" aria-hidden="true"></span>--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Sort Order:</label>--}}
{{--                                                <select class="select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">--}}
{{--                                                    <option selected="" data-select2-id="5">ASC</option>--}}
{{--                                                    <option>DESC</option>--}}
{{--                                                </select>--}}
{{--                                                <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="4" style="width: 100%;">--}}
{{--                                                    <span class="selection">--}}
{{--                                                        <span class="select2-selection select2-selection--single" role="combobox"--}}
{{--                                                              aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-8nj6-container">--}}
{{--                                                            <span class="select2-selection__rendered" id="select2-8nj6-container" role="textbox" aria-readonly="true" title="ASC">ASC</span>--}}
{{--                                                            <span class="select2-selection__arrow" role="presentation">--}}
{{--                                                                <b role="presentation"></b>--}}
{{--                                                            </span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                                    <span class="dropdown-wrapper" aria-hidden="true"></span>--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Order By:</label>--}}
{{--                                                <select class="select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true">--}}
{{--                                                    <option selected="" data-select2-id="8">Title</option>--}}
{{--                                                    <option>Date</option>--}}
{{--                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fzhh-container"><span class="select2-selection__rendered" id="select2-fzhh-container" role="textbox" aria-readonly="true" title="Title">Title</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="input-group input-group-lg">--}}
{{--                                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">--}}
{{--                                            <div class="input-group-append">--}}
{{--                                                <button type="submit" class="btn btn-lg btn-default">--}}
{{--                                                    <i class="fa fa-search"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </section>--}}
                <div class="card-header">
                    <h2>Orders Details</h2>
                </div><br>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong>User Name:</strong>
                       {{$order->user->name}}
                    </div><br>
                    <div class="col-sm-4 invoice-col">
                        <strong>Service Name:</strong>
                        {{$order->service->title}}
                    </div><br><br>
                    <div class="col-sm-4 invoice-col">
                        <strong>Specialist Name:</strong>
                        dsdsdff
                        {{$order->user->specialist_id}}
                    </div><br><br>
                    <div class="col-sm-4 invoice-col">
                        <strong>Date Order:</strong>
                        {{$order->date}}
                    </div><br><br>
                    <div class="col-sm-4 invoice-col">
                        <strong>Time Order:</strong>
                        {{$order->time}}
                    </div><br><br>
                    <div class="col-sm-4 invoice-col">
                        <strong>Amount Service:</strong>
                        {{$order->amount}}
                    </div><br><br>
                    <div class="col-sm-8 invoice-col">
                        <strong>Address:</strong>
                        Address Address Address Address Address
{{--                        {{$order->address}}--}}
                    </div><br><br>
                    <div class="col-sm-3 invoice-col">
                        <strong>Digital Verification:</strong>
                        {{$order->digital_verification}}
                    </div><br><br>
                </div><br><br><br>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    @foreach($order->orderItems as $item)
                                    <div class="card-header">
                                        <h6>{{$item->attribute->title}}</h6>
                                        <div class="card-footer" style="float: right">
                                                @if($item->amount != 0)
                                                <strong>Amount:</strong>
                                                {{number_format($item->amount)}}
                                                @else
                                                <strong>Amount:</strong>
                                                    -
                                                @endif
                                        </div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{$item->item->title}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('Master::en.layouts.data_table')
@endsection
