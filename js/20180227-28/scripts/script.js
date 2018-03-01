$(document).ready(function() {
    $("#inputData").datetimepicker({ // datetimepicker pradžia
    locale: 'lt',
    viewMode: 'years',
    format: 'YYYY-MM-DD',
  }); // datetimepicker pabaiga
  $("#h3").click(function() { // slepiam/rodom užduoties aprašymą
    $("code").toggle();
  });

  $("button[name^='mygtas']").click(function() {
    $('#regLangas').modal(); // atidarom modalą
    var targetId = $(this).attr('data-lentelesId'); // sekame kuris REGISTRUOTIS mygtukas paspaustas
    $('#'+targetId).show(); // nustojame slėpti atitinkamą lentelę
    $("button[name='mygtas']").attr("data-lentelesId", targetId); // suteikiame REGISTRUOTIS mygtukui atitinkamą atributą
    var targetLentele = $("button[name='mygtas']").attr("data-lentelesId");

    $("button[name='mygtas']").click(function() {
        console.log(targetLentele);
        var table = $('#'+targetLentele).children();
        table.append("<tr><td>" + $('#inputVardas').val() + "</td><td>" + $('#inputPavarde').val() + "</td><td>" + $('#inputNumeris').val() + "</td><td>" + $('#inputPastas').val() + "</td><td>" + $('#inputRenginys').val() + "</td><td>" + $('#inputSalis').val() + "</td><td>" + $('#inputKomentarai').val() + "</td></tr>");
        console.log(table);
    })
  });
});
