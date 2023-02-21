<h1 class="h3 my-3 fw-normal text-center">Digite seus dados</h1>

<?php
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "email", "required" => true]);
includeFileWithVariables('./forms/campo.php', ["campo_dado" => "cpf", "required" => true, "max_length" => 14]);
?>