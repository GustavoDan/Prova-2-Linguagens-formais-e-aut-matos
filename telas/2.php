<h1 class="h3 my-3 fw-normal text-center">Digite seus dados</h1>

<?php
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "nome", "required" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "celular", "required" => true, "max_length" => 15]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "cpf", "required" => true, "max_length" => 14]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "rg", "required" => true, "max_length" => 12]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "cep", "required" => true, "max_length" => 9]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "estado", "required" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "cidade", "required" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "bairro", "required" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "rua", "required" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "numero", "required" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "complemento"]);
?>