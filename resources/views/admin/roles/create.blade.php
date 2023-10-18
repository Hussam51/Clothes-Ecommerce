<x-admin-layout>
    @section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Role</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </div><!-- /.col -->
    @endsection
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
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
    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <x-label id="">Name:</x-label>
                    <x-input type="text" name="name" value="" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <x-label id="">Permission:</x-label>
                    <br />
                    @foreach ($permissions as $value)
                        <div style="width:30% ;display:inline-block">

                            <input type="checkbox" name="permission[]" value="{{ $value->id }}" />
                            <label for="{{ $value->name }}">{{ $value->name }} </label>
                        </div>
                    @endforeach
                    {{-- <x-checkbox name="permission[]" :checked={{''}} > --}}

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <x-primary-button>create</x-primary-button>
            </div>
        </div>
    </form>

</x-admin-layout>
