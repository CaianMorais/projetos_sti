@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header text-end">
            <a href="{{ route('admin.usuarios.criar') }}" class="btn btn-primary">Novo usuário</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const resetButtons = document.querySelectorAll('.reset-btn');

        resetButtons.forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.dataset.id;
                const form = document.getElementById(`resetForm-${userId}`);

                Swal.fire({
                    title: 'Enviar link de redefinição de senha?',
                    text: "O usuário receberá um e-mail com instruções para redefinir a senha.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, enviar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@endsection