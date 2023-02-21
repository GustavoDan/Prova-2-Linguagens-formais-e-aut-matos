<h1 class="h3 my-3 fw-normal text-center">Crie sua senha</h1>

<ul class="list-group mb-3">
    <li class="list-group-item list-group-item-success">A senha deve conter</li>
    <li class="list-group-item list-group-item-warning">Pelo menos 8 caracteres de tamanho</li>
    <li class="list-group-item list-group-item-warning">Pelo menos 1 numero</li>
    <li class="list-group-item list-group-item-warning">Pelo menos 1 letra</li>
</ul>


<?php
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "senha", "required" => true, "type" => "password", "dont_autofill" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "senha", "required" => true, "type" => "password", "display_text" => "Repita a senha", "confirm" => true, "dont_autofill" => true]);
?>

<span id="senhas-iguais" class="text-success text-center fw-bold" hidden>
    As senhas estão iguais!
</span>
<span id="senhas-diferentes" class="text-danger text-center fw-bold" hidden>
    As senhas devem ser iguais!
</span>