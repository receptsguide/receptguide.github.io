<?php
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Рецепты Шашлыка</title>
		<link rel="shortcut icon" href="Pictures\2.ico" type="Pictures/x-icon">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css\index.css" type="text/css">
		<style>
			img{
			margin-right: 50px;
			margin-top: 20px;			
			}
			.content {
                width: 100%;
                box-sizing: border-box;
            }
            /*------------------------------стили для рейтинга--------------------------*/
            .ratingHolder {
                width: 210px;
                position: relative;
            }
            .ratingHolder .userRatingHolder {
                opacity: 0;
                transition: .1s;
            }
            .ratingHolder:hover .userRatingHolder, .ratingHolder.voted .userRatingHolder {
				opacity: 1; 
				transition: .1s;
			}
			
            .ratingHolder .userRating {
                 position: absolute; top: -10px; left: 0;
                 padding: 10px 16px;
                 cursor: pointer;
                 z-index: 9999;
                 background-color: #ffffff;
                 border-radius: 5px;
                 width: 178px; height: 31px;
			}
			
            .ratingHolder.voted .userRating {background-color: #598a86;}
            .ratingHolder .passiveRatingHolder {
                position: relative;
                width: 178px; 
				height: 37px;
                left: 50%; 
				margin-left: -89px; 
				display: block;
            }
            .ratingHolder .passiveRatingHolder > div {
                position:absolute; left: 0; top: 0;
                height: 37px;
                background-image: url("stars.svg");
                background-repeat: no-repeat;
                background-size: 178px;
            }
            .ratingHolder .passiveRatingHolder .ratingBg {
				background-position: 0 0; 
				width: 178px; 
				z-index: 1;
			}
			
            .ratingHolder .passiveRatingHolder .ratingMask {
				background-position: 0 -41px; 
				z-index: 99;
			}
			
            .ratingHolder .vote {
                transition: .2s;
                position: absolute; top: 0;
                cursor: pointer;
                z-index: 99999;
                width: 32px; height: 31px;
                background-image: url("stars.svg");
                background-repeat: no-repeat; 
				background-position: 0 0; 
				background-size: 178px;
            }
            .ratingHolder .vote:hover ~ .vote, .vote.active ~ .vote {
				transition: .2s;
				background-position: 0 -41px;
			}
			
            .ratingHolder .vote:hover, .ratingHolder.voted .vote.active {
				transition: .2s;
				background-position: 0 -81px;
			}
			
            .ratingHolder .votingHolder {
				direction: rtl;
				position: relative
			}
			
            .ratingHolder .vote.onestar {left: 80%;}
            .ratingHolder .vote.twostar {left: 60%;}
            .ratingHolder .vote.threestar {left: 40%;}
            .ratingHolder .vote.fourstar {left: 20%;}
            .ratingHolder .vote.fivestar {left: 0;}
            .ratingHolder.voted .vote {pointer-events:none;}
            .ratingHolder.voted .vote:hover {background-position: 0 0;}
            .ratingHolder.voted .vote.active ~ .vote {background-position: 0 -41px;}
            .ratingHolder.voted .vote.active:hover {background-position: 0 -81px;}
            
			.ratingHolder .rateNumbers {
				text-align: center;
				width: 100%; color: #a1a1a1;
				font-size: 14px;
			}
			
            .ratingHolder .rateNumbers .ratingvalue {
				color: #2d2d2d; 
				font-size: 26px;
			}
			
            .ratingHolder .rateNumbers .bestrating {
				margin-bottom: 4px;
				display: inline-block;
				font-size: 20px;
			}
			
            .ratingHolder .text {
				color: #4f8d88;
				text-align: center;
				margin: 0; opacity: 0; 
				transition: .1s;
				height: 0px;
			}
			
            .ratingHolder.voted .text {
				opacity: 1;
				margin: 10px 0 0 0;
				transition: .1s; 
				height: auto;
			}

/*------------------------------стили footer--------------------------*/
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
		
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script>
            $( document ).ready(function() {
                $('.vote').on ('click', function(){
                    $(this).addClass('active');
                    var parent = $(this).parent().parent().parent().parent();
                    var commentCountElement = parent.find('.commentscount');
                    var ratingValueElement = parent.find('.ratingvalue');
                    var votedValue = parseInt($(this).attr('data-score'));
                    parent.addClass('voted');
                    var commentCount = parseInt(commentCountElement.text());
                    commentCountElement.text(commentCount + 1);
                    var rating = parseFloat(ratingValueElement.text());
                    rating = (commentCount * rating + votedValue)/(commentCount + 1);
                    ratingValueElement.text(rating.toFixed(2));
                    console.log('AJAX запрос примет значение ' + votedValue);
                })
            })
        </script>
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
							<li><a href="LogIn.php" class="smoothScroll"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
							<li><a href="Sign.php" class="smoothScroll"> Зарегистрироваться</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript"></script>	
		
		<div class="l1">		
			<h1><img class="img2" width="550" height="400" align="right" 
			src="https://statusmen.ru/wp-content/uploads/2017/08/Marinade-from-white-wine.jpg">
			<ins>Шашлык на красном вине</ins></h1>
			</br>
			<div class="content">

			<!--рейтинг начинается тут-->
            <div itemscope="" itemtype="http://schema.org/CollectionPage" class="ratingHolder">
                <div class="userRatingHolder">
                    <div class="userRating">
                        <div class="votingHolder">
                            <div data-score="5" class="vote onestar"></div>
                            <div data-score="4" class="vote twostar"></div>
                            <div data-score="3" class="vote threestar"></div>
                            <div data-score="2" class="vote fourstar"></div>
                            <div data-score="1" class="vote fivestar"></div>
                        </div>
                    </div>
                </div>
                <div class="passiveRatingHolder">
                     <div class="ratingBg"></div>
                     <div style="width: 85%;" class="ratingMask"></div>
                </div>
                <div class="text">Ваш голос учтен!</div>
                <div class="rateNumbers">
                    <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                        <span itemprop="ratingValue" class="ratingvalue">4.25</span>
                        /
                        <span itemprop="bestRating" class="bestrating">5.00</span>
                        <div class="br"></div>
                        (
                        <span itemprop="reviewCount" class="commentscount">4</span>
                        голосов)
                    </div>
                </div>
            </div>
            <!--рейтинг заканчивается тут-->
		</div>
		
		<h3>Ингредиенты для маринада на 1 кг мяса:</h3>
		<big><table border="1" align="center" text-font size="5">
			<tr>
				<th height="50">Ингредиент</th>
				<th>Количество</th>
			</tr>

			<tr>
				<td>Мясо</td>
				<td align="center">1кг</td>
				</tr>
			<tr>
				<td>Красное сухое вино </td>
				<td align="center">300мл</td>		
			</tr>
			<tr>
				<td>Репчатый лук</td>
				<td align="center">4шт</td>
			</tr>
			<tr>
				<td>Соль</td>
				<td align="center">по вкусу</td>
			</tr>
			<tr>
				<td>Черный перец (молотый)</td>
				<td align="center">по вкусу</td>
			</tr>
			<tr>
				<td>Лавровый лист</td>
				<td align="center">4-5шт</td>
			</tr>
			<tr>
				<td>Специи шашлыка</td>
				<td align="center">30гр</td>
			</tr>
			<tr>
				<td>Гвоздика</td>
				<td align="center">5-8шт</td>
			</tr>
			<tr>
				<td>Укроп или кинза</td>
				<td align="center">0,5 пучка</td>
			</tr>
		</table></big>
		<ol> <h3>Рецепт:</h3>
			<li>Разморозить мясо (свинина, баранина, говядина) до комнатной температуры. 
			Промыть проточной водой, дать воде стечь, удалить жилы и крупные куски жира.</li>
			<li>Нарезать мясо кусочками 5×5 см и слегка отбить.</li>
			<li>Очистить четыри луковицы, затем нарезать их кольцами, чтобы потом было удобно
			насаживать на шампур. Оставшуюся луковицу измельчить как для жарки на сковородке.</li>
			<li>Измельчить укроп, половину зелени пересыпать в отдельную миску, она нужна для 
			приправки готового шашлыка.</li>
			<li>Положить в глубокую эмалированную или пластиковую посуду кусочки мяса и мелкопорезанный 
			лук. Перемешивать 3-4 минуты, пока кусочки не пропитаются ароматом лука.</li>
			<li>Добавить 50 мл красного вина, снова перемешивать 2-3 минуты.</li>
			<li>Уложить мясо для мариновки в кастрюлю, приправляя каждый слой зеленью, специями, лавровым листом,
			гвоздикой, черным перцем и солью.</li>
			<li>Равномерно залить кусочки оставшимся вином (250 мл), сверху положить кольца лука.</li>
			<li>Затянуть горлышко кастрюли пищевой пленкой и поставить замаринованное мясо в холодильник на 5-6 часов.</li>
			<li>При насаживании на шампуры кусочки мяса чередовать с луком и красным перцем. Во время
			жарки шашлыки периодически взбрызгивать оставшимся маринадом.</li>
		</ol>
		<p>Шашлык подаётся с самыми разнообразными соусами. Что выбрать, это уже дело личных предпочтений.
		При подаче блюдо можно посыпать измельчённой зеленью и полить лимонным соком. С этим мясом 
		рекомендуют также употреблять свежий томатный сок или салат из овощей.</p>
	
		</div>
		
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