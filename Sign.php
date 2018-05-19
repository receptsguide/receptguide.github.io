<?php
	require "db.php";

	$data = $_POST;
	if (isset($data['do_signup']))
	{
		//Здесь регистрируем
		if (trim($data['login']) == '' ){
			$errors[] = 'Введите логин!';
		}
		
		if (trim($data['email']) == '' ){
			$errors[] = 'Введите email!';
		}
		
		if ($data['password'] == '' ){
			$errors[] = 'Введите пароль!';
		}
		
		if ( $data['password'] != $data['password_2']) {
			$errors[] = 'Пароли не совпадают!';
		}
		
		if (R::count('users', "login = ?", array($data['login'])) > 0) {
			$errors[] = 'Пользователь с таким логином уже существует!';
		}
		
		if (R::count('users', "email = ?", array($data['email'])) > 0) {
			$errors[] = 'Пользователь с таким E-mail уже существует!';
		}
		
		if (empty($errors)){
			//Все хорошо
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
		}
	}
?>
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
		<meta charset="utf-8"/>
		<title>Регистрация</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css\sign.css" type="text/css">
		<link rel="shortcut icon" href="Pictures\2.ico" type="Pictures/x-icon">
		<style type="text/css">
			.bottom {padding-top: 50px;}
			.dropdown-menu{background-color:#111111;}
		
			@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,300);
			footer { background-color:#211917; min-height:350px; font-family: 'Open Sans', sans-serif; }
			.footerleft { margin-top:50px; padding:0 36px; }
			.logofooter { margin-bottom:10px; font-size:25px; color:#FFEBCD; font-weight:700;}

			.footerleft p { color:#FFEBCD; text-shadow: 1px 1px 2px black; font-size:12px !important; font-family: 'Open Sans', sans-serif; margin-bottom:15px;}
			.footerleft p i { width:20px; color:#999;}

			.paddingtop-bottom {  margin-top:50px;}
			.footer-ul { list-style-type:none;  padding-left:0px; margin-left:2px;}
			.footer-ul li { line-height:29px; font-size:12px;}
			.footer-ul li a { color:#FFEBCD; text-shadow: 1px 1px 2px black; transition: color 0.2s linear 0s, background 0.2s linear 0s; }
			.footer-ul i { margin-right:10px;}
			.footer-ul li a:hover {transition: color 0.2s linear 0s, background 0.2s linear 0s; color:#ff670f; }

			.social:hover {
				-webkit-transform: scale(1.1);
				-moz-transform: scale(1.1);
				-o-transform: scale(1.1);
			}  
		
			.icon-ul { list-style-type:none !important; margin:0px; padding:0px;}
			.icon-ul li { line-height:75px; width:100%; float:left;}
			.icon { float:left; margin-right:5px;}
 
			.copyright { min-height:40px; background-color:#000000;}
			.copyright p { text-align:left; color:#FFF; padding:10px 0; margin-bottom:0px;}
			.heading7 { font-size:21px; font-weight:700; color:#FFEBCD; text-shadow: 1px 1px 2px black; margin-bottom:22px;}
			.post p { font-size:12px; color:#FFEBCD; text-shadow: 1px 1px 2px black; line-height:20px;}
			.post p span { display:block; color:#FFEBCD; text-shadow: 1px 1px 2px black;}
			.bottom_ul { list-style-type:none; float:right; margin-bottom:0px;}
			.bottom_ul li { float:left; line-height:40px;}
			.bottom_ul li:after { content:"/"; color:#FFF; margin-right:8px; margin-left:8px;}
			.bottom_ul li a { color:#FFF;  font-size:12px;}
		</style>
		
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</head> 
	<body class="bottom">

<!---------------Header---------------->
			<div id="navbar-main">
				<div class="navbar navbar-inverse navbar-fixed-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
							</button>
							<a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class=""><a href="index.php" class="smoothScroll"><span class="glyphicon glyphicon-home"></span> Главная</a></li>
								<li class=""> <a href="description.php" class="smoothScroll"> Описание рецептов</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-cutlery"></span> Рецепты <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a class="text" href="Recept2.php">Шашлык на красном вине</a></li>
										<li><a href="Recept1.php">Шашлык на белом вине</a></li>  
									</ul>
								</li>                                           
								<li class=""> <a href="komments.php" class="smoothScroll"> Оставить отзыв</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class=""><a href="LogIn.php" class="smoothScroll"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
								<li class="active"><a href="Sign.php" class="smoothScroll"> Зарегистрироваться</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript"></script>

<!----------Форма----------->			
			<img class="img1" width="500" height="380" align="right" src="http://www.pratikbilgiler.biz/wp-content/uploads/2017/05/pratik-mangal-59158a0e0c554.jpeg">
			<form action="" method="post">
				<p><label>Форма регистрации:</label></p>
			
				<p><label class="label">Введите логин:</label><input type="text" name="login" placeholder="Логин" value="<?php echo @$data['login'];?>"></p></br></br>
            
				<p><label class="label">Введите ваш E-mail:</label><input type="email" name="email" placeholder="E-mail" value="<?php echo @$data['email'];?>"></p></br></br>
			
				<p><label class="label">Введите пароль:</label><input type="password" name="password" placeholder="Пароль" value="<?php echo @$data['password'];?>"></p></br></br>
			
				<p><label class="label">Подтвердите пароль:</label><input type="password" name="password_2" placeholder="Повторите пароль"></p></br>
			
				<p><button class="submit" type="submit" name="do_signup">Зарегистрироваться</button></p>

				<? if (!empty($errors)) echo '<div style="color:red;">'.array_shift($errors).'</div>' ?>
				<? if (!empty($user)) echo '<div style="color: green;">Вы успешно зарегистрировались!</div>' ?>
				
            </form>

<!---------------Footer---------------->	
			<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 footerleft ">
							<div class="logofooter"> ReceptsGuide</div>
							<p>Перепечатка материалов с обязательной ссылкой на сайт - приветствуется!. Все материалы на сайте предоставлены 
							исключительно в ознакомительных и образовательных целях, администрация сайта не претендует на их авторство и не 
							несёт ответственности за их содержание.</p>
							<p><i class="fa fa-phone"></i> Тел.: (Украина) : +380 50 005 1065</p>
							<p><i class="fa fa-envelope"></i> E-mail : info@gmail.com</p>
        
						</div>
						<div class="col-md-2 col-sm-6 paddingtop-bottom">
							<h6 class="heading7">ОСНОВНЫЕ ССЫЛКИ</h6>
							<ul class="footer-ul">
								<li><a href="#"> Новости</a></li>
								<li><a href="#"> Политика конфиденциальности</a></li>
								<li><a href="#"> Положения и Условия</a></li>
								<li><a href="#"> Связаться с нами</a></li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-6 paddingtop-bottom">
							<h6 class="heading7">Последние Рецепты</h6>
								<div class="post">
									<p>Шашлык на красном вине<span>Май 17,2018</span></p>
									<p>Шашлык на белом вине<span>Май 17,2018</span></p>
								</div>
						</div>
						<div class="col-md-3 col-sm-6 paddingtop-bottom">
							<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline"
							data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" 
							data-hide-cover="false" data-show-facepile="true">
								<div class="fb-xfbml-parse-ignore">
									<blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>

			<div class="copyright">
				<div class="container">
					<div class="col-md-6">
						<p>Copyright  &copy; 15.03.2018 - <?php  echo date('d.m.Y');?>, ReceptsGuide - Все права защищены.</p>
					</div>
					<div class="col-md-6">
						<ul class="bottom_ul">
							<li><a href="#">receptsguide.com</a></li>
							<li><a href="#">О нас</a></li>
							<li><a href="#">Блог</a></li>
							<li><a href="#">Факты</a></li>
							<li><a href="#">Контакты</a></li>
							<li><a href="#">Карта сайта</a></li>
						</ul>
					</div>
				</div>
			</div>
			<script type="text/javascript"></script>
		</body>
</html>