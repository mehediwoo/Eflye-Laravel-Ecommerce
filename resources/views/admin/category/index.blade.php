@extends('admin.app.app')
@section('title','All-Category')
@section('content')

<div class="container mt-3">
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Dashboard /</span>All Category</h4>
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-1">Add</a>
    @include('admin.app.flash')
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @if (!empty($category) && $category->count() > 0)
                @foreach ($category as $key => $category_iteam)
                <tr>
                    <td>
                        <strong>{{ $key+1 }}</strong>
                    </td>
                    <td>{{ $category_iteam->title }}</td>
                    <td>{{ $category_iteam->slug }}</td>
                    <td>
                        @if ($category_iteam->status == 1)
                        <a href="{{ route('category.status',$category_iteam->id) }}">
                            <span class="badge bg-label-success me-1">Enable</span>
                        </a>
                        @else
                        <a href="{{ route('category.status',$category_iteam->id) }}">
                            <span class="badge bg-label-danger me-1">Disable</span>
                        </a>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('category.edit',$category_iteam->id) }}" class="text-warning text-left"><i class="bx bx-edit-alt me-1"></i></a>
                        <form action="{{ route('category.destroy',$category_iteam->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-danger" style="border: none;background:none;margin:-10px 0px"><i class="bx bx-trash me-1"></i></button>
                        </form>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr class="alert alert-danger">
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger">Category Not Found!</td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                </tr>
                @endif
            </tbody>
          </table>
          {{ $category->links() }}
        </div>
      </div>
</div>

@endsection
