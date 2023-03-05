@extends('admin.app.app')
@section('title','Edit-'.$edit_category->title)
@section('content')

<div class="container mt-3">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/ </span>{{ $edit_category->title }}</h4>
    <a href="{{ route('category.index') }}" class="btn btn-primary mb-1">Back</a>
    @include('admin.app.flash')
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Category</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('category.update',$edit_category->id) }}" method="POST">
                @csrf
                @method('PUT')
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="title">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" value="{{ $edit_category->title }}">
                  @error('title')
                      <p class="text-danger" style="text-size:10px">{{ $message }}</p>
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
