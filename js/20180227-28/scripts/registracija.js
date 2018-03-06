$(document).ready(function() {

  $("#inputData").datetimepicker({ // datetimepicker
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

  $("button[name^='mygtas']").click(function() { // žalio REGISTRUOTIS mygtuko paspaudimas
    $("textarea").val(""); // išvalom komentarų laukelį (buvo kažkoks bug'as, TEXTAREA netuščias)
    $("input").val(""); // išvalom modalo laukelius
    $('#regLangas').modal(); // atidarom modalą
    var targetId = $(this).attr('data-lentelesId'); // sekame kuris iš 4 mygtukų paspaustas
    // suteikiame modaliniam/mėlynam REGISTRUOTIS mygtukui atitinkamą atributą:
    $("button[name='mygtukas']").attr("data-lentelesId", targetId);
  });

  $("button[name='mygtukas']").click(function() { // f-ja pridėti eilutę prie lentelės
    var targetId = $(this).attr('data-lentelesId'); // išsiaiškinam kurią lentelę pildysim
    var lenta = $('#' + targetId);
    var lentelesLangelis, lentelesEilute, i;
    var eilute = [];

    // tikrinam ar lentelė turi galvą ir, jei taip, nukertam ją:
    var thead = $(lenta).find('thead');
    if (thead != null) {thead.remove();}

    eilute.push( // kuriam masyvą su būsimos eilutės duomenimis
      $('#inputVardas').val(),
      $('#inputPavarde').val(),
      $('#inputNumeris').val(),
      $('#inputPastas').val(),
      $('#inputData').val(),
      $('#inputRenginys').val(),
      $('#inputSalis').val()
    );
    lentelesEilute = $('<tr>'); // kuriame eilutę
    $.each(eilute, function(i) {
      lentelesLangelis = $('<td>').text(eilute[i]);
      lentelesEilute.append(lentelesLangelis);
    });
    // Pridedame komentarų mygtą eilutės paskutiniame langelyje:
    $(lentelesEilute).append("<td><button type='button' class='btn btn-primary commentaras' data-container='body' data-toggle='popover' data-placement='left' data-content='" + $('#inputKomentarai').val() + "'>Komentaras</button></td>");
    $(lenta).append(lentelesEilute); // prie lentelės pridedame eilutę
    // lentelės pradžioje pridedam viršūnelę:
    $(lenta).prepend('<thead><tr><th>Vardas</th><th>Pavardė</th><th>Tel. numeris</th><th>El. paštas</th><th>Data</th><th>Renginys</th><th>Šalis</th><th>Komentaras</th></tr></thead>')

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

    $('.commentaras').popover({trigger: 'focus'}); // Rodome popover
    // nuimame nuo modalinio/mėlyno REGISTRUOTIS mygtuko atitinkamą atributą:
    $("button[name='mygtukas']").removeAttr("data-lentelesId");
    $('#regLangas').modal("hide"); // uždarom modalą
  });
})
