const BASE_URL = "https://valorant-api.com/v1";

const addImage = (src, click) => {
    const img = document.createElement("img");
    img.width = "100";
    img.height = "100";
    img.src = src;
    img.onclick = click;
    document.getElementById("weapon-images").appendChild(img);
}

// 3. Mostrar las armas
// 3.1 Mostrar vídeo armas al hacer click
fetch(`${BASE_URL}/weapons`)
    .then(res => res.json())
    .then(jsonResponse => {
        jsonResponse.data.forEach(weapon => addImage(weapon.displayIcon, () => {

            const skin = weapon.skins.find(
                skin => !!skin.levels.find(level => !!level.streamedVideo) || !!skin.chromas.find(chroma => !!chroma.streamedVideo)
            );

            const level = skin.levels.find(level => !!level.streamedVideo);
            const chroma = skin.chromas.find(chroma => !!chroma.streamedVideo);

            const vid = document.createElement('video');
            vid.src = level ? level.streamedVideo : chroma.streamedVideo;
            vid.autoplay = true;
            vid.controls = true;

            const divResults = document.getElementById('video-container');
            divResults.innerHTML = '';
            divResults.appendChild(vid);
        }));
    })
    .catch(error => {
        console.error("Error fetching weapons:", error);
    });

