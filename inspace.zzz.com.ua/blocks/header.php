
<header>


		
			<div class="header"> 
			<div id="logo"><a href="/" title="Перейти на главную"><span style="font-size:1.5em;">A</span>bout space</a></div>

			
			<a href="/about.php" title="Информация о нас" class="button button-3d button-primary button-rounded"><b>О нас</b></a>
			<a href="/feedback.php" title="Отправить сообщение администрации" class="button button-3d button-primary button-rounded"><b>Обратная связь</b></a>
			

		
		<?php 
		if (isset($_SESSION['logged_user'])) :
		?>

				<div id="notLogined" style="display:inline-block;"></div>
			<div style="float:right">
				<a href="user.php"title="В кабинет пользователя" class="button button-3d button-primary button-rounded"><b>Кабинет Пользователя</b></a>
				<a href="logout.php"title="Выйти" class="button button-3d button-primary button-rounded"><b>Выйти</b></a>
			</div>
			<?php
			else :
			
			?>
			<div style="float:right;">
			
			<div id="notLogined" style="display:inline-block;">
			<a href="signup.php"title="Зарегестрироваться на сайте" class="button button-3d button-primary button-rounded"><b>Регистрация</b></a>
			<a href="login.php" title="Войти в кабинет пользователя" class="button button-3d button-primary button-rounded" ><b>Войти</b> </a>
			</div>
			
			
			
			</div>
	

			<?php endif; ?>
			
			
			
			</div>
			
			
		
	


</header>








