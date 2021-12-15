<x-layout>

    @section('title', 'New Rol')
    @section('content_header')
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="m-0 text-dark">
                    Update Rol
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Update Rol</li>
                </ol>
            </div>
        </div>
    @stop
    @section('content')
        <div class="card">
            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                id="name" name="name" placeholder="Name" value="{{ old('name', $role->name) }}">
                            @error('name')
                                <div class=" invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <h2 class="h3">
                            Lista de Permisos
                        </h2>
                        <div class="form-check">
                            @foreach ($permissions as $permission)
                                <div>
                                    <label for="">
                                        <input type="checkbox" class="form-check-input mr-2" name="permissions[]"
                                            value="{{ $permission->id }}"
                                            {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                                        {{ $permission->description }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    @stop
</x-layout>
