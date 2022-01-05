<x-layout>

    @section('title', 'New Goal')

    @section('content_header')
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="m-0 text-dark">
                    New Goal
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">New Goal</li>
                </ol>
            </div>
        </div>
    @stop

    @section('content')
        <div class="card">
            <form method="POST" action="{{ route('goals.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="account_id">Acount</label>
                            <select id="account_id" name="account_id"
                                class="form-control {{ $errors->has('account_id') ? 'is-invalid' : '' }}">
                                <option selected>Choose...</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                        {{ old('account_id') == $account->id ? 'selected' : '' }}>
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
                                id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="deadline">Target Date</label>


                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-week"></i>
                                    </span>
                                </div>
                                <input type="text"
                                    class="form-control {{ $errors->has('deadline') ? 'is-invalid' : '' }}" id="deadline"
                                    name="deadline" value="{{ old('deadline') }}">
                                @error('deadline')
                                    <div class=" invalid-feedback">
                                        {{ $errors->first('deadline') }}
                                    </div>
                                @enderror
                            </div>
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
                                    aria-describedby="inputGroupPrepend2" value="{{ old('balance') }}">
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
                                    value="{{ old('amount') }}">
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
                    <button type="submit" class="btn btn-primary">Save Goal</button>
                </div>
            </form>
        </div>
    @stop
</x-layout>
