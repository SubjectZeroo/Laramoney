<div class="d-flex justify-content-center align-items-center">
    @can('transactions.edit')
        <a title="Edit Transaction" class="btn btn-outline-success ml-2" href="{{ route('transactions.edit', $id) }}">
            <i class="far fa-edit"></i>
        </a>
    @endcan
    @can('transactions.destroy')
        <a title="Delete Transaction" class="btn btn-outline-danger ml-2" data-target="#DeleteTransaction"
            id="getTransactiontId" data-id="{{ $id }}">
            <i class="far fa-trash-alt"></i>
        </a>
    @endcan
</div>
