@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header text-end">
            <a href="{{ route('admin.equipe.criar') }}" class="btn btn-primary">Novo membro</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    {{-- PARTIAL DA TABELA EQUIPE --}}
                    @include('admin.partials.equipe._table_equipe')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const deleteLinks = document.querySelectorAll('.delete-member');

    deleteLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); 

            const deleteUrl = this.getAttribute('href');

            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter essa ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        });
    });
</script>
@endsection