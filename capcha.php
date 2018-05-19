<?php
if(isset($_POST["butTest"])){
if (isset($_POST['g-recaptcha-response'])) {
$url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";

$secret_key = 'Секретный код';

$query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];

$data = json_decode(file_get_contents($query));

if ($data->success) {
header('Location: index.php');
}

else {
echo('Вы не прошли валидацию reCaptcha');
}

}

}
else {
echo('Кнопка не нажата');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<form action="test.php" method="post">
<div class="g-recaptcha" data-sitekey="6LdFiEAUAAAAAMje4MezhWtZ97FYXKrM3LGT2_Nq"></div>
<button type="submit" name="butTest">Кнопка</button>
</form>
</body>
</html>