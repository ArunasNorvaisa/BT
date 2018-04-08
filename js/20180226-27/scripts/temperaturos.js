$(document).ready(function() {
  $('input').on('change input', function tKonvertuotojas() {
    var tempC = $("#tC").val();
    var tempF = $("#tF").val();
    var tempK = $("#tK").val();
    tempC = parseFloat(tempC);
    tempF = parseFloat(tempF);
    tempK = parseFloat(tempK);
    if (this.id == "tC") {
      var tF = parseFloat(((tempC * 1.8) + 32).toFixed(2));
      var tK = parseFloat((tempC + 273.15).toFixed(2));
      $("#tF").val(tF);
      $("#tK").val(tK);
    }
    if (this.id == "tF") {
      var tC = parseFloat(((tempF - 32) / 1.8).toFixed(2));
      var tK = parseFloat((((tempF - 32) / 1.8) + 273.15).toFixed(2));
      $("#tC").val(tC);
      $("#tK").val(tK);
    }
    if (this.id == "tK") {
      var tC = parseFloat((tempK - 273.15).toFixed(2));
      var tF = parseFloat((((tempK - 273.15) * 1.8) + 32).toFixed(2));
      $("#tC").val(tC);
      $("#tF").val(tF);
    }
  })

})
