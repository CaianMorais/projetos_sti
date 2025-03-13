@extends('layouts.admin')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('admin.atualizar_termo') }}" method="post" class="form">
                        @csrf
                        <input type="hidden" id="termo" name="termo">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div id="editor">
                                    {!! old('termo', $termo->termo) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" id="salvar" class="btn btn-primary me-1 mb-1">Salvar</button>
                            <a href="{{ route('admin.termo') }}" type="button" class="btn btn-secondary me-1 mb-1">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Digite o termo de consentimento',
            });

            const form = document.querySelector('.form');

            const termoInput = document.getElementById('termo');

            form.addEventListener('submit', function () {
                termoInput.value = quill.root.innerHTML;
            });
        });
    </script>

@endsection