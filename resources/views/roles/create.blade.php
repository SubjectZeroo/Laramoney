<x-layout>

    @section('title', 'New Rol')
    @section('content_header')
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="m-0 text-dark">
                    New Rol
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">New Rol</li>
                </ol>
            </div>
        </div>
    @stop
    @section('content')
        <div class="card">
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Nombre de Rol</label>
                            <input name="name" id="name" type="text"
                                class="form-control
                                   {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                placeholder="Ingrese el nombre del rol" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <h2 class="h3">
                            Lista de Permisos
                        </h2>
                        <div class="form-group">
                            @foreach ($permissions as $permission)
                                <div>
                                    <label for="">
                                        <input type="checkbox" class="mr-2" name="permissions[]"
                                            value="{{ $permission->id }}">
                                        {{ $permission->description }}
                                    </label>
                                </div>
                            @endforeach
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
