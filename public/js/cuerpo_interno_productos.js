$(document).ready(function() {
    var URLactual = String(window.location);
    var prod= URLactual.substr(22,URLactual.length);
    if (prod.indexOf('pollos') !== -1 ) {
        $("#pollos").addClass("active");
    } else if (prod.indexOf('gallinas') !== -1 ) {
        $("#gallinas").addClass("active");
    } else if (prod.indexOf('pavos') !== -1 ) {
        $("#pavos").addClass("active");
    } else if (prod.indexOf('patos') !== -1 ) {
        $("#patos").addClass("active");
    } else if(prod.indexOf('pekin') !== -1 ) {
        $("#pekin").addClass("active");
    } else{
        $("#huevos").addClass("active");
    }
});
