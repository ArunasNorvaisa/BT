document.getElementById("C").addEventListener("oninput", cToFToK());
function cToFToK() {
    var x = document.getElementById("C").value;
    document.getElementById("F").value = x * 1.8 + 32;
    document.getElementById("K").value = x * 1.8 + 32;
}