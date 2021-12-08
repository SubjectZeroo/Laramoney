<div class="d-flex justify-content-center align-items-center">
    @can('budgets.edit')
        <a title="Edit Budget" class="btn btn-outline-success ml-2" href="{{ route('budgets.edit', $id) }}">
            <i class="far fa-edit"></i>
        </a>
    @endcan
    @can('budgets.edit')
        <a title="Delete Budget" class="btn btn-outline-danger ml-2" data-target="#DeleteBudget" id="getBudgetId"
            data-id="{{ $id }}">
            <i class="far fa-trash-alt"></i>
        </a>
    @endcan
</div>
