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
    }
];

document.querySelector('#rasti').addEventListener('click', function() {
    miau(gyvuliai);
})

function miau(data) {
    var kaRasti = document.getElementById("ka-sako").value;
    // var rezultatas = data.indexOf(kaRasti);
    if (kaRasti == 0) { // tikrinam ar vartotojas kažką suvedė
        document.getElementById("atsakymas").innerHTML = "Prašome įvesti paieškomą garsą";
    }
    if (kaRasti == -1) { // tikrinam ar vartotojas suvedė gyvulio garsą, ar šiaip maivosi :)
        document.getElementById("atsakymas").innerHTML = "Taip nesako joks gyvuliukas";
    }
    else {
        var rezultatas = "";
        var j = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i].garsas == kaRasti) {
                rezultatas = data[i].gyvulys;
            }
        }
        console.log(rezultatas);
        document.getElementById("atsakymas").innerHTML = kaRasti + " sako " + rezultatas;
    }
}

