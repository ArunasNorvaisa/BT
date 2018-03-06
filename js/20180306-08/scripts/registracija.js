$(document).ready(function() {

    var eilutes = [];
    var i = 0;

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
        var lentelesLangelis, lentelesEilute;

        var eilute = {};
        eilute['Vardas'] = $('#inputVardas').val(),
        eilute['Pavarde'] = $('#inputPavarde').val(),
        eilute['Numeris'] = $('#inputNumeris').val(),
        eilute['Pastas'] = $('#inputPastas').val(),
        eilute['Data'] = $('#inputData').val(),
        eilute['Renginys'] = $('#inputRenginys').val(),
        eilute['Salis'] = $('#inputSalis').val()
        eilutes.push(eilute);

        console.log(eilutes);

        // tikrinam ar lentelė turi galvą ir, jei taip, nukertam ją:
        var thead = $(lenta).find('thead');
        if (thead != null) {thead.remove();}

        lentelesEilute = $('<tr>'); // kuriame eilutę
        // $.each(eilutes.length, function(i) {
            lentelesLangelis = $('<td>').text(eilutes[i].Vardas);
            lentelesEilute.append(lentelesLangelis);
            lentelesLangelis = $('<td>').text(eilutes[i].Pavarde);
            lentelesEilute.append(lentelesLangelis);
            lentelesLangelis = $('<td>').text(eilutes[i].Numeris);
            lentelesEilute.append(lentelesLangelis);
            lentelesLangelis = $('<td>').text(eilutes[i].Pastas);
            lentelesEilute.append(lentelesLangelis);
            lentelesLangelis = $('<td>').text(eilutes[i].Data);
            lentelesEilute.append(lentelesLangelis);
            lentelesLangelis = $('<td>').text(eilutes[i].Renginys);
            lentelesEilute.append(lentelesLangelis);
            lentelesLangelis = $('<td>').text(eilutes[i].Salis);
            lentelesEilute.append(lentelesLangelis);
            i++;
        // });
        // Pridedame komentarų mygtą eilutės paskutiniame langelyje:
        $(lentelesEilute).append("<td><button type='button' class='btn btn-primary commentaras' data-container='body' data-toggle='popover' data-placement='left' data-content='" + $('#inputKomentarai').val() + "'>Komentaras</button></td>");
        $(lenta).append(lentelesEilute); // prie lentelės pridedame eilutę
        // lentelės pradžioje pridedam viršūnelę:
        $(lenta).prepend('<thead><tr><th>Vardas</th><th>Pavardė</th><th>Tel. numeris</th><th>El. paštas</th><th>Data</th><th>Renginys</th><th>Šalis</th><th>Komentaras</th></tr></thead>')

        $('.commentaras').popover({trigger: 'focus'}); // Rodome popover
        // nuimame nuo modalinio/mėlyno REGISTRUOTIS mygtuko atitinkamą atributą:
        $("button[name='mygtukas']").removeAttr("data-lentelesId");
        $('#regLangas').modal("hide"); // uždarom modalą
    });
})
