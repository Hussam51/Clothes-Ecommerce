<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tag Management</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('admin.tags.create') }}"> Create New Tag</a>
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

            <th width="280px">Action</th>
        </tr>

        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    @php
                        $i = 0;
                    @endphp
                    <td>
                        {{ ++$i }}
                    </td>
                    <td>
                        {{ $tag->name }}
                    </td>


                    <td>
                        <a  class="btn btn-info" href="{{ route('admin.tags.show', $tag->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('admin.tags.edit', $tag->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            <form  style="display:inline-block" action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST">
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

    {{ $tags->links() }}

</x-admin-layout>
