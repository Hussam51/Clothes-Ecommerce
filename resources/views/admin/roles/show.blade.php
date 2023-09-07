<x-admin-layout>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong><br/>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <p style="width: 30% ;display:inline-block" class="label label-success">{{ $v->name }},</p>
                @endforeach
            @endif
        </div>
    </div>
</div>

</x-admin-layout>