@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            {{-- PARTIAL DE FORM DE EDIÇÃO DE USUÁRIO --}}
            @include('admin.partials.usuarios._edit_usuario')
        </div>
    </div>
</div>

@endsection