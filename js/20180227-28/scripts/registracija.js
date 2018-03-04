$(document).ready(function() {

  $("textarea").val(""); // išvalom laukelius (buvo kažkoks bug'as, TEXTAREA netuščias)

  $("#inputData").datetimepicker({ // datetimepicker
    locale: 'lt',
    viewMode: 'decades',
    format: 'YYYY-MM-DD',
    defaultDate: '2000-03-05',
    dayViewHeaderFormat: 'YYYY MMMM',
    maxDate: '2000-03-05',
    minDate: '1900-01-01',
  });

  $("#h3").click(function() { // slepiam/rodom užduoties aprašymą
    $("code").toggle();
  });

  $("button[name^='mygtas']").click(function() { // žalio REGISTRUOTIS mygtuko paspaudimas
    $('#regLangas').modal(); // atidarom modalą
    var targetId = $(this).attr('data-lentelesId'); // sekame kuris iš 4 mygtukų paspaustas
    // suteikiame modaliniam/mėlynam REGISTRUOTIS mygtukui atitinkamą atributą:
    $("button[name='mygtukas']").attr("data-lentelesId", targetId);
  });

  $("button[name='mygtukas']").click(function() { // f-ja pridėti eilutę prie lentelės
    var targetId = $(this).attr('data-lentelesId'); // išsiaiškinam kurią lentelę pildysim
    var lenta = $('#' + targetId);
    var lentelesLangelis, lentelesEilute;
    var eilute = [];

    $(lenta).show(); // nustojame slėpti atitinkamą lentelę

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
    $(lentelesEilute).append("<td><button type='button' class='btn btn-primary commentaras' data-container='body' data-toggle='popover' data-placement='left' data-content='" + $('#inputKomentarai').val() + "'>Komentaras</button></td>");
    $(lenta).append(lentelesEilute);

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
    $("input").val(""); // išvalom modalo laukelius
    $("textarea").val(""); // išvalom modalo laukelius
    $('#regLangas').modal("hide"); // uždarom modalą
  });
})
