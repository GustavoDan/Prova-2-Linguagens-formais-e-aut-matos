<?php
session_start();

$regras = json_decode(file_get_contents('./regex/regras.json'), true);
$numero_etapas = 5;
if (!isset($_SESSION["etapa_atual"])) $_SESSION["etapa_atual"] = 1;

function includeFileWithVariables($fileName, $variables)
{
	extract($variables);
	include($fileName);
}

function validaRegex($regra, $string)
{
	$regra = "/$regra[exp]/$regra[flags]";
	if (!preg_match_all($regra, $string)) {
		return false;
	} else {
		return true;
	}
}

$validation_array = [];

if (isset($_POST['back']) && $_POST["back"] == "clicked") {
	$_SESSION["etapa_atual"]--;
} else {
	if ($_SESSION["etapa_atual"] < 4) {

		foreach ($regras as $identificador => $regra) {
			if (isset($_POST[$identificador])) {
				array_push($validation_array, validaRegex($regra, $_POST[$identificador]));
			}
		}

		if ($_SESSION["etapa_atual"] == 3 && empty($_POST["confirma_senha"])) array_push($validation_array, false);

		$error = empty($validation_array) ? null : in_array(false, $validation_array);
	} else {

		foreach ($_POST as $campo => $valor) {
			$campo_testado = str_replace('confirma_', '', $campo);
			if ($valor != $_SESSION[$campo_testado]) {
				array_push($validation_array, $campo_testado);
			}
		}
		$error = !empty($validation_array) || empty($_POST);
		$_SESSION = array_merge($_SESSION, $_POST);
	}

	if ($error === false) {
		if ($_SESSION["etapa_atual"] < $numero_etapas) {
			$_SESSION["etapa_atual"]++;
			$_SESSION = array_merge($_SESSION, $_POST);
		} else {
			session_unset();
			$_SESSION["etapa_atual"] = 1;
		}
	}
}

$progresso_atual = (100 / $numero_etapas) * $_SESSION["etapa_atual"];
?>

<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Máscara REGEX</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-5">
		<div class="row justify-content-md-center">
			<div class="col col-12 col-md-4">
				<div class="text-center">
					<img class="mb-4" src="https://login.kroton.com.br/Content/img/anhanguera/logopa.png" width="auto" height="57">
				</div>

				<div class="progress">
					<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $progresso_atual; ?>%" aria-valuenow="<?php echo $progresso_atual; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION["etapa_atual"] . " de " . $numero_etapas; ?></div>
				</div>

				<form method="POST" name="registerForm" class="d-flex flex-column">
					<?php
					include("telas/{$_SESSION["etapa_atual"]}.php");

					if (isset($error) && $error === true && !empty($_POST)) {
						if ($_SESSION["etapa_atual"] < 4) { ?>
							<p class="text-danger">
								Preencha todos os campos corretamente.
							</p>
						<?php } else { ?>
							<p class="text-danger">
								Os valores digitados nos seguintes campos não conferem com os valores registrados previamente: <?php echo ucwords(join(', ', $validation_array)) ?>
							</p>
					<?php }
					} ?>

					<div class="d-flex justify-content-between w-100">
						<?php if ($_SESSION["etapa_atual"] != 1) { ?>
							<input hidden name="back">
							<button class="btn btn-outline-secondary" type="button" id="back-button">Voltar</button>
						<?php } ?>
						<div class="invisible"></div>
						<button class="btn btn-outline-success" type="button" id="submit-button">
							<?php if ($_SESSION["etapa_atual"] == 4) {
								echo "Cadastrar";
							} elseif ($_SESSION["etapa_atual"] == 5) {
								echo "Criar outra conta";
							} else {
								echo "Avançar";
							} ?>
						</button>
					</div>
				</form>
				<p class="mt-5 mb-3 text-muted text-center">Gustavo Daniel &copy; 2022–2022</p>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
	<script type="module" src="script.js"></script>
</body>

</html>