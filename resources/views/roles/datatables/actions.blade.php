<div class="d-flex justify-content-center align-items-center">
    @can('roles.edit')
        <a title="Edit Rol" class="btn btn-outline-success ml-2" href="{{ route('roles.edit', $id) }}">
            <i class="far fa-edit"></i>
        </a>
    @endcan
    @can('roles.edit')
        <a title="Delete Rol" class="btn btn-outline-danger ml-2" data-target="#DeleteRol" id="getRolId"
            data-id="{{ $id }}">
            <i class="far fa-trash-alt"></i>
        </a>
    @endcan
</div>
