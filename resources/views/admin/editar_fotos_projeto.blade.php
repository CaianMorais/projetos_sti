@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                {{-- PARTIAL DE TABELA DE FOTOS DO PROJETO --}}
                @include('admin.partials.projetos._fotos_projeto')
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

    const fotoUpload = document.getElementById('formFileMultiple');
    const submitBtn = document.getElementById('publicar');

    fotoUpload.onchange = function () {
        let arquivoGrande = false;

        for (let i = 0; i < this.files.length; i++) {
            //8388607 = 8MB
            if (this.files[i].size > 8388607) {
                arquivoGrande = true;
                break;
            }
        }

        if (arquivoGrande) {
            Swal.fire({
                title: 'Alerta',
                text: "Uma foto está ultrapassando o limite de 8MB",
                icon: 'error',
            });
            submitBtn.disabled = true;
        } else {
            submitBtn.disabled = false;
        }
    }
});
</script>

@endsection