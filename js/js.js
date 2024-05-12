

var btnMenu = false;

$("#btn-menu").click(function() {
    if(!btnMenu ) {
        $(".cabecalho nav").css({
            "left": "0",
            "transition": ".3s"
        });
        btnMenu = true;
    } else {
        $(".cabecalho nav").css({
            "left": "-85%",
            "transition": ".3s"
        });
        btnMenu = false;
    }
});

var btnAjuda = false;

$("#ajuda").click(function() {
    $(".box-ajuda").fadeToggle();
    btnAjuda = !btnAjuda;
})