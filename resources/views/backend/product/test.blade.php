<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-sm-right">
                    <a href="{{ route('products.create') }}" type="button"
                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
                        <i class="bx bx-user-plus mr-1"></i>
                        Add Product
                    </a>
                </div>
                <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="package_title">

                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="" method="POST" id="product_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="package_id" id="package_id" value="">

                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" placeholder="Product name"
                                                name="name" id="name" aria-label="ProductName">
                                            <p class="text-danger error"></p>
                                        </div>
                                        <div class="col">

                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity"
                                                value="{{old('quantity')}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control @error(" image") is-invalid
                                                @enderror" name="image" id="image" alt="image">
                                            <img id="showImagePreview" src="#" alt="book image preview" height="50px"
                                                width="50px">
                                            @error("image")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="category_id">Color</label>
                                            <select class="" name="color_id[]" id="category_id">
                                                <option value="" disabled selected>Select Color</option>
                                                @foreach ($colors as $key=>$color)
                                                <option value="{{$color->id}}">{{$color->name}}</option>
                                                @endforeach
                                                @error("color") <span class="text-danger">{{$message}}</span> @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="category_id">Size</label>
                                            <select class="form-control" name="size_id[]" id="size_id">

                                                @foreach ($sizes as $key=>$size)
                                                <option value="{{$size->id}}">{{$size->title}}</option>
                                                @endforeach
                                                @error("color") <span class="text-danger">{{$message}}</span> @enderror
                                            </select>
                                        </div>
                                        <div class="col">

                                            <label for="category_id">Status</label>
                                            <select class="form-control" name="status" id="">
                                                <option value="1">Publish</option>
                                                <option value="0">UnPublish</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer d-flex justify-content-center">

                                    <button type="sumbit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

                {{-- product listing --}}
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%">S.No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>quantity</th>
                            <th>size</th>
                            <th>color</th>
                            <th>status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tablecontents">
                        @forelse ($products as $product)



                        <tr class="row1" data-id="{{ $product->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="/storage/product-image/{{ $product->image }}" width="100" height="50"></td>
                            <td>{{ $product->quantity }}</td>
                             @foreach ($product->sizes as $item)
                                <td>{{ $item->title }}</td> 
                             @endforeach
                            {{-- {{-- <td>{{ $product->publisher }}</td> --}}

                            <td>{{ $product->status }}</td> 


                            <td>
                                <div class="float-right d-flex">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
@push('inlinejs')
<script>
    jQuery(document).ready(function() {
            jQuery('#product_form').submit(function(e) {
                e.preventDefault();
                const bookingData = new FormData(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ route('products.store') }}",
                    method: 'post',
                    data: bookingData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {

                        if (response.success == true) {
                            
                            toastr.success(response.message);
                          
                        }

                        $("#product_form")[0].reset();
                        $(".error").html('');
                    },
                    error: function(response) {
                        console.log(response.responseJSON.errors);
                        $.each(response.responseJSON.errors, function(index, key) {
                            if (index == 'name') {
                                console.log(key[0]);
                                $('#name').parent().find(".error").html(key[0]);

                            }
                            if (index == 'status') {
                                console.log(key[0]);
                                $('#status').parent().find(".error").html(key[0]);
                            }
                            if (index == 'size') {
                                console.log(key[0]);
                                $('#size').parent().find(".error").html(key[0]);
                            }

                            if (index == 'color') {
                                console.log(key[0]);
                                $('#color').parent().find(".error").html(key[0]);
                            }
                            if (index == 'quantity') {
                                console.log(key[0]);
                                $('#quantity').parent().find(".error").html(key[0]);
                            }


                        })
                    }
                });
            });
        });
</script>
@endpush