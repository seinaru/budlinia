<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8" />
	<title>Главная страница</title>
	<meta name="discription" content="" />
	<link rel="stylesheet" content="text/css" href="css/styles.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>  $(function() {
			$(«li»).click(function(e) {
				e.preventDefault();
				$(«li»).removeClass(«active»);
				$(this).addClass(«active»);
			});
		});
	</script>

	<style>

	</style>
</head>

<body>
<div class="wrapper">
	<div class="page">
		<div class="logo">
			<a href="/"><img src="img/logo.jpg" height="120px"></a>
		</div>
		<div class="top-phone">

		</div>
		<div class="top-icon-menu">
			<ul>
				<li>
					<a href="/todo" alt="oops" ><img src="img/user-icon.jpg" ></a>

				</li>
				<li>
					<a href="/test" alt="oops"><img src="img/menu-icon.jpg"></a>
				</li>
				<li>
					<a href="/bucket" alt="oops"><img src="img/goods-icon.jpg"></a>
				</li>
				<li>
					<p>Phone: + 38 (888) 888-88-88</p>
					<p>Мы работаем: Пн - Пт </p>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="nav">
<nav >
	<a href="/buildingmaterials">Общестроительные материалы</a>
	<a href="/decorationmaterials">Отделочные материалы</a>
	<a href="/todo">Инструменты</a>
	<a href="/todo">Полы</a>
</nav>
</div>
<div class="phpContent" style="max-width: 1200px">
	<?php include 'application/views/'.$content_view; ?>

</div>



<footer>
	<div class="page1">
	<div class="information" style="float: left">
			<ul>
				<li><a href="/">ИНФОРМАЦИЯ</a></li>
				<li><a href="/">Скидки</a></li>
				<li><a href="/">Новые товары</a></li>
				<li><a href="/">Популярные товары</a></li>
				<li><a href="/">Свяжитесь с нами</a></li>
				<li><a href="/">Наш магазин</a></li>

			</ul>

	</div>
	<div class="my-profile">
			<ul>
				<li><a href="/">МОЯ УЧЕТНАЯ ЗАПИСЬ</a></li>
				<li><a href="/bucket">Мои заказы</a></li>
				<li><a href="/">Моя личная информация</a></li>
			</ul>
	</div>
	<div class="contactUs">
		<ul>
			<li>
				<a href="index.php">СВЯЖИТЕСЬ С НАМИ</a>
			</li>
			<li>
                <span>&#128222;  +38 (088) 888-88-88</span>
			</li>
			<li>
				<span>&#128231; adress@domen.com </span>
			</li>
		</ul>
	</div>
	</div>
</footer>

</body>

</html>