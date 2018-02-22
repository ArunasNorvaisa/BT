var modal = document.getElementById('myModal');
var btn = document.getElementById("pridetiEilute");
var span = document.getElementsByClassName("close")[0];
var istrinti = document.getElementsByTagName("forma");
var ivesti = document.getElementById("ivestiDuomenis");

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}
/*
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
*/
istrinti.onclick = function () {
    istrinti.value = '';
}

// ivesti.onclick = function eilute() {
function eilute() {
    var table = document.querySelector('.table');
    var tbody = document.querySelector('tbody');
    // var tableBody = document.createElement('tbody');
    var tableBody = document.querySelector('tbody');
    var tableBodyRow = document.createElement('tr');
    var vardas = document.getElementById("klientoVardas").value;
    var pavarde = document.getElementById("klientoPavarde").value;
    var pastas = document.getElementById("klientoPastas").value;
    var tel = document.getElementById("klientoTelefonas").value;

        var td = document.createElement("td")
        td.appendChild(document.createTextNode(vardas));
        td.classList.add("text-center");
        tableBodyRow.appendChild(td);

        var td = document.createElement("td")
        td.appendChild(document.createTextNode(pavarde));
        td.classList.add("text-center");
        tableBodyRow.appendChild(td);

        var td = document.createElement("td")
        td.appendChild(document.createTextNode(pastas));
        td.classList.add("text-center");
        tableBodyRow.appendChild(td);

        var td = document.createElement("td")
        td.appendChild(document.createTextNode(tel));
        td.classList.add("text-center");
        tableBodyRow.appendChild(td);

        tableBody.appendChild(tableBodyRow);
        modal.style.display = "none";
        istrinti.reset();
}