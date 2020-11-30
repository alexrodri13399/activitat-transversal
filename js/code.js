window.onload = function() {
    document.getElementById('dni').addEventListener("focusout", validarDNI);
    document.getElementById('data').addEventListener("focusout", validarCat);
    document.getElementById('sexe').addEventListener("focusout", validarCat);
    document.getElementById('disc').addEventListener("focusout", validarCat);
    document.getElementById('form').addEventListener("submit", validacionForm);

}

function validarCat() {
    var val = true;
    var cat = document.getElementById('data').value;
    var sexe = document.getElementById('sexe').value;
    var disc = document.getElementById('disc').value;
    var input = document.getElementById('categoria');
    var hoy = new Date();
    var cumpleanos = new Date(cat);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

    if (edad >= 8 && edad <= 13) {
        categoria = 1;
        input.setAttribute("value", "Nens")
    }
    if (edad >= 14 && edad <= 17) {
        if (sexe == 'Home') {
            categoria = 2;
            input.setAttribute("value", "Junior Masculí")
        } else {
            categoria = 3;
            input.setAttribute("value", "Junior Femení")
        }
    }
    if (edad >= 18 && edad <= 34) {
        if (sexe == 'Home') {
            categoria = 4;
            input.setAttribute("value", "Senior Masculí")
        } else {
            categoria = 5;
            input.setAttribute("value", "Senior Femení")
        }
    }
    if (edad >= 35 && edad <= 44) {
        if (sexe == 'Home') {
            categoria = 6;
            input.setAttribute("value", "Veterà A Masculí")
        } else {
            categoria = 7;
            input.setAttribute("value", "Veterà A Femení")
        }
    }
    if (edad >= 45 && edad <= 54) {
        if (sexe == 'Home') {
            categoria = 8;
            input.setAttribute("value", "Veterà B Masculí")
        } else {
            categoria = 9;
            input.setAttribute("value", "Veterà B Femení")
        }
    }
    if (edad >= 55 && edad <= 64) {
        if (sexe == 'Home') {
            categoria = 10;
            input.setAttribute("value", "Veterà C Masculí")
        } else {
            categoria = 11;
            input.setAttribute("value", "Veterà C Femení")
        }
    }
    if (edad >= 65) {
        if (sexe == 'Home') {
            categoria = 12;
            input.setAttribute("value", "Veterà D Masculí")
        } else {
            categoria = 13;
            input.setAttribute("value", "Veterà D Femení")
        }
    }
    if ((edad > 8 || edad < 100) && disc == 'Si') {
        if (sexe == 'Home') {
            categoria = 14;
            input.setAttribute("value", "Discapacitat Masculí")
            input.style.borderColor = 'green';
        } else {
            categoria = 15;
            input.setAttribute("value", "Discapacitat Femení")
            input.style.borderColor = 'green';
        }
    }
    if (edad < 8 || edad > 100) {
        input.setAttribute("value", "Edad no válida")
        input.style.borderColor = 'red';
        val = false;
    }
    return val;

}

function validarDNI() {
    var val = true;
    var dni = document.getElementById('dni');
    if (dni.value.length == 9) {
        //console.log('DNI válido');
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        var num = document.getElementById('dni').value.toUpperCase();
        var prin = num.charAt(0);
        var letra = num.charAt(8);
        if (prin == "X") {
            var numero = num.replace("X", "0");
        } else if (prin == "Y") {
            var numero = num.replace("Y", "1");
        } else if (prin == "Z") {
            var numero = num.replace("Z", "2");
        } else {
            var numero = num;
        }
        var numeros = numero.substring(0, numero.length - 1);
        var letraCalculada = letras[numeros % 23];
        if (letraCalculada != letra) {
            dni.style.border = "solid red 1px";
            val = false;
        } else {
            dni.style.border = "solid green 1px";
        }
    } else {
        dni.style.border = "solid red 1px";
        val = false;
    }
    return val;

}

function validacionForm() {
    val = true;
    var inputs = document.getElementsByTagName("input");
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].type == 'text' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else if (inputs[i].type == 'email' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else if (inputs[i].type == 'date' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
            val = false;
        } else {
            inputs[i].style.borderColor = 'black';
        }
    }

    if (!val || !validarDNI()) {
        event.preventDefault();
    }

    if (!val || !validarCat()) {
        event.preventDefault();
    }


}




/* function validacionForm() {


    var nom = document.getElementById('nom').value
    var cognom1 = document.getElementById('cognom1').value
    var cognom2 = document.getElementById('cognom2').value
    var email = document.getElementById('email').value
    var data = document.getElementById('data').value


    if (nom == '') {
        document.getElementById("nom").style.border = "thick solid #FF0000";
    }
    if (cognom1 == '') {
        document.getElementById("cognom1").style.border = "thick solid #FF0000";
    }
    if (cognom2 == '') {
        document.getElementById("cognom2").style.border = "thick solid #FF0000";
    }
    if (email == '') {
        document.getElementById("email").style.border = "thick solid #FF0000";
    }
    if (data == 'dd/mm/aaaa') {
        document.getElementById("data").style.border = "thick solid #FF0000";
    }


    if (nom != '') {
        document.getElementById("nom").style.border = "white";
    }
    if (cognom1 != '') {
        document.getElementById("cognom1").style.border = "white";
    }
    if (cognom2 != '') {
        document.getElementById("cognom2").style.border = "white";
    }
    if (email != '') {
        document.getElementById("email").style.border = "white";
    }
    if (data != 'dd/mm/aaaa') {
        document.getElementById("data").style.border = "white";
    }

    if (dni == '' || nom == '' || cognom1 == '' || cognom2 == '' || email == '' || data == 'dd/mm/aaaa') {
        document.getElementById('message').innerHTML = '<p style="color:red">Rellene los campos obligatorios.</p>';
        return false
    } else {
        return true
    }
} */