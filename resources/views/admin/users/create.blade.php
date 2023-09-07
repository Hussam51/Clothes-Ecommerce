<x-admin-layout>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New User</h2>
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
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                <div class="form-group">
                    <x-label id="">Name:</x-label>
                    <x-input type="text" name="name" value="" />
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                <div class="form-group">
                    <x-label id="">Email:</x-label>
                    <x-input type="email" name="email" value="" />
                </div>
            </div>

            <div class="form-group">
                <x-label id="">Password:</x-label>
                <x-input type="password" name="password" value="" />
            </div>


            <div class="form-group">
                <x-label id="">Confirm password:</x-label>
                <x-input type="password" name="confirm-password" value="" />
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-left"  >
                <x-label id="">Roles:</x-label>
                <div class="form-group" >

                    <select name="roles[]" multiple class="form-select">
                        @foreach ($roles as $role)
                            <option  value="{{ $role }}"> {{ $role }}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <x-primary-button>Create</x-primary-button>
            </div>
        </div>
    </form>




</x-admin-layout>
