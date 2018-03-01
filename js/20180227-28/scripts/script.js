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
    $("button[name='mygtas']").attr({
      data_lentelesId: targetId
    })
    console.log($("button[name='mygtas']").attr());
  });
});
