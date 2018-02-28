$(document).ready(function(){
    $(function() {
        $("#inputData").datetimepicker();
    });
  $("#h3").click(function(){ // slepiam/rodom užduoties aprašymą
      $("code").toggle();
  });

    $("button[name$='mygtas']").click(function(){ // atidarom modalą
        $('#regLangas').modal();
        var xxx = this.name;
        return xxx;
    });
});
