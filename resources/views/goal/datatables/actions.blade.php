<div class="d-flex justify-content-center align-items-center">
    @if ($remaining <= 0)
        <span class="badge badge-success">Goal Reached</span>
    @else
        <button title="Deposit" class="btn btn-outline-primary ml-2" data-toggle="modal"
            data-target="#ModalDeposit-{{ $goal->id }}">
            <i class="far fa-plus-square"></i>
        </button>
    @endif
    @can('goals.edit')
        <a title="Edit Goal" class="btn btn-outline-success ml-2" href="{{ route('goals.edit', $goal->id) }}">
            <i class="far fa-edit"></i>
        </a>
    @endcan
    @can('goals.destroy')
        <a title="Delete Goal" class="btn btn-outline-danger ml-2" data-target="#DeleteGoal" id="getGoalId"
            data-id="{{ $goal->id }}">
            <i class="far fa-trash-alt"></i>
        </a>
    @endcan
</div>

<!-- Modal -->
<div class="modal fade" id="ModalDeposit-{{ $goal->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deposit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('goals.deposit') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="sr-only" for="deposit">Deposit</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" name="goal_id" value="{{ $goal->id }}" readonly hidden>
                            <input type="text" class="form-control {{ $errors->has('deposit') ? 'is-invalid' : '' }}"
                                id="deposit" name="deposit" placeholder="Deposit">
                            @error('deposit')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('deposit') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
