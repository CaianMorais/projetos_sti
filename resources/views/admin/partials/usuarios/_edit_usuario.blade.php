<form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nome Completo</label>
        <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $user->name) }}">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $user->email) }}">
    </div>
    <div class="form-group">
        <label for="perfil">Perfil</label>
        <select name="perfil" id="perfil" class="form-control" required value="{{ old('perfil', $user->perfil_id) }}">
            <option value="">Selecione um perfil</option>
            @foreach($perfis as $perfil)
                <option value={{ $perfil->id }} {{ $user->perfil_id == $perfil->id ? 'selected' : '' }}>{{ $perfil->nome_perfil }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group text-end">
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>