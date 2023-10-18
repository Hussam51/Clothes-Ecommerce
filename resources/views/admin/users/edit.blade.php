<x-admin-layout>

    @section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">User</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    @endsection



    @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Back</a>
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

    <form action="{{ route('admin.users.update',$user->id) }}" method="POST">
        @csrf
        @method('PATCH')

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <x-label id="">Name:</x-label>
                <x-input type="text" name="name" value="{{$user->name}}" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <x-label id="">Email:</x-label>
                <x-input type="email" name="email" value="{{$user->email}}" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <x-label id="">Password:</x-label>
                    <x-input type="password" name="password" value="{{$user->password}}" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <x-label id="">Name:</x-label>
                    <x-input type="password" name="confirm-password" value="{{$user->password}}" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>

                <select name="roles[]" multiple class="form-select">
                    <option value="">Roles</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(in_array($role->id,$userRole))> {{ $role->name }}</option>
                    @endforeach

                </select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <x-primary-button >Submit</x-primary-button>
        </div>
    </div>
    </form>




</x-admin-layout>
