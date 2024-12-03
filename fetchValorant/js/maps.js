const BASE_URL = "https://valorant-api.com/v1";

const addImage = (src, click) => {
    const img = document.createElement("img");
    img.width = "100";
    img.height = "100";
    img.src = src;
    img.onclick = click;
    document.body.appendChild(img);
}

// 2. Mostrar los mapas
fetch(`${BASE_URL}/maps`)
    .then(res => res.json())
    .then(jsonResponse => {
        jsonResponse.data.forEach(map => addImage(map.splash, null));
    }
    );