<div class="d-flex justify-content-center align-items-center">
    {{-- <a title="Ver Cuenta" class="btn btn-outline-primary ml-2" href="">
        <i class="far fa-eye"></i>
    </a> --}}
    <a title="Edit Goal" class="btn btn-outline-success ml-2" href="{{ route('goals.edit', $id) }}">
        <i class="far fa-edit"></i>
    </a>
    <a title="Delete Goal" class="btn btn-outline-danger ml-2" data-target="#DeleteGoal" id="getGoalId"
        data-id="{{ $id }}">
        <i class="far fa-trash-alt"></i>
    </a>
</div>
