@extends('layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.usuarios.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome Completo</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="perfil">Perfil</label>
                    <select name="perfil" id="perfil" class="form-control" required>
                        <option value="">Selecione um perfil</option>
                        @foreach($perfis as $perfil)
                            <option value="{{ $perfil->id }}">{{ $perfil->nome_perfil }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">Criar Usuário</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
