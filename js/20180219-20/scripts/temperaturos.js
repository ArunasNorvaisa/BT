  function tKonvertuotojas(ivestis, reiksme) {
  var tempC = document.getElementById("tC");
  var tempF = document.getElementById("tF");
  var tempK = document.getElementById("tK");
  reiksme = parseFloat(reiksme); // be šito veikė, bet gana įdomiai :)
    if (ivestis == "tC") {
    tempF.value = ((reiksme * 1.8) + 32).toFixed(2);
    tempK.value = (reiksme + 273.15).toFixed(2);
  }
  if (ivestis == "tF") {
    tempC.value = ((reiksme - 32) / 1.8).toFixed(2);
    tempK.value = (((reiksme - 32) / 1.8) + 273.15).toFixed(2);
  }
  if (ivestis == "tK") {
    tempC.value = (reiksme - 273.15).toFixed(2);
    tempF.value = (((reiksme - 273.15) * 1.8) + 32).toFixed(2);
  }
}
