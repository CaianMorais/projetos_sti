<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Novo Projeto Criado</title>
</head>

<body class="bg-light">
  <div class="container">
    <img class="ax-center my-10" src="https://portal.fiero.org.br/storage/logo/xMDMpmS1XNvADgvMFHJQihoxNJ6sHcdQudcOccMO.png" width="220" height="60" alt="Logo do SENAI" title="Logo do SENAI" />
    <div class="card p-6 p-lg-10 space-y-4">
      <h1 class="h3 fw-700">
        Temos Novidades!
      </h1>
      <p>
        Nossa equipe postou um novo projeto chamado <strong>{{ $projeto->nome_projeto }}</strong>.
        Voce pode conferir mais detalhes sobre o projeto acessando-o pelo botão abaixo.
      </p>
      <a class="btn btn-primary p-3 fw-700" href="{{ route('projetos.ver_projeto', $projeto->id) }}">Ver o projeto</a>
    </div>
    <img class="ax-center mt-10" src="https://portal.fiero.org.br/storage/logo/xMDMpmS1XNvADgvMFHJQihoxNJ6sHcdQudcOccMO.png" width="220" height="60" alt="Logo do SENAI" title="Logo do SENAI" />
    <div class="text-muted text-center my-6">
      Se voce não quer mais receber <br>
      notificações do STI - SENAI/RO<br>
      mande-nos uma mensagem <a href="{{ route('contato') }}">aqui</a>.<br>
    </div>
  </div>
</body>
</html>