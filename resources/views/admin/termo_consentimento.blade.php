@extends('layouts.admin')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header text-end">
                <a href="{{ route('admin.editar_termo') }}" class="btn btn-primary">Editar termo</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {!! $termo->termo !!}
                </div>
            </div>
        </div>
    </div>

@endsection