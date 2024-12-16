@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                {{-- PARTIAL DE FORMULARIO DE EDITAR PROJETO --}}
                @include('admin.partials.projetos._edit_projeto')

                {{-- PARTIAL DE TABELA DE FOTOS DO PROJETO --}}
                @include('admin.partials.projetos._fotos_projeto')
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Digite mais detalhes sobre o projeto'
        });

        const form = document.querySelector('.form');
        const detalhesInput = document.getElementById('detalhes');
        form.addEventListener('submit', function () {
            detalhesInput.value = quill.root.innerHTML;
        });

        const minValueInput = document.getElementById('min_value');
        const maxValueInput = document.getElementById('max_value');

        // mascara de moeda
        Inputmask({
            alias: "currency",
            prefix: "R$ ",
            groupSeparator: ".",
            radixPoint: ",",
            digits: 2,
            autoUnmask: true,
            removeMaskOnSubmit: true,
            rightAlign: false
        }).mask([minValueInput, maxValueInput]);
    });

    const fotoUpload = document.getElementById('formFileMultiple');
    const submitBtn = document.getElementById('publicar');

    fotoUpload.onchange = function () {
        let arquivoGrande = false;

        for (let i = 0; i < this.files.length; i++) {
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
    };
</script>


@endsection