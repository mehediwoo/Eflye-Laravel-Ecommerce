@extends('admin.app.app')
@section('title','Add-Product')
@section('content')
<style>
    .label-info{
        background-color: #5F61E6;
        text-align: center;
        padding: 5px 5px;
        border-radius: 6%;
    }
</style>
<div class="container mt-3">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span>Add Product</h4>
    <a href="{{ route('product.index') }}" class="btn btn-primary mb-1">Back</a>
    @include('admin.app.flash')

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add Product</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Product title...." value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="thumbnail_file">Thumbnail</label>
                    <div class="col-sm-10">
                        <input type="file" id="thumbnail_file" class="form-control" name="thumbnail">
                        @error('thumbnail')
                            <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="shortDescription">Short Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="shortDescription" name="short_desc" rows="5" value="{{ old('short_desc') }}"></textarea>
                        @error('short_desc')
                            <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="description">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="10" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="size">Size</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="size" id="size" placeholder="Product Size...." value="{{ old('title') }}" data-role="tagsinput" multiple>
                    @error('size')
                        <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="color">Color</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="color" id="color" placeholder="Product Color...." value="{{ old('title') }}" data-role="tagsinput" select multiple>
                    @error('color')
                        <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="qty">Product QTY</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="70" id="qty" name="qty" value="{{ old('qty') }}">
                    @error('qty')
                        <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="price">Price</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="$100.45" id="" name="price" value="{{ old('price') }}">
                    @error('price')
                        <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="category_id">Category</label>
                    <div class="col-sm-10">
                        @if (!empty($category) && $category->count() > 0)
                        @foreach ($category as $category)
                        <input name="category_id" class="form-check-input" type="checkbox" value="{{ $category->id }}" id="defaultRadio2">
                        <label class="form-check-label" for="defaultRadio1"> {{ $category->title }} </label><br>
                            @foreach ($category->sub_category as $sub_category)
                            <div style="margin-left: 30px">
                                <input name="sub_cat_id" class="form-check-input" type="checkbox" value="{{ $sub_category->id }}" id="defaultRadio2">
                                <label class="form-check-label" for="defaultRadio1"> {{ $sub_category->title }} </label>
                            </div>
                            @endforeach
                        @endforeach
                        @else
                        <p class="text-danger">Not Found!</p>
                        @endif
                        @error('category_id')
                            <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                        @enderror
                        @error('sub_cat_id')
                            <p class="text-danger" style="font-size:13px">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){

            $('#category_id').on('change', function() {
                $('#subCategory').removeClass('d-none');
            });
        });
    </script>
@endsection
