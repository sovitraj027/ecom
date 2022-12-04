@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Size" parentPageUrl="{{route('sizes.index')}}" currentPageTitle="Add New Size">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Create a New Size</h2>
    </div>
    <div class="card-body">
        <form action="{{route('sizes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                @error("title") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>

    </div>
</div>
@endsection