@extends('layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            {{-- PARTIAL COM FORM DE CRIAÇÃO DE USUÁRIO --}}
            @include('admin.partials.usuarios._create_usuario')
        </div>
    </div>
</div>
@endsection
