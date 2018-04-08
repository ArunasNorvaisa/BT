/* Panaudodami ciklus:
1) Atspausdinkite pradinius mašinų duomenis.
2) Apskaičiuokite vidutinį automobilio greitį kilometrais per valandą ir jei jis viršija 60 km/h, atspausdinkite jį kartu su automobilio valstybiniais numeriais.

Pradiniai duomenys:
var auto = [
    ['ZBG 123', 98450, 3645],
    ['ABC 345', 1500, 91],
    ['LRS 222', 49506, 3250],
    ['LRS 222', 0, 0]
]; */

var auto = [
    ['ZBG 123', 98450, 3645],
    ['ABC 345', 1500, 91],
    ['LRS 222', 49506, 3250],
    ['KDC 521', 9999, 300]
];

var headerAuto = ['Valstybinis numeris', 'Nuvažiuotas atstumas', 'Sugaištas laikas'];

createTable(headerAuto, auto);

function createTable(header, data) {
    var table = '';

    //Sukuriama lenteles tag'as
    table += '<table class="table">';
    //Pradeda apsirasyti lenteles antrastine dalis
    table += '<thead>';
    //Sukuriama antrastes eilute
    table += '<tr>';
    //Sukame cikla per head masyvo elementus. Ciklas vykdomas iki masyvo pabaigos
    for(var i=0; i < header.length; i++){
        //Sukuriamas stulpelis, kuriame pavadinimas yra paimamas is masyvo i-tojo (1,2,3,...) elemento
        table += '<th>' + header[i] + '</th>';
    }
    table += '</tr>';
    table += '</thead>';
    //Pradedam apsirašyti lentelės body strukturą
    table += '<tbody>';
    //Sukamas ciklas per automobilių masyvą
    for(var i=0; i < data.length; i++){
        //Kiekvienam automobilio masyvui sukuriama nauja eilutė
        table += '<tr>';
        //Sukamas ciklas per automobilių masyvo elementą t.y. per automobilį
        for(var j = 0; j < data[i].length; j++){
            //Dedama automobilio reikšmes į stulpelius
            table += '<td>' + data[i][j] + '</td>';
        }
        table += '</tr>';
    }
    table += '</tbody>';
    table += '</table>';
    document.querySelector('.car-table').innerHTML = table;
}

document.querySelector('#find').addEventListener('click', function () {
    //Paimami pradiniai duomenys ir saugomi laikinajam masyve
    var oldAutoArray = auto;

    //Sukuriamas naujas masyvas, kuriame bus saugomi automobiliai, kurie viršyja vidutinį 60km/h greiti
    var newAutoArray = [];

    //Sukuriami kintamieji, kurie saugos automobilio greitį, laiką atstumą
    var greitis, atstumas, laikas;

    //Sukamas ciklas per automobiliu masyvą, kad suskaičiuotumėme vidutinį greitį
    for(var i=0; i < oldAutoArray.length; i++){
        atstumas = oldAutoArray[i][1];
        laikas = oldAutoArray[i][2];

        //Apskaiciuojame vidutini greiti km/h
        greitis = (atstumas / 1000) / (laikas / 3600);

        //Suapvaliname greiti i didziaja puse
        greitis = Math.ceil(greitis);

        //Itraukiame vidutini greiti prie automobilio
        oldAutoArray[i].push(greitis);

        //Tikriname ar vidutis greitis yra virsijamas
        if(greitis >= 60){
            //Itraukiame automobili, kuris virsijo vidutini greiti i nauja masyva
            newAutoArray.push(oldAutoArray[i]);
        }
    }
    //Sukuriama lenteles atrastine dalis su vidutiniu greiciu
    var newAutoArrayHeader = ['Valstybinis numeris', 'Nuvažiuotas atstumas', 'Sugaištas laikas', 'Vidutinis greitis'];

    //Atspausdiname rezulta, su automobiliai, kurie virsijo vidutini greiti
    createTable(newAutoArrayHeader, newAutoArray);

    //Isvalome vidutinio greicio is reiksme is masyvo
    for(var i = 0; i < oldAutoArray.length; i++) {
        //Isvalome paskuti elementa, kuris yra vidutinis greitis
        oldAutoArray[i].pop();
    }

});