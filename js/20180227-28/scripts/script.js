$(document).ready(function() {

    $("#inputData").datetimepicker({ // datetimepicker pradžia
        locale: 'lt',
        viewMode: 'decades',
        format: 'YYYY-MM-DD',
        defaultDate: '2000-03-05',
        dayViewHeaderFormat: 'YYYY MMMM',
        maxDate: '2000-03-05',
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
        $('#' + targetId).show(); // nustojame slėpti atitinkamą lentelę
        var table = $('#' + targetId);
        // pridedam eilutę:
        table.append("<tr><td>" + $('#inputVardas').val() + "</td><td>" + $('#inputPavarde').val() + "</td><td>" + $('#inputNumeris').val() + "</td><td>" + $('#inputPastas').val() + "</td><td>" + $('#inputData').val() + "</td><td>" + $('#inputRenginys').val() + "</td><td>" + $('#inputSalis').val() + "</td><td>" + $('#inputKomentarai').val() + "</td></tr>");
        // nuimame nuo modalinio/mėlyno REGISTRUOTIS mygtuko atitinkamą atributą:
        $("button[name='mygtukas']").removeAttr("data-lentelesId");
        $("input", "textarea", "option").val(""); // išvalom modalo laukelius
        $("textarea").val(""); // išvalom modalo laukelius
        $('#regLangas').modal("hide"); // uždarom modalą
    });
})