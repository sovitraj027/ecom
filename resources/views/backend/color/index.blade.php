@extends('layouts.app')

@include('_includes._datatable_css')

@section('content')

<x-breadcrumb currentPageTitle="All Color"></x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-sm-right">
                    <a href="{{route('colors.create')}}" type="button"
                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
                        <i class="bx bx-user-plus mr-1"></i>
                        Add Color
                    </a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%">S.No.</th>
                            <th>Name</th>

                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tablecontents">
                        @forelse ($colors as $color)

                        <tr class="row1" data-id="{{ $color->id }}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$color->name}}</td>


                            <td>
                                <div class="float-right d-flex">
                                    <a href="{{route('colors.edit', $color->id) }}"
                                        class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>

                                    <form action="{{route('colors.destroy', $color->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="btn btn-outline-danger btn-sm" type="submit" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <td>No record</td>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection

@include('_includes._datatable_js')