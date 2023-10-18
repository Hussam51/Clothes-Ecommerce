<x-admin-layout>
    @section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Roles</a></li>
          <li class="breadcrumb-item active">Index</li>
        </ol>
      </div><!-- /.col -->
    @endsection

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Create New Role</a>
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
        @foreach ($roles as $key => $role)
            <tr>
                @php
                    $i = 0;
                @endphp
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a  class="btn btn-info" href="{{ route('admin.roles.show', $role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        <form  style="display:inline-block" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $roles->render() !!}





</x-admin-layout>
