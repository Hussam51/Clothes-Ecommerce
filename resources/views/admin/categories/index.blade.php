<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories Management</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> Create New Category</a>
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
            <th>Image</th>
            <th width="280px">Description</th>
            <th width="280px">Action</th>
        </tr>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    @php
                        $i = 0;
                    @endphp
                    <td>
                        {{ ++$i }}
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <img width="120" height="120" src="{{ Storage::url($category->image) }}" />

                    </td>
                    <td>
                        {{ $category->description }}
                    </td>
                    <td>
                        <a  class="btn btn-info" href="{{ route('admin.categories.sizes.index', $category->id) }}">Sizes</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            <form  style="display:inline-block" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan

                        {{-- <div>
                            <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div> --}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $categories->links() }}

</x-admin-layout>
