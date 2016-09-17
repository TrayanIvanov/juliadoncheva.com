<body>
	<div id="chocolate">
		<div id="julia"><a href="index.php" class="hed">д-р Юлия Дончева PhD</a> <span class="pw">личен сайт</span></div>
		<div id="starfish">
			<header>
				<nav>
					<ul>
						<li <?=$Page == 1 ? "class='active'" : ""?>><a href="index.php">Начало</a></li>
						<li <?=$Page == 2 ? "class='active'" : ""?>><a href="news.php">Новини</a></li>
						<li <?=$Page == 3 ? "class='active'" : ""?>><a href="cv.php">Автобиография</a></li>
						<li <?=$Page == 4 ? "class='active'" : ""?>><a href="gallery.php">Галерия</a></li>
						<li <?=$Page == 5 ? "class='active'" : ""?>><a href="contacts.php">Контакти</a></li>
					</ul>
				</nav>
				<img src="images/header/header.jpg" width="980" height="220" alt="Julia Doncheva" title="Julia Doncheva" />
			</header>