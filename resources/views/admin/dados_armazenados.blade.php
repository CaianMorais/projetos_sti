@extends('layouts.admin')

@section('content')

<div class="col-12">
    {{-- PARTIAL DA ESTRUTURA INICIAL DA TABELA --}}
    @include('admin.partials.dados_armazenados._table_dados')
</div>

{{-- IMPORTAÇÃO DE BILBIOTECAS DEPENDENTES --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.0/js/dataTables.min.js"></script>

{{-- SCRIPT PARA CRIAÇÃO DA TABELA COM DATATABLES.JS --}}
<script>
    new DataTable('#dadosTabela', {
        language: {
            url: '//cdn.datatables.net/plug-ins/2.2.0/i18n/pt-BR.json',
        },
        columnDefs: [
            {
                target: 0,
                className: 'text-start'
            }
        ],
        layout: {
            topEnd: {
                search: {
                    placeholder: 'Buscar dados',
                    text:'',
                }
            }
        },
        pageLength: 25,
    });
</script>

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