@extends('layouts.admin')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header text-end">
                <a href="{{ route('admin.criar') }}" class="btn btn-primary">Postar novo projeto</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- PARTIAL DA TABELA --}}
                        @include('admin.partials.projetos._table_projetos')

                    </div>
                </div>
                @if ($contagem > 20)
                <div class="card-footer d-flex justify-content-center">
                    <ul class="pagination pagination-primary">
                        {{-- PARTIAL DO PAGINATE (SE HOUVER MAIS DE 20 PROJETOS)--}}
                        @include('admin.partials.projetos._paginate_table')
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        const deleteLinks = document.querySelectorAll('.delete-project');

        deleteLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); 

                const deleteUrl = this.getAttribute('href');

                Swal.fire({
                    title: 'Tem certeza?',
                    text: "TODAS as mensagens relacionadas a esse projeto também serão deletados.",
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