@extends('layouts.app')

@section('content')

    <x-breadcrumb parentPageTitle="All Book" parentPageUrl="{{route('books.index')}}"
                  currentPageTitle="Edit Book">
    </x-breadcrumb>

    <div class="card">
        <div class="card-header"><h2 class="lead text-center">Update Book</h2></div>
        <div class="card-body">

            <form action="{{route('books.update', $book->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$book->name}}">
                    @error("name") <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" value="{{$book->slug}}">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">

                        @foreach ($categories as $key=>$category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error("image") is-invalid @enderror" name="image" id="siteImage" alt="image">
                    @if(!is_null($book->image))
                        <img id="showImagePreview" src="{{ asset('storage/book-image/'.$book->image)}}" alt="book image preview" height="150px"
                             width="250px">
                    @else
                        <img id="showImagePreview" src="#" alt="book image preview" height="150px" width="250px" style="display: none;">
                    @endif

                    @error("image")
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control" name="publisher" id="publisher" value="{{$book->publisher}}">
                    @error("publisher") <span class="text-danger">{{$message}}</span> @enderror

                </div>

                <div class="form-group" id="datepicker">
                    <label for="published_at">Published_at</label>
                    <input type="text" class="form-control" name="published_at" id="datepicker" value="{{$book->published_at}}">
                    @error("published_at") <span class="text-danger">{{$message}}</span> @enderror

                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" value="{{$book->quantity}}">
                    @error("quantity") <span class="text-danger">{{$message}}</span> @enderror

                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5" cols="5">{{$book->description}}</textarea>
                    @error("description") <span class="text-danger">{{$message}}</span> @enderror

                </div>

                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>

@endsection


@push('inlinejs')
@section('scripts')
    <script>
        
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
        $('#category_id').select2();
        
        flatpickr("#datepicker", {});
        $(document).ready(function () {
            $("#name").keyup(function () {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#slug").val(Text);
            });
        });

       

    </script>
@endsection

    <script>
        window.onload = function () {

            // to display image preview
            let siteImage = document.getElementById('image');
            let showImagePreview = document.getElementById('showImagePreview');
            // showImagePreview.style.display = "none";

            siteImage.onchange = evt => {
                const [file] = siteImage.files
                if (file) {
                    showImagePreview.style.display = "block";
                    showImagePreview.src = URL.createObjectURL(file);
                    showImagePreview.onload = function () {
                        URL.revokeObjectURL(showImagePreview.src) // free memory
                    }
                }
            }
        };
    </script>
@endpush


