@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Color" parentPageUrl="{{route('colors.index')}}" currentPageTitle="Add New Color">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Create a New Color</h2>
    </div>
    <div class="card-body">

        <form action="{{route('colors.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                @error("name") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>

    </div>
</div>

@endsection