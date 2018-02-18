/*
var figuros = [
    { ilgis: 2, plotis: 5, aukstis: 3 },
    { ilgis: 3, plotis: 2, aukstis: 6 },
    { ilgis: 1, plotis: 5, aukstis: 5 }
];

HTML puslapyje turi būti du mygtukai su pavadinimais: "Pradiniai duomenys" ir
"Rasti max".

Paspaudus mygtuką "Pradiniai duomenys" atspausdinkite visas figūras lentelėje
(naudokite <table>).

Paspaudus mygtuką "Rasti max" suskaičiuokite visų figūrų tūrius ir raskite
figūrą kurios tūris didžiausias.

Atspausdinkite visas figūras lentelėje su suskaičiuotais tūriais, o figūrą,
kurios tūris didžiausias, atspausdinkite kitokia spalva (spausdindami
panaudokite css klasę, pvz: <td class=“raudona”>...</td>)
*/

var figuros = [];

// Užpildom objektą 'figuros' atsitiktiniais skaičiais
var y = 0;
var z1, z2, z3;
while (y < 9) {              // '9' šiuo atveju - eilučių/masyvų kiekis objekto 'figuros' viduje
  var naujas = {};  
  z1 = Math.ceil(Math.random() * 15);
  naujas['ilgis'] = z1;
  z2 = Math.ceil(Math.random() * 18);
  naujas['plotis'] = z2;
  z3 = Math.ceil(Math.random() * 20);
  naujas['aukstis'] = z3;
  naujas['turis'] = z1 * z2 * z3;
  figuros.push(naujas);
  y ++;
}

document.querySelector('#primary-data').addEventListener('click', function() {
  printData(figuros);
})

function printData(data) {
  var table = document.querySelector('.table');

  var tbody = document.querySelector('tbody');
  if (tbody != null) {
    tbody.remove();
  }

  var tableBody = document.createElement('tbody');

  for (var i = 0; i < data.length; i++) {
    var tableBodyRow = document.createElement('tr');

// Skaičiuojame tūrį
    // var turis = data[i].aukstis * data[i].plotis * data[i].ilgis;
// Modifikuojam figuros objektą, pridėdami kiekv. figūros tūrį
    // data[i].turis = turis;

    var td = document.createElement("td")
    td.appendChild(document.createTextNode(data[i].ilgis));
    td.classList.add("text-center");
    tableBodyRow.appendChild(td);

    var td = document.createElement("td")
    td.appendChild(document.createTextNode(data[i].plotis));
    td.classList.add("text-center");
    tableBodyRow.appendChild(td);

    var td = document.createElement("td")
    td.appendChild(document.createTextNode(data[i].aukstis));
    td.classList.add("text-center");
    tableBodyRow.appendChild(td);

// Kuriame tūrio stulpelį, bet paskui jį paslepiam  ;)
    var td = document.createElement("td")
    td.appendChild(document.createTextNode(data[i].turis));
    td.classList.add("text-center");
    td.classList.add("d-none"); // paslepiam tūrį :)
    tableBodyRow.appendChild(td);

    tableBody.appendChild(tableBodyRow);
  }

  table.appendChild(tableBody);
}

console.log(figuros);

function rastiMax(data) {
  var eilutesNr = 1;
  var max = data[0].turis;
  var maxIndex = 0;
  // console.log(max);

// Nuimam display:none nuo tūrio
  while (eilutesNr <= data.length) {
    var rodyti = document.querySelector('.table').rows[eilutesNr].cells[3];
    rodyti.classList.remove("d-none");
    eilutesNr++;
  }

// Ieškom didžiausio tūrio indekso
  for (var x = 1; x < data.length; x++) {
    // if (data[x].turis < max) {
    if (data[x].turis > max) {
      maxIndex = x;
      max = data[x].turis;
    }
  }

  // Padarom eilutę MaxIndex geltona
  var geltona = document.querySelector('.table').rows[maxIndex + 1];
  geltona.classList.add("geltona");
}
