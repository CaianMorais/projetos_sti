<table class="table table-striped mb-0 table-centered">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">NOME</th>
            <th class="text-center">E-MAIL</th>
            <th class="text-center">PERFIL</th>
            <th class="text-center">CRIADO EM</th>
            <th class="text-center">AÇÃO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $user)
        <tr>
            <td class="text-center">{{ $user->id }}</td>

            <td class="text-center">{{ $user->name }}</td>

            <td class="text-center">{{ $user->email }}</td>

            <td class="text-center">{{ $user->perfil->nome_perfil }}</td>
            
            <td class="text-center">
                {{ date_format($user->created_at, 'd/m/Y H:i')}}
            </td>

            <td class="d-flex justify-content-around align-items-center">
                <a href="{{ route('admin.usuarios.editar', $user->id) }}" title="Editar">
                    <i class="bi bi-pencil-fill"></i>
                </a>
                <form action="{{ route('admin.usuarios.sendResetLink', $user->id) }}" method="post" id="resetForm-{{ $user->id }}" style="display:inline;">
                    @csrf
                    <button type="button" class="btn btn-link p-0 reset-btn" data-id="{{ $user->id }}" title="Enviar link de redefinição de senha">
                        <i class="bi bi-key-fill" style="color:rgb(255, 69, 69);"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>