@extends('layouts.admin')

@section('content')

<div class="col-12 col-lg-12">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">Boas-vindas ao manual de adminitrador do Projetos STI</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informações</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="projetos-tab" data-bs-toggle="tab" href="#projeto" role="tab" aria-controls="profile" aria-selected="false">Projetos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="equipe-tab" data-bs-toggle="tab" href="#equipe" role="tab" aria-controls="equipe" aria-selected="false">Equipe</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p class="my-2">Para começarmos, é de suma importância que 
                            todos os administradores tenham ciência de que tudo nesse 
                            módulo é de acesso exclusivo dos administradores e que ações 
                            tomadas (exclusões e alterações) sem o devido conhecimento
                            são irreversíveis.<br><br>
                            Mas não precisa se preocupar com cliques dados em locais 
                            errados, o famoso miss click, em caso de você sem querer
                            apertar no botão para deletar um projeto no menu <strong>
                            Projetos</strong>, por exemplo, você irá ver uma tela para
                            confirmar a ação, o que deixa mais seguro a erros sem 
                            intenção.<br><br>
                            Esse manual vai ajudar você a entender como administrar este
                            sistema seguindo regras aplicadas durante o desenvolvimento e 
                            também com recomendações para deixar a visualização do nosso
                            usuário final mais responsiva e agradável.<br><br>
                            Esse simples mas preciso manual trará informações sobre:<br>
                                <ul>
                                    <li>Como criar um projeto seguindo as regras de formulário.</li>
                                    <li>Como editar um projeto e alterar as fotos dos projetos.</li>
                                    <li>Como excluir um projeto.</li>
                                    <li>Como adicionar um membro na equipe seguindo as regras de formulário.</li>
                                    <li>Como editar um membro da equipe e alterar sua foto.</li>
                                    <li>Como deletar um membro da equipe.</li>
                                </ul><br>
                            Também é válido mencionar que caso precise entrar em contato para pedir 
                            uma melhoria, reportar um erro, ou até mesmo tirar uma dúvida que foi
                            esquecida através desse manual, basta abrir um chamado no <a target="_blank"
                            href="http://glpi.fiero.org.br"> GLPI</a> com a categoria <strong>TI > APLICATIVOS 
                            > PROJETOS STI</strong>.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="projeto" role="tabpanel" aria-labelledby="projetos-tab">
                        <h4>1. Como postar um projeto no site:</h4><br>
                        - Acesse o menu <strong>Projetos</strong> no menu lateral;<br>
                        - No canto superior direito da tabela, aperte no botão: <button class="btn btn-primary">Postar novo projeto</button><br>
                        - Preencha o formulário seguindo as seguintes regras e recomendações:<br><br>
                        <ul>
                            <li>O campo Nome do Projeto e Autor do Projeto tem que conter menos de 255 caracteres;</li>
                            <li>O campo Valor Mínimo e Valor Máximo deve receber apenas números, o próprio formulário formatará ele com a pontuação;</li>
                            <li>O Valor Máximo deve ter um valor maior que valor mínimo;</li>
                            <li>O Valor Máximo deve ter um valor maior que valor mínimo;</li>
                            <li>O campo Descrição não tem um limite de caracteres, mas é recomendado que seja escrito uma pequena sinopse do projeto para melhorar a visualização final;</li>
                            <li>O campo Mais detalhes, pode ser escrito da forma como você achar melhor, podendo usar letras em negrito, itálico e sublinhas em diferentes tamanhos de fonte;</li>
                            <li>O campo Fotos do projeto só aceitará fotos em formato .jpg, .jpeg, .png e pode receber qualquer quantidade de fotos, porém uma única foto não pode ultrapassar o limite de 8MB de armazenamento, caso ultrapasse você receberá um alerta na tela e o formulário bloqueará o botão de publicar;</li>
                            <li>É recomendado começar a preencher o formulário de projeto pela foto, pois dependendo da quantidade de foto e da qualidade da internet no momento, o servidor pode demorar pra receber essas fotos e se o formulário for enviado e as fotos forem incompletas, o sistema não vai cadastrar o projeto.</li>
                        </ul>
                        - Caso alguma das regras seja violada você receberá um alerta em vermelho no topo da tela informando que alguma regra do formulário foi violada;<br>
                        - Se você preencheu tudo corretamente no formulário, você receberá um alerta verde no topo da tela confirmando a postagem do projeto;<br>
                        - Se você preencheu tudo no formulário e ao apertar em publicar não receber nenhum alerta no topo tela e ele não está na tabela de projetos, significa que sua publicação caiu em um erro não tratado do sistema, nesse caso tente novamente e caso aconteça novamente logo em seguida, abra um chamado para a equipe de desenvolvimento entrar em ação;<br>
                        - Ao publicar, seu projeto estará automaticamente postado no topo da tela de Projetos no site principal do Projetos STI e visível para todos com as informações que você preencheu na criação;<br><br>
                        <h4>2. Como editar um projeto postado:</h4><br>
                        - Acesse o menu <strong>Projetos</strong> no menu lateral;<br>
                        - No centro da tela, se você tiver um projeto postado, ele aparecerá numa tabela;<br>
                        - A última coluna da tabela, aperte no lápis ( <i class="bi bi-pencil-fill"></i> ) que representa a edição daquele projeto postado;<br>
                        - No formulário que será carregado, altere as informações necessárias;<br>
                        - <strong>ATENTE-SE AS REGRAS DO FORMULÁRIO PASSADAS NO TUTORIAL DE CRIAÇÃO!</strong><br>
                        - Após alterar as informações necessárias, basta apertar no botão <button class="btn btn-primary">Atualizar</button> no final do formulário;<br>
                        - Assim como na criação, se tudo estiver dentro dos conformes, um alerta verde aparecerá no topo da tela;<br><br>
                        <h4>3. Como alterar as fotos de um projeto:</h4><br>
                        - Ainda dentro do formulário de edição, você verá uma tabela com uma miniatura da foto publicada junto daquele projeto;<br>
                        - Para remover uma foto, basta apertar uma vez no botão <button class="btn btn-danger">Excluir</button> na linha da foto na tabela;<br>
                        - Para adicionar uma foto ou mais, apenas insira-as no formulário e aperte em <button class="btn btn-primary">Atualizar</button><br>
                        - <strong>ATENTE-SE AS REGRAS PARA ADICIONAR FOTOS NO TUTOTIAL DE CRIAÇÃO!</strong><br><br>
                        <h4>4. Como excluir um projeto:</h4><br>
                        - Acesse o menu <strong>Projetos</strong> no menu lateral;<br>
                        - Na última coluna da tabela de projetos, ao lado do lápis, você verá um ícone de lixo ( <i class="text-danger bi bi-trash-fill"></i> );<br>
                        - Ao apertar, um alerta de confirmação aparecerá no meio da tela para confirmar sua ação;<br>
                        - <strong>CUIDADO AO PROSSEGUIR, POIS ESSA AÇÃO É IRREVERSÍVEL</strong>
                        
                    </div>
                    <div class="tab-pane fade" id="equipe" role="tabpanel" aria-labelledby="equipe-tab">
                        <h4>1. Como adicionar um membro a equipe:</h4><br>
                        - Acesse o menu <strong>Equipe</strong> no menu lateral;<br>
                        - No canto superior direito da tabela, aperte no botão: <button class="btn btn-primary">Novo membro</button><br>
                        - Preencha o formulário seguindo as seguintes regras e recomendações:<br><br>
                        <ul>
                            <li>O campo Nome Completo tem que conter menos de 255 caracteres;</li>
                            <li>O campo Telefone deve receber apenas números, o próprio formulário formatará ele com os caracteres especiais;</li>
                            <li>O campo Bio deve conter menos de 100 caracteres e deve ser um descrição bem simples sobre a pessoa;</li>
                            <li>Os campos LinkedIn e Instagram, podem receber os links para as redes sociais da pessoa respectivamente, e também podem ser nulas/vazias;</li>
                            <li>O campo Descrição não tem um limite de caracteres, mas recomendo não se prolongar tanto tendo em vista que o card de usuário no layout principal do sistema não é muito espaçoso;</li>
                            <li>O campo Foto só aceitará UMA foto em formato .jpg, .jpeg, .png. A foto não pode ultrapassar o limite de 8MB de armazenamento, caso ultrapasse você receberá um alerta na tela e o formulário bloqueará o botão de cadastrar;</li>
                            <li>É recomendado começar a preencher o formulário de cadastro pela foto, pois dependendo da qualidade da foto e da internet no momento, o servidor pode demorar pra receber essa foto e se o formulário for enviado e a foto chegar incompleta, o sistema não vai cadastrar o membro da equipe.</li>
                        </ul>
                        - Caso alguma das regras seja violada você receberá um alerta em vermelho no topo da tela informando que alguma regra do formulário foi violada;<br>
                        - Se você preencheu tudo corretamente no formulário, você receberá um alerta verde no topo da tela confirmando o cadastro do membro na equipe;<br>
                        - Se você preencheu tudo no formulário e ao apertar em cadastrar não receber nenhum alerta no topo tela e ele não está na tabela de membros da equipe, significa que seu cadastro caiu em um erro não tratado do sistema, nesse caso tente novamente e caso aconteça novamente logo em seguida, abra um chamado para a equipe de desenvolvimento entrar em ação;<br>
                        - Ao cadastrar, a pessoa cadastrada estará automaticamente na tela de Equipe no site principal do Projetos STI e visível para todos com as informações que você preencheu no cadastro;<br><br>
                        <h4>2. Como editar um membro da equipe:</h4><br>
                        - Acesse o menu <strong>Equipe</strong> no menu lateral;<br>
                        - No centro da tela, se você tiver uma pessoa cadastrada, ele(a) aparecerá numa tabela;<br>
                        - A última coluna da tabela, aperte no lápis ( <i class="bi bi-pencil-fill"></i> ) que representa a edição daquele membro da equipe;<br>
                        - No formulário que será carregado, altere as informações necessárias;<br>
                        - <strong>ATENTE-SE AS REGRAS DO FORMULÁRIO PASSADAS NO TUTORIAL DE CADASTRO!</strong><br>
                        - Após alterar as informações necessárias, basta apertar no botão <button class="btn btn-primary">Atualizar</button> no final do formulário;<br>
                        - Assim como no cadastro, se tudo estiver dentro dos conformes, um alerta verde aparecerá no topo da tela;<br><br>
                        <h4>3. Como alterar a foto de um membro:</h4><br>
                        - Ainda dentro do formulário de edição, você verá uma miniatura da foto da pessoa;<br>
                        - Para alterar a foto, basta usar o campo abaixo da foto atual e escolher uma nova foto, e apertar em <button class="btn btn-primary">Atualizar</button><br>
                        - A foto será automaticamente adicionada e antiga removida, e já será possível visualizar a nova foto dentro do formulário de edição;<br>
                        - <strong>ATENTE-SE AS REGRAS PARA ADICIONAR FOTO NO TUTOTIAL DE CADASTRO!</strong><br><br>
                        <h4>4. Como excluir um membro da equipe:</h4><br>
                        - Acesse o menu <strong>Equipe</strong> no menu lateral;<br>
                        - Na última coluna da tabela de membros da equipe, ao lado do lápis, você verá um ícone de lixo ( <i class="text-danger bi bi-trash-fill"></i> );<br>
                        - Ao apertar, um alerta de confirmação aparecerá no meio da tela para confirmar sua ação;<br>
                        - <strong>CUIDADO AO PROSSEGUIR, POIS ESSA AÇÃO É IRREVERSÍVEL</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection