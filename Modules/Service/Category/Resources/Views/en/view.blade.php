
@extends('Master::en.master')
@section('header')
{{--    @foreach($categories as $category->iteme)--}}
        <li><a href="{{route('categories.view',0)}}" title="categories">Categories</a></li>
{{--    @endforeach--}}
@endsection
@section('content')
<section class="content">
    <div class="card">
            <div class="card-header">
            <h1 class="card-title">Categories</h1>
            <a href="{{ route('categories.add', $parent_id)}}"
               class="btn btn-sm btn-primary" style="float: right">Created New Category</a>
        </div>
        <div class="card-body p-0">
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->description}}</td>

                        @if($category->image != null)
                            <td width="80" height="40">
                                <img src="{{asset($category->image)}}" width="80" height="40">
                            </td>
                        @else
                            <td width="80" height="40">
                                <img src="{{asset('panel/dist/img/AdminLTELogo.png')}}" width="80" height="40">
                            </td>
                        @endif
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('categories.view', $category->id)}}">
                                <i class="fas fa-list"></i>
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('categories.destroy', $category->id)}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="d-flex justify-content-center">
{{--    {!! $categories->links() !!}--}}
</div>
@endsection
@section('js')
    @include('Master::en.layouts.data_table')
@endsection
