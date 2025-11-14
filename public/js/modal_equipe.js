document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modalMembro");

    modal.addEventListener("show.bs.modal", function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute("data-id");
        const url = `/equipe/${id}`;
        const lang = button.getAttribute("data-lang") || 'pt';

        console.log(lang);

        fetch(url)
            .then(response => response.json())
            .then(data => {
                document.getElementById("modal-content").innerHTML = `
                    <div class="d-flex justify-content-center">
                        <img class="img-fluid rounded-circle p-4 text-center" width="256" height="256" src="storage/${data.path_foto}" alt="Foto de ${data.nome}">
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">${data.nome}</h5>
                        <h5 class="mb-0"><i class="fa-solid fa-phone"></i> ${data.telefone ?? "-"}</h5>
                    </div>
                    <div class="d-flex justify-content-start">
                        <small class="mb-2">${data.bio}</small>
                    </div>
                    <p>${data.descricao}</p>
                    <div class="d-flex justify-content-center mt-3">
                        ${data.linkedin ? `<a class="btn btn-square btn-primary m-1" href="${data.linkedin}" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>` : ""}
                        ${data.lattes ? `<a class="btn btn-square btn-primary m-1" href="${data.lattes}" target="_blank" title="Lattes"><i class="fa-regular fa-id-badge"></i></a>` : ""}
                    </div>
                `;
                if (lang === 'en') {
                    document.getElementById("tituloModalMembro").innerText = "More about " + data.nome;
                } else if (lang === 'pt') {
                    document.getElementById("tituloModalMembro").innerText = "Mais sobre " + data.nome;
                };
            })
            .catch(error => {
                console.error("Err:", error);
                if (lang === 'en') {
                    document.getElementById("modal-content").innerHTML = `
                    <p class="text-danger">Error loading information. Please try again later.</p>
                `;
                } else if (lang === 'pt') {
                    document.getElementById("modal-content").innerHTML = `
                <p class="text-danger">Erro ao carregar as informações. Tente novamente mais tarde.</p>`
                };
            });
    });
});