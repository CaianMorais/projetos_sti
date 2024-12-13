@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                {{-- PARTIAL DE EDITAR MEMBRO DA EQUIPE --}}
                @include('admin.partials.equipe._edit_equipe')
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
</script>
@endsection