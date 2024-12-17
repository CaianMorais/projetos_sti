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
                    {{-- PARTIAL DA TABELA DE USUARIOS --}}
                    @include('admin.partials.usuarios._table_usuarios')
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