@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                {{-- PARTIAL DE CRIAR MEMBRO DA EQUIPE --}}
                @include('admin.partials.equipe._create_equipe')
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>

<script>
    const telefoneInput = document.getElementById('telefone');

    // máscara de moeda
    Inputmask({
        mask: "(99) 99999-9999",
        digits: 11,
        autoUnmask: true,
        removeMaskOnSubmit: false,
        rightAlign: false
    }).mask([telefoneInput]);

    const fotoUpload = document.getElementById('formFile');
    const submitBtn = document.getElementById('cadastrar');

    fotoUpload.onchange =function(){
        if (this.files[0].size > 8388607){
            Swal.fire({
                title: 'Alerta',
                text: "A foto não pode ultrapassar o limite de 8MB",
                icon: 'error',
            });
            submitBtn.disabled = true;
        }
        else
        {
            submitBtn.disabled = false;
        }
    }
</script>

@endsection