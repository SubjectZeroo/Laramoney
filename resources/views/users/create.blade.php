<x-layout>

    @section('title', 'New User')

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
                    <li class="breadcrumb-item active">New User</li>
                </ol>
            </div>
        </div>
    @stop

    @section('content')
        <div class="card">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Email</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" name="email" placeholder="Name" value="{{ old('email') }}">
                            @error('email')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="password">Contraseña</label>
                            <input id="password" name="password" type="password"
                                class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label for="password-confirm">Confirmar contraseña</label>
                            <input id="password-confirm" name="password-confirm"
                                class="form-control  {{ $errors->has('password-confirm') ? 'is-invalid' : '' }}"
                                type="password">
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save User</button>
                </div>
            </form>
        </div>
    @stop
</x-layout>
