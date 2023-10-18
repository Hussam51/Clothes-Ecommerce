<x-admin-layout>
    @section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Product</a></li>
      <li class="breadcrumb-item active">Sizes</li>
    </ol>
  </div><!-- /.col -->
@endsection
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sizes Management</h2>
            </div>
            <div class="pull-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary sm" data-toggle="modal" data-target="#exampleModalCenter">
                    Create new size
                </button>
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
            <th>Size</th>

            <th width="280px">Action</th>
        </tr>

        <tbody>
            @foreach ($product->productSizes as $size)
                <tr>
                    @php
                        $i = 0;
                    @endphp
                    <td>
                        {{ ++$i }}
                    </td>
                    <td>
                        {{ $size->value }}
                    </td>


                    <td>


                        {{-- <form style="display:inline-block"
                            action="{{ route('admin.categories.sizes.delete', [$category->id, $size->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form> --}}

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="storesize" method="POST"
                        action="{{ route('admin.products.sizes.store', $product->id) }}">
                        @csrf
                        @method('POST')
                        <x-label>Size</x-label>
                        <select name="sizes[]" multiple class="form-select">
                            @foreach ($sizes as $size)
                                <option value="{{$size->id}}" @selected(in_array($size->id,$productsizes))>{{$size->value}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary sm" value="Send" form="storesize" />
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
