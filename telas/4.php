<h1 class="h3 my-3 fw-normal text-center">Confirme os dados</h1>

<?php
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "nome", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "email", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "celular", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "cpf", "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "rg", "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "cep", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "estado", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "cidade", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "bairro", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "rua", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "numero", "required" => true, "confirm" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "complemento", "confirm" => true]);
?>