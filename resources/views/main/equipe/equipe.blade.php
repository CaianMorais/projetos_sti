@extends('layout')

@section('content')

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Equipe</div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">Conheça nosso time</h1>
                <p class="text-white mb-4 animated slideInRight">Confira abaixo, nossa equipe responsável pela supervisão e desenvolvimento dos projetos apresentados na plataforma.</p>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="{{ asset('img/team.png') }}" alt="Banner tela inicial">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="col-md-12 col-lg-12 col-sm-12">
            {{-- PARTIAL QUE CRIA OS CARDS DE CADA MEMBRO DA EQUIPE --}}
            @include('main.equipe.partials._cards_equipe')
        </div>
    </div>
</div>

<div class="modal fade" id="modalMembro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('main.equipe.partials._modal_equipe')
</div>

{{-- SCRIPT QUE FAZ REQUISIÇÃO AJAX. CASO NÃO CARREGUE A FOTO,
COMENTE ESSE SCRIPT E USE O SCRIPT COMENTADO DE BAIXO --}}
<script src="{{ asset('js/modal_equipe.js') }}"></script>

{{--
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("modalMembro");

        modal.addEventListener("show.bs.modal", function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute("data-id");
            const url = `/equipe/${id}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("modal-content").innerHTML = `
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid rounded-circle p-4 text-center" width="256" height="256" src="{{ asset('storage/') }}/${data.path_foto}" alt="Foto de ${data.nome}">
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">${data.nome}</h5>
                            <h5 class="mb-0"><i class="fa-solid fa-phone"></i> ${data.telefone}</h5>
                        </div>
                        <div class="d-flex justify-content-start">
                            <small class="mb-2">${data.bio}</small>
                        </div>
                        <p>${data.descricao}</p>
                        <div class="d-flex justify-content-center mt-3">
                            ${data.linkedin ? `<a class="btn btn-square btn-primary m-1" href="${data.linkedin}" target="_blank"><i class="fab fa-linkedin-in"></i></a>` : ""}
                            ${data.instagram ? `<a class="btn btn-square btn-primary m-1" href="${data.instagram}" target="_blank"><i class="fab fa-instagram"></i></a>` : ""}
                        </div>
                    `;
                    document.getElementById("tituloModalMembro").innerText = "Detalhes de " + data.nome;
                })
                .catch(error => {
                console.error("Erro ao carregar informações do membro:", error);
                document.getElementById("modal-content").innerHTML = `
                    <p class="text-danger">Erro ao carregar as informações. Tente novamente mais tarde.</p>
                `;
            });
        });
    });
</script>
--}}


@endsection