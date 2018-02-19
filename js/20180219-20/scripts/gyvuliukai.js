var gyvuliai = [{
        gyvulys:"ožiukas",
        garsas:"Bee"
    },
    {
        gyvulys:"šuniukas",
        garsas:"Au"
    },
    {
        gyvulys:"katytė",
        garsas: "Miau"
    },
    {
        gyvulys:"karvytė",
        garsas:"Mū"
    },
    {
        gyvulys:"arkliukas",
        garsas:"Ihaha"
    },
    {
        gyvulys:"gaidžiukas",
        garsas:"Kaka-rie-kū"
    },
    {
        gyvulys:"BAISUS LOKYS!!!",
        garsas:"Grrr"
    }
];

/* document.querySelector('#rasti').addEventListener('click', function() {
    miau(gyvuliai);
})
*/

function miau(data) {
    var kaRasti = document.getElementById("ka-sako").value;
    if (kaRasti == 0) { // tikrinam ar vartotojas kažką suvedė
        document.getElementById("atsakymas").innerHTML = "Prašome įvesti paieškomą garsą";
    }
    else {
        var rezultatas = "";
        var j = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i].garsas == kaRasti) {
                rezultatas = data[i].gyvulys;
            }
        }
    }
    document.getElementById("atsakymas").innerText = kaRasti + " sako " + rezultatas;
}
