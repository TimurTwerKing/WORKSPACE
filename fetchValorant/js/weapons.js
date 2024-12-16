const BASE_URL = "https://valorant-api.com/v1";

// Muestra las estadísticas de un arma
const showWeaponStats = (stats) => {
    const statsContainer = document.getElementById("stats-container");
    statsContainer.innerHTML = "";

    const statsList = document.createElement('ul');
    statsList.classList.add('list-disc', 'list-inside', 'text-lg', 'font-semibold', 'px-4', 'py-2');

    const specificStats = {
        "Fire Rate": stats.fireRate,
        "Magazine Size": stats.magazineSize,
        "Run Speed Multiplier": stats.runSpeedMultiplier,
        "Equip Time Seconds": stats.equipTimeSeconds,
        "Reload Time Seconds": stats.reloadTimeSeconds,
        "First Bullet Accuracy": stats.firstBulletAccuracy,
        "Shotgun Pellet Count": stats.shotgunPelletCount,
        "Wall Penetration": stats.wallPenetration?.replace("EWallPenetrationDisplayType::", "")
    };

    Object.entries(specificStats).forEach(([key, value]) => {
        if (value) {
            const statItem = document.createElement('li');
            statItem.textContent = `${key}: ${value}`;
            statsList.appendChild(statItem);
        }
    });

    statsContainer.appendChild(statsList);
};

// Añade un arma a la tabla
const addTableWeapon = (weapon) => {
    const tbody = document.getElementById("contenidoTabla");
    const row = document.createElement("tr");

    row.classList.add("hover:bg-slate-500", "transition-all", "duration-300", "cursor-pointer");
    row.onclick = () => handleWeaponClick(weapon);

    row.innerHTML = `
        <td class="border px-4 py-2">
            <img src="${weapon.killStreamIcon}" alt="${weapon.displayName}" class="w-20 h-auto mx-auto">
        </td>
        <td class="border px-4 py-2">${weapon.displayName}</td>
        <td class="border px-4 py-2">${weapon.category.replace("EEquippableCategory::", "")}</td>
        <td class="border px-4 py-2">${weapon.shopData?.cost || 'N/A'}</td>`;

    tbody.appendChild(row);
};

// Maneja el clic en un arma
const handleWeaponClick = (weapon) => {
    showWeaponStats(weapon.weaponStats);
    const videoUrl = weapon.skins.flatMap(skin => skin.levels.concat(skin.chromas)).find(level => level.streamedVideo)?.streamedVideo;

    if (videoUrl) {
        changeVideo(videoUrl);
    }

    const skinsContainer = document.getElementById('weapon-skins');
    skinsContainer.innerHTML = '';
    weapon.skins.forEach(skin => {
        if (skin.displayIcon) {
            skinsContainer.innerHTML += `
                <div class="flex items-center space-x-4 p-4 bg-gray-100 rounded-lg shadow-md">
                    <img src="${skin.displayIcon}" class="w-20 rounded hover:scale-110 transition-transform duration-300">
                    <p class="text-gray-800 font-bold">${skin.displayName}</p>
                </div>
            `;
        }
    });
};

// Cambia el video de la sección "Video"
const changeVideo = (url) => {
    const videoFrame = document.getElementById('video-frame');
    videoFrame.src = `${url}?autoplay=1&mute=1`;
};

// Fetch de armas
const fetchWeapons = async () => {
    try {
        const res = await fetch(`${BASE_URL}/weapons`);
        const { data } = await res.json();
        data.forEach(addTableWeapon);
    } catch (e) {
        console.error("Error fetching weapons:", e);
    }
};

fetchWeapons();
