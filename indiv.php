<?php
require("db.php");
// session_start();
// $loginAdmin = "admin";
// $passwordAdmin = "nikita";
// if ($_SESSION["login"] === $loginAdmin && $_SESSION["user_code"] === $passwordAdmin) {
// 	header('Location: control.php');
// }
// else{

// }
$title = null;
$value = null;
$qr = "SELECT * FROM `variables`";
$pr = array(
	"title" => $title,
	"value" => $value,
);
$rs = db::getAll($qr);
foreach ($rs as $value) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header id="header" class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
			<div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="logo.png" width="155px" height="70px">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse w-100 justify-content-center me-5" id="navbarNavDropdown">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Фотостудия
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="light.php">Светлая студия</a></li>
								<li><a class="dropdown-item" href="dark.php">Темная студия</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Частные уроки</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Курсы фотографа
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="kursy.php #scrollspyHeadingg1">7 дневный курс</a></li>
								<li><a class="dropdown-item" href="kursy.php #scrollspyHeadingg2">30 дневный курс</a></li>
								<li><a class="dropdown-item" href="kursy.php #scrollspyHeadingg3">60 дневный курс</a></li>
							</ul>
						</li>
							<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Обратный звонок</button>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- Модальное окно -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Запись</h3>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form>
					<div class="mb-3">
						<div class="modal-body">
							Выберите дату записи и мы перезвоним вам.
						</div>
						<div class="mb-3" style="margin: 10px 10px 10px 10px;">
							<input type="text" id="only_num" value="" class="form-control" placeholder="Введите номер телефона">
						</div>
						<div class="mb-3" style="margin: 10px 10px 10px 10px;">
							<input class="form-control" id="exampleInputEmail1" type="date" name="Date" id="davaToday">
						</div>
				</form>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
				<button type="button" class="btn btn-primary">Отправить</button>
			</div>
			</form>
		</div>
	</div>
	</div>
    
    <!-- Главное изображение -->
   

 
    <figure class="figure" style="width: 100%;">
    <img src="images/indiv.jpg" style="max-height: 980px; width: 100%; object-fit:cover;" class="img-fluid" alt="indiv.jpg">
		<div class="carousel-caption d-none d-md-block text-start" style="text-shadow: 1px 1px 1px black, 0 0 10em black;">
			<h1 class="display-3">Пять шагов <br> на пути к фотографии.</h1><br><br>
            <p style="font-size: 25px;">Частные уроки фотографии.</p>
		</div>
	</figure>



	<!-- ЦИТАТА с Авторизацией и регистрацией -->
	<?php if (isset($_COOKIE['user']) == false) : ?>
		<figure class="text-center" id="authreg">
			<blockquote class="blockquote">
				<p>Авторизуйтесь если у вас уже есть аккаунт, или создайте его.</p>
			</blockquote>
			<br>
			<figcaption class="blockquote-footer">
				<a class="btn btn-primary" id="offauth" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
					Авторизация
				</a>
				<a class="btn btn-primary" id="offreg" data-bs-toggle="offcanvas" href="#offcanvasReg" role="button" aria-controls="offcanvasExample">
					Регистрация
				</a>
			</figcaption>
		</figure>
	<?php else : ?>
		<p>Привет <?= $_COOKIE['user'] ?>. Чтобы выйти нажмите <a href="logout.php">здесь</a>.</p>
	<?php endif; ?>
	<!-- ВНЕ ХОЛСТА - АВТОРИЗАЦИЯ -->

	<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
		<div class="offcanvas-header">
			<h2 class="offcanvas-title" id="offcanvasExampleLabel">Авторизация</h2>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
		</div>
		<div class="offcanvas-body">

			<!-- <div>
		Какой-то текст в качестве заполнителя. В реальной жизни у вас могут быть элементы, которые Вы выбрали. Нравится, текст, изображения, списки и т. д.
	  </div>
	  <div class="dropdown mt-3">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
		  Кнопка раскрывающегося списка
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		  <li><a class="dropdown-item" href="#">Действие</a></li>
		  <li><a class="dropdown-item" href="#">Другое действие</a></li>
		  <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
		</ul> -->

			<form id="form" action="include.php" method="POST">
				<div class="mb-3">
					<input name="form" value="auth" type="hidden">
					<label for="exampleInputEmail1" class="form-label">Логин</label>
					<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите логин" name="login" maxlength="64" required>
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Пароль</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" name="user_code" maxlength="64" required>
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
				</div>
				<button type="submit" class="btn btn-primary">Войти</button>
			</form>

		</div>
	</div>
	</div>

	<!-- ВНЕ ХОЛСТА - РЕГИСТРАЦИЯ -->

	<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasReg" aria-labelledby="offcanvasExampleLabel">
		<div class="offcanvas-header">
			<h2 class="offcanvas-title" id="offcanvasExampleLabel">Регистрация</h2>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
		</div>
		<div class="offcanvas-body">
			<form id="form" action="include.php" method="POST">
				<input name="form" value="reg" type="hidden">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Логин</label>
					<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите логин" name="login" maxlength="64" required>
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Пароль</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" name="user_code" maxlength="64" required>
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
				</div>
				<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
			</form>

		</div>
	</div>
	</div>
	
	<section>
	<div class="container-fluid" style="margin-bottom: 100px;">
		<div class="row">
			<div class="col-lg-3 col-sm-6 text-center">
				<div class="info">
			<img class="img-fluid rounded mx-auto d-block" src="images/photo.png" style=" height: 120px; object-fit: cover;" alt="">
				<p style="font-size: 18px;">Профессиональное <br>оборудование для съемки</p>	
				</div>
				</div>
			<div class="col-lg-3 col-sm-6 text-center">
			<div class="info">
			<img class="img-fluid rounded mx-auto d-block" src="images/size.png" style=" height: 110px; object-fit: cover;" alt="">
				<p style="font-size: 18px; margin-top:10px;">3 студии с стильным <br> интерьером размером 500м²</p>	
				</div>
				</div>
			<div class="col-lg-3 col-sm-6 text-center"> 
			<div class="info">
			<img class="img-fluid rounded mx-auto d-block" src="images/parking.png" style=" height: 120px; object-fit: cover;" alt="">
				<p style="font-size: 18px;">Бесплатная парковка<br> для посетителей студии</p>	
				</div>
				</div>
			<div class="col-lg-3 col-sm-6 text-center">
			<div class="info">
			<img class="img-fluid rounded mx-auto d-block" src="images/pay.png" style=" height: 120px; object-fit: cover;" alt="">
				<p style="font-size: 18px;">Удобная оплата<br> картами MasterCard, VISA, МИР</p>	
				</div>
				</div>
			</div>
		</div>
	</div>
	</section>



        <!-- 5 шагов фотографа -->


        <div class="container justify-content-center" style="align-items:center;">
        <div class="row">
            <div class="col-sm-12 col-xxl-12">
    <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading1">Первый</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading2">Второй</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading3">Третий</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading4">Четвертый</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading5">Пятый</a>
    </li>
  </ul>
</nav>
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
  <h2 id="scrollspyHeading1">Занятие первое “Оборудование”,</h2>
  <hr>
  <p style="margin-bottom:50px;">Немного об истории фотографии. Светочувствительность. Пленка и матрица.
По-настоящему понять то, что происходит внутри камеры, смартфона или компьютера, обрабатывающего фотографию очень непросто. Поэтому мы поговорим о том, как происходит процесс рисования светом в аналоге. Посмотрим, что происходит с пленкой, потом с фотобумагой в лаборатории. Поговорим, посмотрим видео. Покрутим старую пленочную камеру, посмотрим, где и как проходит пленка, что делает зеркало в зеркальной камере.
На занятии мы разберем камеры: цифровые и аналоговые. <br> Посмотрим, какие бывают штативы, накамерные вспышки и накамерный свет. Чуть-чуть поговорим о батареях, батарейных блоках, хранении данных и картах памяти.
Может показаться, что это занятие никак не должно быть стартовым. Потому что мы не говорим об истории фотографии, о мастерах-фотографах, золотом сечении, прошлом и будущем профессии. Не говорим о фотографии как хобби, профессии или искусстве…
На самом деле говорим. Все семь занятий мы только и делаем, что говорим о том, что такое фотография и почему «фотки на телефон» — это совсем не об этом.
Дело в том, что большая часть тех, кто хочет снимать, именно хотят снимать. Они уже купили камеру, просмотрели десятки Canon vs Nikon и хотят щелкать затвором. Этот первый и важный вектор не хочется преодолевать. Его нужно направить в правильную сторону. 
Поэтому мы много говорим о фотографии с практической точки <br> зрения. Об оборудовании, о технических характеристиках. Мы рассказываем, как лучше всего пользоваться сложным и красивым инструментом — камерой. 
Занятие с камерой в руках. С камерами в руках. У вас будет возможность попробовать снимать тремя или четырьмя разными камерами. Посмотреть чем профессиональная камера отличается от полупрофессиональной и любительской. Зная немного больше о камерах, именно после этого урока мы советуем идти в магазин за своей первой камерой.</p>
  <h2 id="scrollspyHeading2">Занятие второе
«Объективные Объективы»,</h2>
<hr>
  <p style="margin-bottom:50px;">Немного об истории фотографии. Светочувствительность. Пленка и матрица.
По-настоящему понять то, что происходит внутри камеры, смартфона или компьютера, обрабатывающего фотографию очень непросто. Поэтому мы поговорим о том, как происходит процесс рисования светом в аналоге. Посмотрим, что происходит с пленкой, потом с фотобумагой в лаборатории. Поговорим, посмотрим видео. Покрутим старую пленочную камеру, посмотрим, где и как проходит пленка, что делает зеркало в зеркальной камере.
На занятии мы разберем камеры: цифровые и аналоговые. Посмотрим, какие бывают штативы, накамерные вспышки и накамерный свет. Чуть-чуть поговорим о батареях, батарейных блоках, хранении данных и картах памяти.
Может показаться, что это занятие никак не должно быть стартовым. Потому что мы не говорим об истории фотографии, о мастерах-фотографах, золотом сечении, прошлом и будущем профессии. Не говорим о фотографии как хобби, профессии или искусстве…
На самом деле говорим. Все семь занятий мы только и делаем, <br><br> что говорим о том, что такое фотография и почему «фотки на телефон» — это совсем не об этом
Дело в том, что большая часть тех, кто хочет снимать, именно хотят снимать. Они уже купили камеру, просмотрели десятки Canon vs Nikon и хотят щелкать затвором. Этот первый и важный вектор не хочется преодолевать. Его нужно направить в правильную сторону. 
Поэтому мы много говорим о фотографии с практической точки зрения. Об оборудовании, о технических характеристиках. Мы рассказываем, как лучше всего пользоваться сложным и красивым инструментом — камерой. 
Занятие с камерой в руках. С камерами в руках. У вас будет возможность попробовать снимать тремя или четырьмя разными камерами. Посмотреть чем профессиональная камера отличается от полупрофессиональной и любительской. Зная немного больше о камерах, именно после этого урока мы советуем идти в магазин за своей первой камерой.</p>
  <h2 id="scrollspyHeading3">Занятие третье
«Тринити. Выдержка, диафрагма и …»,</h2>
<hr>
  <p style="margin-bottom:50px;">Немного об истории фотографии. Светочувствительность. Пленка и матрица.
По-настоящему понять то, что происходит внутри камеры, смартфона или компьютера, обрабатывающего фотографию очень непросто. Поэтому мы поговорим о том, как происходит процесс рисования светом в аналоге. Посмотрим, что происходит с пленкой, потом с фотобумагой в лаборатории. Поговорим, посмотрим видео. Покрутим старую пленочную камеру, посмотрим, где и как проходит пленка, что делает зеркало в зеркальной камере.
На занятии мы разберем камеры: цифровые и аналоговые. Посмотрим, какие бывают штативы, накамерные вспышки и накамерный свет. Чуть-чуть поговорим о батареях, батарейных блоках, хранении данных и картах памяти.
Может показаться, что это занятие никак не должно быть стартовым. Потому что мы не говорим об истории фотографии, о мастерах-фотографах, золотом сечении, прошлом и будущем профессии. Не говорим о фотографии как хобби, профессии или искусстве…
На самом деле говорим. Все семь занятий мы только и делаем, что говорим о том, что такое фотография и почему «фотки на телефон» — это совсем не об этом.
Дело в том, что большая часть тех, кто хочет снимать, именно хотят снимать. Они уже купили камеру, просмотрели десятки Canon vs Nikon и хотят щелкать затвором. Этот первый и важный вектор не хочется преодолевать. Его нужно направить в правильную сторону. 
Поэтому мы много говорим о фотографии с практической точки зрения. Об оборудовании</p>
  <h2 id="scrollspyHeading4">Занятие четвертое
«Поговорим предметно …»,</h2>
<hr>
  <p style="margin-bottom:50px;">Немного об истории фотографии. Светочувствительность. Пленка и матрица.
По-настоящему понять то, что происходит внутри камеры, смартфона или компьютера, обрабатывающего фотографию очень непросто. Поэтому мы поговорим о том, как происходит процесс рисования светом в аналоге. Посмотрим, что происходит с пленкой, потом с фотобумагой в лаборатории. Поговорим, посмотрим видео. Покрутим старую пленочную камеру, посмотрим, где и как проходит пленка, что делает зеркало в зеркальной камере.
На занятии мы разберем камеры: цифровые и аналоговые. Посмотрим, какие бывают штативы, накамерные вспышки и накамерный свет. Чуть-чуть поговорим о батареях, батарейных блоках, хранении данных и картах памяти.
Может показаться, что это занятие никак не должно быть стартовым. Потому что мы не говорим об истории фотографии, о мастерах-фотографах, золотом сечении, прошлом и будущем профессии. Не говорим о фотографии как хобби, профессии или искусстве…
На самом деле говорим. Все семь занятий мы только и делаем, что говорим о том, что такое фотография и почему «фотки на телефон» — это совсем не об этом.
Дело в том, что большая часть тех, кто хочет снимать, именно хотят снимать. Они уже купили камеру, просмотрели десятки Canon vs Nikon и хотят щелкать затвором. Этот первый и важный вектор не хочется преодолевать. Его нужно направить в правильную сторону. 
Поэтому мы много говорим о фотографии с практической точки зрения. Об оборудовании</p>
  <h2 id="scrollspyHeading5">Занятие пятое
«Портрет. Глаза или уши?»,</h2>
<hr>
  <p style="margin-bottom:50px;">Немного об истории фотографии. Светочувствительность. Пленка и матрица.
По-настоящему понять то, что происходит внутри камеры, смартфона или компьютера, обрабатывающего фотографию очень непросто. Поэтому мы поговорим о том, как происходит процесс рисования светом в аналоге. Посмотрим, что происходит с пленкой, потом с фотобумагой в лаборатории. Поговорим, посмотрим видео. Покрутим старую пленочную камеру, посмотрим, где и как проходит пленка, что делает зеркало в зеркальной камере.
На занятии мы разберем камеры: цифровые и аналоговые. Посмотрим, какие бывают штативы, накамерные вспышки и накамерный свет. Чуть-чуть поговорим о батареях, батарейных блоках, хранении данных и картах памяти.
Может показаться, что это занятие никак не должно быть стартовым. Потому что мы не говорим об истории фотографии, о мастерах-фотографах, золотом сечении, прошлом и будущем профессии. Не говорим о фотографии как хобби, профессии или искусстве…
На самом деле говорим. Все семь занятий мы только и делаем, что говорим о том, что такое фотография и почему «фотки на телефон» — это совсем не об этом.
Дело в том, что большая часть тех, кто хочет снимать, именно хотят снимать. Они уже купили камеру, просмотрели десятки Canon vs Nikon и хотят щелкать затвором. Этот первый и важный вектор не хочется преодолевать. Его нужно направить в правильную сторону. 
Поэтому мы много говорим о фотографии с практической точки зрения. Об оборудовании</p>
</div>
</div>
</div>
</div>

	<!-- КАРТОЧКИ -->

<!-- 
	<div class="container-fluid">
		<div class="row">
			<div class="card-group">
				<div class="card">
					<img src="?php echo $value['value'] ?" style="height: 500px; object-fit: cover;" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Почему мы?</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				<div class="card">
					<img src="images/why.jpg" class="card-img-top" style="height: 500px; object-fit: cover;" alt="...">
					<div class="card-body">
						<h5 class="card-title">Почему мы?</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				<div class="card">
					<img src="images/why.jpg" class="card-img-top" style="height: 500px; object-fit: cover;" alt="...">
					<div class="card-body">
						<h5 class="card-title">Почему мы?</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
				</div>
		</div>
	</div> -->




	<!-- АККОРДЕОН -->
	<!-- <div class="container" style="width: 79rem;">
<div class="accordion" style="margin: 15px 15px 15px 15px;" id="accordionExample">
	<div class="accordion-item">
	  <h2 class="accordion-header" id="headingOne">
		<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		  Элемент аккордеона #1
		</button>
	  </h2>
	  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		<div class="accordion-body">
		  <strong>Это тело ащен в <code>.accordion-body</code>, хотя переход ополнение.
		</div>
	  </div>
	</div>
	<div class="accordion-item">
	  <h2 class="accordion-header" id="headingTwo">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		  Элемент аккордеона #2
		</button>
	  </h2>
	  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
		<div class="accordion-body">
		  <strong>Это тело аккордеона второго элемента.</strong> По умолчанию он скрыт, пока плагин свертывания не добавит соответствующие классы, которые мы используем для стилизации каждого элемента. Эти классы управляют общим внешним видом, а также отображением и скрытием с помощью переходов CSS. Вы можете изменить все это с помощью собственного CSS или переопределить наши переменные по умолчанию. Также стоит отметить, что практически любой HTML может быть помещен в <code>.accordion-body</code>, хотя переход ограничивает переполнение.
		</div>
	  </div>
	</div>
	<div class="accordion-item">
	  <h2 class="accordion-header" id="headingThree">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		  Элемент аккордеона #3
		</button>
	  </h2>
	  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
		<div class="accordion-body">
		  <strong>Это тело аккордеона третьего элемента.</strong> По умолчанию оно скрыто, пока плагин свертывания не добавит соответствующие классы, которые мы используем для стилизации каждого элемента. Эти классы управляют общим внешним видом, а также отображением и скрытием с помощью переходов CSS. Вы можете изменить все это с помощью собственного CSS или переопределить наши переменные по умолчанию. Также стоит отметить, что практически любой HTML может быть помещен в <code>.accordion-body</code>, хотя переход ограничивает переполнение.
		</div>
	  </div>
	</div>
  </div>
</div> -->

	<!-- ФУТЕР -->



	<footer>
		<section class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-6">
						<h4>Информация</h4>
						<ul class="list-unstyled">
							<li><a href="#">Главная</a></li>
							<li><a href="#">Оплата</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-6">
						<h4>Время работы</h4>
						<ul class="list-unstyled">
							<li>г. Москва, Пионерская, дом 13 к3</li>
							<li>Пн-Вс: 6:00 - 2:00</li>
						</ul>
					</div>
					<div class="col-md-3 col-6">
						<h4>Контакты</h4>
						<ul class="list-unstyled">
							<li><a href="tel:89256469009">+7 (925) 646-90-08</a></li>
							<li><a href="tel:89256469009">+7 (925) 646-90-08</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-6">
						<h4>Мы в социальных сетях</h4>
						<ul class="nav list-unstyled justify-content-between">
							<li class=""><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
										<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
									</svg>
							<li class=""><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
										<path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
									</svg>
							<li class=""><a class="text-muted" target="_blank" href="https://vk.com/shadow201903"><img src="images/vk.svg" alt="vk.svg" width="36" height="36">
						</ul>
					</div>
				</div>
			</div>

		</section>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</body>

</html>