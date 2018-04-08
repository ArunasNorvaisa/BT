var greiciai = [];

function eilute() {
  var table = document.querySelector('.table');
  var tableBody = document.querySelector('tbody');
  var tableBodyRow = document.createElement('tr');
  var numeris = document.getElementById("valstNr").value;
  numeris.required = true;
  var kilometrai = document.getElementById("keliasKm").value;
  kilometrai.required = true;
  var laikas = document.getElementById("sugaistasLaikas").value;
  laikas.required = true;
  var greitis = (kilometrai / laikas).toFixed(2);
  greiciai[greiciai.length] = greitis;
  var istrinti = document.getElementById("forma");

  var td = document.createElement("td");
  td.appendChild(document.createTextNode(numeris));
  tableBodyRow.appendChild(td);

  var td = document.createElement("td");
  metrai = kilometrai * 1000;
  td.appendChild(document.createTextNode(metrai));
  tableBodyRow.appendChild(td);

  var td = document.createElement("td");
  laikas = laikas * 3600;
  td.appendChild(document.createTextNode(laikas));
  tableBodyRow.appendChild(td);

  var td = document.createElement("td");
  td.appendChild(document.createTextNode(greitis));
  tableBodyRow.appendChild(td);

  tableBody.appendChild(tableBodyRow);

  istrinti.reset();
  istrinti.value = '';
  return false;
}

function filtras() {
  var istrinti = document.getElementById("forma1");
  var maxGreitis = document.getElementById("maxGreitis").value;
  maxGreitis = parseFloat(maxGreitis);
  var i = 0;

  while (i < greiciai.length) {
    greitis = parseFloat(greiciai[i]);
    var zymeti = document.getElementById('lenta').rows[i + 1];
    zymeti.classList.remove("geltona");
    if (maxGreitis <= greitis) {
      zymeti.classList.add("geltona");
    }
    i++;
  }
  istrinti.reset();
  istrinti.value = '';
  return false;
}
