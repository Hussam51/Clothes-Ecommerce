

<x-admin-layout>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Product</h2>
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
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            {{-- Name --}}
            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <div class="">
                    <x-label id="">Name:</x-label>
                    <x-input type="text" name="name" value="" />
                </div>
            </div>
            {{-- price --}}
            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <div class="">
                    <x-label id="">Price:</x-label>
                    <x-input type="number" name="price" value="" />
                </div>
            </div>
            {{--  quantity --}}
            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <div class="">
                    <x-label id="">Quantity:</x-label>
                    <x-input type="number" name="quantity" value="" />
                </div>
            </div>
        </div>
        {{--  Image --}}
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
                    <textarea type="text" name="description" value="" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <x-label id="">Category:</x-label>

                <select name="category_id" multiple class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach

                </select>


            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 text-left">
                <x-label id="">Tags:</x-label>
                <select name="tags[]" multiple class="form-select">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <x-primary-button>Create</x-primary-button>
            </div>
        </div>
    </form>




</x-admin-layout>
