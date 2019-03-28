$(document).ready(function () {

    //this changes the MoonIcon from the menu button
    $(".Slide").click(function () {
        if ($('.SlideContent').css("display") == "none") {
            $('#NotSelected').css('display', 'none');
            $('#Selected').css('display', 'block');
            $('.Slide').css("background-color", "#2c3a8a");
        } else {
            $('#Selected').css('display', 'none');
            $('#NotSelected').css('display', 'block');
            $('.Slide').css("background-color", "#3f51b5");
        }

        var target = $(this).parent().children(".SlideContent");
        $(target).slideToggle();
    });
});

function OpcionMenu() {
    var Url = window.location.pathname;
    var Opciones = document.getElementsByClassName('Option');
    var Estado = false;
    var OpcionSelecc;
    var arrayOpciones, arrayUrl;

    for (var i = 0; i < Opciones.length; i++) {
        arrayOpciones = Opciones[i].getAttribute("href").split("/");
        arrayUrl = Url.split("/");

        if (arrayOpciones[2] == arrayUrl[2]) {
            Estado = true;
            OpcionSelecc = i;
        }
    }

    if (Estado) {
        Opciones[OpcionSelecc].classList.add("SelectedOp");
    } else {
        Opciones[0].classList.add("SelectedOp");
    }
}