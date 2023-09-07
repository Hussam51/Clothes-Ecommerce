<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <a href="{{ route('admin.tags.index') }}" class="btn btn-success">Tag Index</a>



    <form method="POST" action="{{ route('admin.tags.store') }}" enctype="multipart/form-data">
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


            <div class="mt-6 p-4">
                <button type="submit" class="btn btn-info">Store</button>
            </div>


        </div>

    </form>


</x-admin-layout>
