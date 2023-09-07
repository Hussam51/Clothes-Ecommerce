<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <a href="{{ route('admin.categories.index') }}" class="btn btn-success">Category Index</a>



    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            {{-- Name --}}
            <div class="form-group">
                <x-label id="">Name:</x-label>
                <x-input type="text" name="name" value="{{ $category->name }}" />
            </div>


            @error('name')
                <div class="text-sm text-red-400">{{ $message }}</div>
            @enderror
            {{-- Image --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                <div class="mt-1">
                    <input type="file" id="image" name="image"
                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />

                    <img width="120" height="120" src="{{ Storage::url($category->image) }}" />

                </div>

                @error('image')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror

            </div>
            {{-- Description --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <textarea id="description" rows="3" cols="35" name="description"
                        class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                {{ $category->description }}
                    </textarea>
                </div>
                @error('description')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6 p-4">
                <button type="submit" class="btn btn-info">Update</button>
            </div>


        </div>

    </form>


</x-admin-layout>
