@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Color" parentPageUrl="{{route('colors.index')}}" currentPageTitle="Edit Color">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Update Color</h2>
    </div>
    <div class="card-body">

        <form action="{{route('colors.update', $color->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$color->name}}">
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>

@endsection
