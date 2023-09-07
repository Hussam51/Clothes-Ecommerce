<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <a href="{{ route('admin.tags.index') }}" class="btn btn-success">Tag Index</a>



    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            {{-- Name --}}
            <div class="form-group">
                <x-label id="">Name:</x-label>
                <x-input type="text" name="name" value="{{ $tag->name }}" />
            </div>


            @error('name')
                <div class="text-sm text-red-400">{{ $message }}</div>
            @enderror

            <div class="mt-6 p-4">
                <button type="submit" class="btn btn-info">Update</button>
            </div>


        </div>

    </form>


</x-admin-layout>
