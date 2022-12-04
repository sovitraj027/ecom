@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Size" parentPageUrl="{{route('sizes.index')}}" currentPageTitle="Edit Size">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Update Size</h2>
    </div>
    <div class="card-body">

        <form action="{{route('sizes.update', $size->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" id="name" value="{{$size->title}}">
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>

@endsection