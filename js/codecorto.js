function validacionForm() {

    var inputs = document.getElementsByTagName("input");
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].type == 'text' && inputs[i].value == '') {
            inputs[i].style.borderColor = 'red';
        } else {
            inputs[i].style.borderColor = 'black';
        }
    }
    return false

}