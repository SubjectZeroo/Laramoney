<div class="d-flex justify-content-center align-items-center">
    {{-- <a title="Ver Cuenta" class="btn btn-outline-primary ml-2" href="">
        <i class="far fa-eye"></i>
    </a> --}}
    <a title="Details Account" class="btn btn-outline-primary ml-2" href="{{ route('accounts.show', $id) }}">
        <i class="far fa-eye"></i>
    </a>
    <a title="Edit Account" class="btn btn-outline-success ml-2" href="{{ route('accounts.edit', $id) }}">
        <i class="far fa-edit"></i>
    </a>
    <a title="Delete Account" class="btn btn-outline-danger ml-2" data-target="#DeleteAccount" id="getAccountId"
        data-id="{{ $id }}">
        <i class="far fa-trash-alt"></i>
    </a>
</div>
