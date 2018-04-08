$(document).ready(function() {

  var eilutesNr = 1;

  $("#inputData, #redaguotiData").datetimepicker({ // datetimepicker
    locale: 'lt',
    viewMode: 'years',
    format: 'YYYY-MM-DD',
    defaultDate: '2000-03-05',
    dayViewHeaderFormat: 'YYYY MMMM',
    maxDate: '2000-03-05',
    minDate: '1900-01-01'
  });

  $("#h3").click(function() { // slepiam/rodom užduoties aprašymą
    $("code").toggle();
  });

  $("button[name='mygtas']").click(function() { // žalio REGISTRUOTIS mygtuko paspaudimas
    $("textarea").val(""); // išvalom komentarų laukelį (buvo kažkoks bug'as, TEXTAREA netuščias)
    $("input").val(""); // išvalom modalo laukelius
    $('#regLangas').modal(); // atidarom modalą
  });

  $("button[name='mygtukas']").click(function() { // f-ja pridėti eilutę prie lentelės
    var lenta = $("#lenta1");
    var lentelesLangelis, lentelesEilute, i;
    var eilute = [];
    var klases = [
      "vardas",
      "pavarde",
      "numeris",
      "pastas",
      "data",
      "renginys",
      "salis"
    ];

    // tikrinam ar lentelė turi galvą ir, jei taip, nukertam ją:
    var thead = $(lenta).find('thead');
    if (thead != null) {
      thead.remove();
    }

    eilute.push( // kuriam masyvą su būsimos eilutės duomenimis
      $('#inputVardas').val(),
      $('#inputPavarde').val(),
      $('#inputNumeris').val(),
      $('#inputPastas').val(),
      $('#inputData').val(),
      $('#inputRenginys').val(),
      $('#inputSalis').val()
    );
    lentelesEilute = $('<tr data-id="' + eilutesNr + '">'); // kuriam eilutę
    eilutesNr++;
    $.each(eilute, function(i) {
      var td = $('<td />');
      lentelesLangelis = td.text(eilute[i]);
      $(lentelesLangelis).wrapInner('<div class="' + klases[i] + '"></div>')
      lentelesEilute.append(lentelesLangelis);
    });
    // Pridedame komentarų mygtą:
    $(lentelesEilute).append("<td><button type='button' class='btn btn-primary commentaras' data-container='body' data-toggle='popover' data-placement='left' data-content='" + $('#inputKomentarai').val() + "'>Komentaras</button></td>");
    // Pridedame trynimo mygtą:
    $(lentelesEilute).append('<td><button type="button" class="btn btn-danger trinti" data-lentelesId="lenta1"><i class="far fa-trash-alt"></i></button></td>');
    // Pridedame redagavimo mygtą eilutės paskutiniame langelyje:
    $(lentelesEilute).append('<td><button type="button" class="btn btn-secondary redaguoti" data-lentelesId="lenta1"><i class="far fa-edit"></i></button></td>');
    $(lenta).append(lentelesEilute); // prie lentelės pridedame eilutę
    // lentelės pradžioje pridedam viršūnelę:
    $(lenta).prepend('<thead><tr><th>Vardas</th><th>Pavardė</th><th>Tel. numeris</th><th>El. paštas</th><th>Data</th><th>Renginys</th><th>Šalis</th><th>Komentaras</th><th></th><th></th></tr></thead>');

    /* SENAS KODAS, NEBENAUDOJAMAS DĖL SAUGUMO
                // pridedam eilutę:
                lenta.append(
                "<tr><td>" + $('#inputVardas').val() + "</td>" +
                "<td>" + $('#inputPavarde').val() + "</td>" +
                "<td>" + $('#inputNumeris').val() + "</td>" +
                "<td>" + $('#inputPastas').val() + "</td>" +
                "<td>" + $('#inputData').val() + "</td>" +
                "<td>" + $('#inputRenginys').val() + "</td>" +
                "<td>" + $('#inputSalis').val() + "</td>" +
                "<td><button type='button' class='btn btn-secondary commentaras' data-container='body' data-toggle='popover' data-placement='left' data-content='" + $('#inputKomentarai').val() + "'>Komentaras</button></td></tr>"
              );
    */
    $('.commentaras').popover({
      trigger: 'hover'
    }); // Rodome popover
    $('#regLangas').modal("hide"); // uždarom modalą
  });

  // TRINTI mygtuko funkcijos:
  $("body").on('click', 'button.trinti', function(e) {
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    $("#eilutesTrynimoModalas").data("id", id);
    $('#eilutesTrynimoModalas').modal();
  });

  $('body').on('click', "#taipTrinti", function(e) {
    e.preventDefault();
    var id = $('#eilutesTrynimoModalas').data('id');
    $('[data-id=' + id + ']').remove();
    // Trinam pildomos lentelės galvą, kai nebėra eilučių:
    var thead = $("#lenta1").find('thead');
    var tbody = $("#lenta1").find('td');
    if (tbody.length == 0) {
      thead.remove();
    }

    $('#eilutesTrynimoModalas').modal('hide');
  });

  /* // Trynimas be modalinio lango:
  $("table").on('click', 'button.trinti', function(){
    $(this).closest('tr').fadeOut(1000, function () {$(this).closest('tr').remove();});
  });*/

  // REDAGUOTI mygtuko funkcijos:
  $("body").on('click', "button.redaguoti", function() {

    var redaguojamaEilute = $(this).closest("tr"); // randam eilutę kurią teks taisyti
    // pasiimam laukelius:
    var vardas = redaguojamaEilute.find('.vardas');
    var pavarde = redaguojamaEilute.find('.pavarde');
    var numeris = redaguojamaEilute.find('.numeris');
    var pastas = redaguojamaEilute.find('.pastas');
    var data = redaguojamaEilute.find('.data');
    var renginys = redaguojamaEilute.find('.renginys');
    var salis = redaguojamaEilute.find('.salis');
    // pasiimam laukelių vertes:
    var vardas_verte = redaguojamaEilute.find(".vardas").text();
    var pavarde_verte = redaguojamaEilute.find(".pavarde").text();
    var numeris_verte = redaguojamaEilute.find(".numeris").text();
    var pastas_verte = redaguojamaEilute.find(".pastas").text();
    var data_verte = redaguojamaEilute.find(".data").text();
    var renginys_verte = redaguojamaEilute.find(".renginys").text();
    var salis_verte = redaguojamaEilute.find(".salis").text();

    // užpildom modalo laukelius senomis vertėmis:
    $('#redaguotiVardas').val(vardas_verte);
    $('#redaguotiPavarde').val(pavarde_verte);
    $('#redaguotiNumeris').val(numeris_verte);
    $('#redaguotiPastas').val(pastas_verte);
    $('#redaguotiData').val(data_verte);
    $('#redaguotiRenginys').val(renginys_verte);
    $('#redaguotiSalis').val(salis_verte);
    // rodome modalą:
    $("#eilutesRedagavimoModalas").modal('show');

    $(".taipRedaguoti").click(function() { // modalinio lango meniu

      // pasiimam naujas laukelių reikšmes:
      var nauja_vardas_verte = $('#redaguotiVardas').val();
      var nauja_pavarde_verte = $('#redaguotiPavarde').val();
      var nauja_numeris_verte = $('#redaguotiNumeris').val();
      var nauja_pastas_verte = $('#redaguotiPastas').val();
      var nauja_data_verte = $('#redaguotiData').val();
      var nauja_renginys_verte = $('#redaguotiRenginys').val();
      var nauja_salis_verte = $('#redaguotiSalis').val();
      // įrašom naujas reikšmes į lentelę:
      vardas.text(nauja_vardas_verte);
      pavarde.text(nauja_pavarde_verte);
      numeris.text(nauja_numeris_verte);
      pastas.text(nauja_pastas_verte);
      data.text(nauja_data_verte);
      renginys.text(nauja_renginys_verte);
      salis.text(nauja_salis_verte);

      $("#eilutesRedagavimoModalas").modal('hide'); // slepiam modalą
    });
  });

// Redagavimo modalui užsidarius, nuimam bet kokias REDAGUOTI mygtuko sąsajas su bet kokiais event'ais:
  $('#eilutesRedagavimoModalas').on('hidden.bs.modal', function() {
    $('.taipRedaguoti').off();
  });
})
