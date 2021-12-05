<x-layout>
    @section('title', 'Update Goal')
    @section('content_header')
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="m-0 text-dark">
                    Update Goal
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Update Goal</li>
                </ol>
            </div>
        </div>
    @stop

    @section('content')
        <div class="card">
            <form method="POST" action="{{ route('goals.update', $goal->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="account_id">Acount</label>
                            <select id="account_id" name="account_id"
                                class="form-control {{ $errors->has('account_id') ? 'is-invalid' : '' }}">
                                <option selected>Choose...</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                        {{ $account->id === $goal->account_id ? 'selected' : '' }}>
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('account_id') }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                id="name" name="name" placeholder="Name" value="{{ old('name', $goal->name) }}">
                            @error('name')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="deadline">Target Date</label>
                            <input type="text" class="form-control {{ $errors->has('deadline') ? 'is-invalid' : '' }}"
                                id="deadline" name="deadline" value="{{ old('deadline', $goal->deadline) }}">
                            @error('deadline')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('deadline') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="balance">Opening Balance</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="balance">$</span>
                                </div>
                                <input type="text" class="form-control {{ $errors->has('balance') ? 'is-invalid' : '' }}"
                                    id="balance" name="balance" placeholder="Opening Balance"
                                    aria-describedby="inputGroupPrepend2" value="{{ old('balance', $goal->balance) }}">
                                @error('balance')
                                    <div class=" invalid-feedback">
                                        {{ $errors->first('balance') }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="amount">Target</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="amount">$</span>
                                </div>
                                <input type="text" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                                    id="amount" name="amount" placeholder="Target" aria-describedby="inputGroupPrepend2"
                                    value="{{ old('amount', $goal->amount) }}">
                                @error('amount')
                                    <div class=" invalid-feedback">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Goal</button>
                </div>
            </form>
        </div>
    @stop
</x-layout>
