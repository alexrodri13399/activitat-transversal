function validacionForm() {


    var dni = document.getElementById('dni').value
    var nom = document.getElementById('nom').value
    var cognom1 = document.getElementById('cognom1').value
    var cognom2 = document.getElementById('cognom2').value
    var email = document.getElementById('email').value
    var data = document.getElementById('data').value

    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var num = document.getElementById('dni').value.toUpperCase();
    var prin = num.charAt(0);
    var letra = num.charAt(8);

    console.log(prin);
    console.log(letra);
    if (prin == "X") {
        var numero = num.replace("X", "0");
    } else if (prin == "Y") {
        var numero = num.replace("Y", "1");
    } else if (prin == "Z") {
        var numero = num.replace("Z", "2");
    } else {
        var numero = num;
    }

    console.log(numero);
    var numeros = numero.substring(0, numero.length - 1);

    console.log(numeros);

    var letraCalculada = letras[numeros % 23];

    console.log(letraCalculada);



    if (dni == '') {
        document.getElementById("dni").style.border = "thick solid #FF0000";
    }
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
    if (data == '') {
        document.getElementById("data").style.border = "thick solid #FF0000";
    }

    if (dni != '') {
        document.getElementById("dni").style.border = "white";
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
    if (data != '') {
        document.getElementById("data").style.border = "white";
    }

    if (dni == '' || nom == '' || cognom1 == '' || cognom2 == '' || email == '' || data == 'dd/mm/aaaa') {
        document.getElementById('message').innerHTML = '<p style="color:red">Rellene los campos obligatorios.</p>';
        if (letraCalculada != letra) {
            document.getElementById('message').innerHTML = '<p style="color:red">DNI incorrecto.</p>';
            document.getElementById("dni").style.color = "#FF0000";
            return false
        }
        return false

    } else {
        if (letraCalculada != letra) {
            document.getElementById('message').innerHTML = '<p style="color:red">DNI incorrecto.</p>';
            return false
        } else {
            return true
        }
    }

}