var aukstis = parseInt(prompt('Iveskite auksti'));
var plotis = parseInt(prompt('Iveskite ploti'));

// console.log(aukstis);
if(aukstis <= 0 || isNaN(aukstis)) {
    aukstis = parseInt(prompt('Iveskite auksti'))
}

if(plotis <= 0 || isNaN(plotis)) {
    plotis = parseInt(prompt('Iveskite ploti'))
}

var perimetras = aukstis * 2 + 2 * plotis;
document.getElementById('perimetras').innerHTML = perimetras;
var plotas = aukstis * plotis;
document.getElementById('plotas').innerHTML = plotas;
var istrizaine = Math.sqrt(aukstis * aukstis + plotis * plotis);
document.getElementById('istrizaine').innerHTML = Math.round(istrizaine).toFixed(7);
