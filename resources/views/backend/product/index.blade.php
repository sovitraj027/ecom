@extends('layouts.app')

@include('_includes._datatable_css')

@section('content')

<x-breadcrumb currentPageTitle="All Products"></x-breadcrumb>
<style>
    .toggle.ios,
    .toggle-on.ios,
    .toggle-off.ios {
        border-radius: 20px;
    }

    .toggle.ios .toggle-handle {
        border-radius: 20px;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-sm-right">
                    <a href="{{route('products.create')}}" type="button"
                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
                        <i class="bx bx-user-plus mr-1"></i>
                        Add Product
                    </a>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%">S.No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Custom</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tablecontents">
                        @forelse ($products as $product)

                        <tr class="row1" data-id="{{ $product->id }}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="/storage/product-image/{{ $product->image }}" width="100" height="50"></td>
                            <td>
                            
                                <input data-id="{{$product->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger"
                                    data-toggle="toggle" data-on="Publish" data-off="Unpublish" data-style="ios" {{ $product->status ? 'checked' :
                                '' }}>
                            </td>
                            <td>
                              @foreach ($product->sets as $set)
                                <input data-id="{{$set->id}}" class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="secondary"
                                    data-toggle="toggle" data-on="customize" data-off="non custom" data-style="ios" {{ $set->custom ? 'checked' :
                                '' }}>
                                @endforeach
                            </td>
                            {{-- <td>
                               <input data-id="{{$product->set->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger"
                                data-toggle="toggle" data-on="customize" data-off="Non custimizable" data-style="ios" {{ $product->set->custom ? 'checked' :
                            '' }}>
                             
                            </td> --}}
                            <td>
                                <div class="float-right d-flex">
                                    <a href="{{route('products.edit', $product->id) }}"
                                        class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>
                                    <form action="{{route('products.destroy', $product->id ) }}" method="POST">
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
@push('inlinejs')
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            $.ajax({

                type: "GET"
                , dataType: "json"
                , url: '/status/update'
                , data: {
                    'status': status
                    , 'product_id': product_id
                }
                , success: function(response) {

                    if (response.success == true) {

                        toastr.success(response.message);

                    }

                }
            , });
        })
    });

</script>
@endpush