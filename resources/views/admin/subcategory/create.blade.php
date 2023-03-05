@extends('admin.app.app')
@section('title','Create-Sub Category')
@section('content')

<div class="container mt-3">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span>Add Sub-Category</h4>
    <a href="{{ route('sub-category.index') }}" class="btn btn-primary mb-1">Back</a>
    @include('admin.app.flash')

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add Sub-Category</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('sub-category.store') }}" method="POST">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="title">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Sub-Category title...." value="{{ old('title') }}">
                  @error('title')
                      <p class="text-danger" style="text-size:10px">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="title">Parent Category</label>
                <div class="col-sm-10">
                <select id="defaultSelect" class="form-select" name="category_id">
                    @if (!empty($parent_category) && $parent_category->count() > 0)
                        <option value="">Select Parent Category</option>
                        @foreach($parent_category as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                        @endforeach
                    @else
                    <option class="text-danger">Parent Category is empty!</option>
                    @endif
                </select>
                @error('category_id')
                    <p class="text-danger" style="text-size:10px">{{ $message }}</p>
                @enderror
                </div>
            </div>

            @if (!empty($parent_category) && $parent_category->count() > 0)
            <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            @else
            <div class="col-sm-10 alert alert-danger">
                <p>Parent Category is empty, please create parent category first!</p>
            </div>
            @endif

            </form>
          </div>
        </div>
      </div>
</div>

@endsection
