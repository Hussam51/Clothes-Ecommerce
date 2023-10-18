<x-admin-layout>
@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Products</a></li>
      <li class="breadcrumb-item active">Index</li>
    </ol>
  </div><!-- /.col -->
@endsection
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>


            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('admin.products.create') }}"> Create New Product</a>
                @endcan
            </div>
            <br />

            <form action="{{ route('admin.products.index') }}" method="get" class="form-inline">

                <div class="input-group">

                    <label> Name :</label>
                    <input type="text" name="name" class="form-control" value="{{ request()->query('name') }}" />
                    <label> Price from :</label>
                    <input type="number" name="price_from" class="form-control" placeholder="price_from"
                        value="{{ request()->query('price_from') }}" />
                    <label> Price to :</label>
                    <input type="number" name="price_to" class="form-control" placeholder="price_to"
                        value="{{ request()->query('price_to') }}" />
                    <label>Category</label>
                    <select name="category" class="form-select">
                        @foreach ($categories as $category)
                            <option value="">All</option>
                            <option value="{{ $category->id }}" @selected(request()->query('category'))>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="active" @selected(request()->query('status') == 'active')>Active</option>
                        <option value="unactive" @selected(request()->query('status') == 'unactive')>Unactive</option>

                    </select>

                    <div class="input-group-btn ">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search">Filter</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>price</th>
            <th>QY</th>
            <th>Category</th>
            <th>Image</th>
            <th width="240px">Tags</th>
            <th width="240px">Description</th>
            <th width="240px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                @php
                    $i = 0;
                @endphp
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->category->name }}</td>
                <td><img width="100" height="100" src="{{ Storage::url($product->image) }}" /></td>
                <td>
                    @foreach ($product->tags as $tag)
                        {{ $tag->name }}
                        @if ($product->tags->count() > 1)
                            {{ '-' }}
                        @endif
                    @endforeach

                </td>
                <td>{{ $product->description }}</td>
                <td>

                    <a class="btn btn-info sm" href="{{ route('admin.products.show', $product->id) }}">Show</a>
                    @can('product-edit')
                        <a class="btn btn-primary sm" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                    @endcan
                    <form style="display: inline-block" action="{{ route('admin.products.destroy', $product->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                    <a style="display: inline-block" class="btn btn-success sm"
                        href="{{ route('admin.products.sizes.index', $product->id) }}">Sizes</a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $products->withQueryString()->links() }}

</x-admin-layout>
