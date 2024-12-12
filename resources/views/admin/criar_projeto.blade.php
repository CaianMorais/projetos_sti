@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                {{-- PARTIAL DO FORMULARIO DE CRIAR PROJETO --}}
                @include('admin.partials.projetos._create_projeto')
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

        // máscara de moeda
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
    
</script>

@endsection