<div class="d-flex justify-content-center align-items-center">
    @can('users.edit')
        <a title="Edit Goal" class="btn btn-outline-success ml-2" href="{{ route('goals.edit', $id) }}">
            <i class="far fa-edit"></i>
        </a>
    @endcan
    @can('users.destroy')
        <a title="Delete Goal" class="btn btn-outline-danger ml-2" data-target="#DeleteUser" id="getUserId"
            data-id="{{ $id }}">
            <i class="far fa-trash-alt"></i>
        </a>
    @endcan
</div>
