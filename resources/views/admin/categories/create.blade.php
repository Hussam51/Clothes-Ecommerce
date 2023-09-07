<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <a href="{{ route('admin.categories.index') }}" class="btn btn-success">Category Index</a>



    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row">

            <div class="form-group">
                <x-label id="">Name:</x-label>
                <x-input type="text" name="name" value="" />
            </div>


            @error('name')
                <div class="text-sm text-red-400">{{ $message }}</div>
            @enderror

            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                <div class="mt-1">
                    <input type="file" id="image" name="img" />
                </div>
                @error('image')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" >
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <textarea id="description" rows="3" cols="35" name="description"
                        class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                    </textarea>
                </div>
                @error('description')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6 p-4">
                <button type="submit" class="btn btn-info">Store</button>
            </div>


        </div>

    </form>


</x-admin-layout>
