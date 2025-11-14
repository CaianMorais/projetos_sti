@php
    use Illuminate\Support\Facades\App;

    $locale = App::getLocale();
    $lang = $locale === 'en' ? 'en' : 'pt';
@endphp

<div class="row">
    @foreach($equipe as $membro)
        <div class="col-md-4 col-lg-3 col-sm-12">
            <div class="col-12 wow fadeIn" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <div class="team-item bg-white text-center rounded p-4 pt-0">
                    <img class="img-fluid rounded-circle p-4" src="{{ asset('storage/' . $membro->path_foto) }}"
                        alt="Foto de {{ $membro->nome }}">
                    <h5 class="mb-0">{{ $membro->nome }}</h5>
                    <small>{{ $membro->bio }}</small>
                    <div class="d-flex justify-content-center mt-3">
                        @if(!is_null($membro->linkedin))
                            <a class="btn btn-square btn-primary m-1" href="{{ $membro->linkedin }}" target="_blank" title="LinkedIn"><i
                                    class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if(!is_null($membro->lattes))
                            <a class="btn btn-square btn-primary m-1" href="{{ $membro->lattes }}" target="_blank" title="Lattes"><i
                                    class="fa-regular fa-id-badge"></i></a>
                        @endif
                        <a class="btn btn-square btn-primary m-1" title="{{ __('equipe.card.detalhes') }}" data-id="{{ $membro->id }}" data-lang="{{ $lang }}" data-bs-toggle="modal" data-bs-target="#modalMembro"
                            href="javascript:void(0);"><i class="fa-solid fa-info"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>