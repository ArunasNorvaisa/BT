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
kurios tūris didžiausias, atspausdinkite kitokia spalva (spausdindami panaudokite
css klasę, pvz: <td class=“raudona”>...</td>)*/

var figuros = [
    { ilgis: 2, plotis: 5, aukstis: 3 },
    { ilgis: 3, plotis: 2, aukstis: 6 },
    { ilgis: 1, plotis: 5, aukstis: 5 }
];

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
        var turis = data[i].aukstis * data[i].plotis * data[i].ilgis;
        data[i].turis = turis;

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

        var td = document.createElement("td")
        td.appendChild(document.createTextNode(turis));
        td.classList.add("text-center");
        tableBodyRow.appendChild(td);
        console.log(figuros);

        tableBody.appendChild(tableBodyRow);
    }

    table.appendChild(tableBody);
}

function rastiMax() {}
