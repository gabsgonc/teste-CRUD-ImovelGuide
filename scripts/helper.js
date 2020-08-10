function validateForm() {

    var cpf = document.getElementById("txt-cpf-corretor").value;
    var creci = document.getElementById("txt-creci-corretor").value;
    var nome = document.getElementById("txt-nome-corretor").value;

    if (cpf.length !== 11) {
        alert("CPF deve conter 11 digitos");
        return false;
    }

    if (creci.length < 2) {
        alert("Creci deve conter 2 digitos ou mais");
        return false;
    }

    if (nome.length < 2) {
        alert("Nome deve conter 2 digitos ou mais");
        return false;
    }
}