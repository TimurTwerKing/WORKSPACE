const BASE_URL = "https://valorant-api.com/v1";

const addImage = (src, click) => {
    const img = document.createElement("img");
    img.width = "100";
    img.height = "100";
    img.src = src;
    img.onclick = click;
    document.body.appendChild(img);
}

const divResults = document.getElementById('container');

// 1. Mostrar los agentes
// 1.1 Mostrar descripción agente al hacer click
fetch(`${BASE_URL}/agents`)
    .then(res => res.json())
    .then(jsonResponse => {
        jsonResponse.data.forEach(agent => {
            addImage(agent.displayIconSmall, () => {
                divResults.innerHTML = agent.description;
            });
        });
    }
    );