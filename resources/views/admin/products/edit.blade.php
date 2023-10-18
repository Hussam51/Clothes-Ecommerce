
<x-admin-layout>
    @section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Product</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    @endsection
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.products.update',$product->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <div class="form-group">
                    <x-label id="">Name:</x-label>
                    <x-input type="text" name="name" value="{{$product->name}}" />
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <div class="">
                    <x-label id="">Price:</x-label>
                    <x-input type="number" name="price" value="{{$product->price}}" />
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <div class="">
                    <x-label id="">Quantity:</x-label>
                    <x-input type="number" name="quantity" value="{{$product->quantity}}" />
                </div>
            </div>


        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 text-left">
            <div class="">
                <x-label id="">Image:</x-label>
                <x-input type="file" name="image"  />
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <div class="">
                    <x-label id="">Description :</x-label>
                    <textarea type="text" name="description" class="form-control">{{$product->description}}</textarea>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <x-label id="">Category:</x-label>

                <select name="category" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($product->category->id==$category->id)> {{ $category->name }}</option>
                    @endforeach

                </select>


            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <x-label id="">Tags:</x-label>
                <select name="tags[]" multiple class="form-select">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @selected(in_array($tag->id,$productTags))> {{ $tag->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <x-primary-button>Create</x-primary-button>
            </div>
        </div>
    </form>




</x-admin-layout>
