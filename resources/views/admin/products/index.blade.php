<x-admin-layout>

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
                <td><img width="100" height="100" src="{{Storage::url($product->image)}}"/></td>
                <td>
                    @foreach ($product->tags as $tag)
                        {{ $tag->name }}
                        @if ($product->tags->count() > 1)
                            {{ '-' }}
                        @endif
                    @endforeach

                </td>
                <td>{{ $product->description }}</td>
                <td >

                        <a class="btn btn-info sm" href="{{ route('admin.products.show', $product->id) }}" >Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary sm" href="{{ route('admin.products.edit', $product->id) }}" >Edit</a>
                        @endcan
                        <form style="display: inline-block" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                     <a style="display: inline-block" class="btn btn-success sm" href="{{ route('admin.products.sizes.index', $product->id) }}" >Sizes</a>
                </td>
            </tr>
        @endforeach
    </table>



</x-admin-layout>
