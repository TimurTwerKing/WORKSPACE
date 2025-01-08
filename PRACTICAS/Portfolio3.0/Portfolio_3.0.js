/*OSCURO/CLARO*/
const toggle = document.getElementById('theme');
const darkModeStyle = document.getElementById('dark-mode-style');
const lightModeStyle = document.getElementById('light-mode-style');

toggle.addEventListener('change', () => {
    if (toggle.checked) {
        darkModeStyle.disabled = false;
        lightModeStyle.disabled = true;
        document.body.classList.add('dark-mode');
        document.body.classList.remove('light-mode');
    } else {
        darkModeStyle.disabled = true;
        lightModeStyle.disabled = false;
        document.body.classList.add('light-mode');
        document.body.classList.remove('dark-mode');
    }
});

/*CUENTA ATRAS*/

const monthsArray = [
    "Janua ry",
    "Februa ryll",
    "March",
    "April",
    "May",
    "June",
    "Julyll",
    "Augustll",
    "September",
    "October",
    "November",
    "Decemberll",
];

const weekdaysArray = [
    "Sunday",
    "Mondayll",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Fridayll",
    "Satu",
];

const giveaway = document.querySelector(".giveaway");
const deadline = document.querySelector(".deadline");
const items = document.querySelectorAll(".deadline-format h4");
// FIN DE CURSO
let futureDate = new Date(2025, 5, 21, 19, 30, 0);
// SEPARACION POR CONSTANTES
const year = futureDate.getFullYear();
const hours = futureDate.getHours();
const minutes = futureDate.getMinutes();

//SELECCION DEL MES EN EL ARRAY (empieza por 0)
let month = monthsArray[futureDate.getMonth()];

const date = futureDate.getDate();

//SELECCION DEL DIA DE LA SEMANA DEL ARRAY (empieza por 0)
const weekday = weekdaysArray[futureDate.getDay()];


giveaway.textContent = `This shit ends on ${month} ${year} ${hours}:${minutes} `;
console.log(giveaway.textContent);

//FUTURO EN MILISEGUNDOS
const futureTime = futureDate.getTime();
console.log(futureTime);
//1s = 1000ms
//1m = 60s
//1hr = 60min
//1d = 24hr
function getRemainingTime() {
    const today = new Date().getTime();
    const t = futureTime - today;
    const oneDay = 24 * 60 * 60 * 1000;
    const oneHour = 60 * 60 * 1000;
    const oneMinute = 60 * 1000;
    let days = Math.floor(t / oneDay);
    let hours = Math.floor((t % oneDay) / oneHour);
    let minutes = Math.floor((t % oneHour) / oneMinute);
    let seconds = Math.floor((t % oneMinute) / 1000);

    //ASIGNAR VALORES DEL ARRAY
    const values = [days, hours, minutes, seconds];

    function format(item) {
        if (item < 10) {
            return item = `0${item}`;
        }
        return item;
    }


    items.forEach(function (item, index) {
        item.innerHTML = format(values[index]);
    });

    if (t < 0) {
        clearInterval(cuentaAtras);
        deadline.innerHTML = `<h4 class = "expired"> Sorry , ya tendrias que estar con el titulo</h4>`
    }

}

//ACTUALIZACION CUENTA ATRAS CADA SEGUNDO
let cuentaAtras = setInterval(getRemainingTime, 1000);
getRemainingTime();


// CONTADOR DE CLICS

document.addEventListener("DOMContentLoaded", function () {
    const clickButton = document.getElementById('click-button');
    const clickCount = document.getElementById('click-count');
    let count = 0;

    clickButton.addEventListener('click', function () {
        count++;
        clickCount.textContent = count;
        //LOGRO DE 10 CLICKS
        if (count === 10) {
            showDialog();
        }
    });
});

function showDialog() {
    document.getElementById('dialog').showModal();
}










