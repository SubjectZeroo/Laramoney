<div class="d-flex justify-content-center align-items-center">
    @can('categories.edit')
        <a title="Edit Category" class="btn btn-outline-success ml-2" href="{{ route('categories.edit', $id) }}">
            <i class="far fa-edit"></i>
        </a>
    @endcan
    @can('categories.destroy')
        <a title="Delete Category" class="btn btn-outline-danger ml-2" data-target="#DeleteCategory" id="getCategoryId"
            data-id="{{ $id }}">
            <i class="far fa-trash-alt"></i>
        </a>
    @endcan
</div>
