<x-admin-layout>

    @section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Role</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    @endsection
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
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
    <form action="{{ route('admin.roles.update',$role->id) }}" method="POST">
        @csrf
        @method('PATCH')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <x-label id="">Name:</x-label>
                <x-input type="text" name="name" :value={{$role->name}} />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <x-label id="">Permission:</x-label>
                <br />
                @foreach ($permission as $value)
                    <div style="width:25% ;display:inline-block">

                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" @checked(in_array($value->id,$rolePermissions)) />
                        <label for="{{ $value->name }}">{{ $value->name }} </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>






</x-admin-layout>
