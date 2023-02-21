import mascaras from "./regex/mascaras.js";
import regras from "./regex/regras.json" assert { type: "json" };

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

function validaInput(event) {
    let input = event.target;
    let regra = regras[input.getAttribute("name").replace("confirma_", "")];

    if (regra) {
        let regex = new RegExp(regra["exp"], regra["flags"]);
        modificaFeedback(regex.test(input.value), input);
    }
}

function modificaFeedback(condition, input) {
    if (condition) {
        input.classList.remove("is-invalid");

        input.classList.add("is-valid");
    } else {
        input.classList.remove("is-valid");

        input.classList.add("is-invalid");
    }
}

function senhasIguaisFeedback() {
    let senhasIguais = document.querySelector("#senhas-iguais");
    let senhasDiferentes = document.querySelector("#senhas-diferentes");
    if (confirmaSenha.value === senha.value) {
        senhasIguais.hidden = false;
        senhasDiferentes.hidden = true;
    } else {
        senhasIguais.hidden = true;
        senhasDiferentes.hidden = false;
    }
}

var inputs = document.querySelectorAll("input");
var senha = document.querySelector("[name='senha']");
var confirmaSenha = document.querySelector("[name='confirma_senha']");
var backButton = document.querySelector("#back-button");
var submitButton = document.querySelector("#submit-button");

inputs.forEach((input) => input.addEventListener("keyup", validaInput));

inputs.forEach((input) =>
    input.addEventListener("input", (event) => {
        let mascara =
            mascaras[input.getAttribute("name").replace("confirma_", "")];
        if (mascara) input.value = mascara(event);
    })
);

if (confirmaSenha) {
    confirmaSenha.addEventListener("keyup", () => {
        modificaFeedback(confirmaSenha.value === senha.value, confirmaSenha);
        senhasIguaisFeedback();
    });

    senha.addEventListener("keyup", () => {
        if (confirmaSenha.value) {
            modificaFeedback(
                confirmaSenha.value === senha.value,
                confirmaSenha
            );
            senhasIguaisFeedback();
        }
    });
}

if (backButton) {
    backButton.addEventListener("click", (event) => {
        event.target.disabled = true;
        document.querySelector("[name='back']").value = "clicked";
        registerForm.submit();
    });
}

submitButton.addEventListener("click", (event) => {
    event.target.disabled = true;
    registerForm.submit();
});
