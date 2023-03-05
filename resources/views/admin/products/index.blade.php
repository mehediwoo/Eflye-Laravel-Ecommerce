@extends('admin.app.app')
@section('title','All-Products')
@section('content')

<div class="container mt-3">
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Dashboard /</span>All Product</h4>
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-1">Add</a>
    @include('admin.app.flash')
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Size</th>
                <th>Color</th>
                <th>QTY</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @if (!empty($allProduct) && $allProduct->count() > 0)
                @foreach ($allProduct as $key => $product)
                <tr>
                    <td>
                        <strong>{{ $key+1 }}</strong>
                    </td>
                    <td>{{ substr($product->title,0,15) }}</td>
                    @if ($product->category->status ==1)
                        <td class="text-success">
                            <span class="text-dark">Parent</span>  : {{ $product->category->title }} <br>
                            <span class="text-dark">Child</span>   : {{ $product->sub_category->title }}
                        </td>
                    @else
                        <td class="text-danger">
                            <span class="text-dark">Parent</span> : {{ $product->category->title }} <br>
                            <span class="text-dark">Child</span>  : {{ $product->sub_category->title }}
                        </td>
                    @endif

                    <td>
                        <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="product-image" style="height: 70px;width:50px">
                    </td>
                    @php
                        $size = explode(',',$product->size);
                        $color = explode(',',$product->color);
                    @endphp
                    <td class="text-center">
                        @foreach ($size as $size)
                        <span class="badge rounded-pill bg-primary">{{ $size }}</span><br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach ($color as $color)
                        <span class="badge rounded-pill bg-primary">{{ $color }}</span><br>
                        @endforeach
                    </td>
                    <td>{{ $product->qty }}</td>
                    <td>$ {{ $product->price }}</td>
                    <td>
                        @if ($product->status == 1)
                        <a href="{{ route('product.status',$product->id) }}">
                            <span class="badge bg-label-success me-1">Enable</span>
                        </a>
                        @else
                        <a href="{{ route('product.status',$product->id) }}">
                            <span class="badge bg-label-danger me-1">Disable</span>
                        </a>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('product.edit',$product->id) }}" class="text-warning"><i class="bx bx-edit-alt me-1"></i></a>
                            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-danger" style="border: none;background:none;margin:-10px 0px"><i class="bx bx-trash me-1"></i></button>
                            </form>
                        </div>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr class="alert alert-danger">
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger">Product Not Found!</td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                    <td class="text-center alert alert-danger"></td>
                </tr>
                @endif
            </tbody>
          </table>
          {{-- {{ $allProduct->links() }} --}}
        </div>
      </div>
</div>

@endsection
