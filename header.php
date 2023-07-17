<body>
	<div id="wrapper">
		<header id="main_header">
			<div id='hello' onclick="location.href='index.php'">
				<img src='imgs/MYLOGO.png'>
			</div>
			
			<nav id="main_menu">
				<ul id='menu_line'>
					<li onclick="location.href='https://vk.com/digimemes'">ГРУППА С МЕМАМИ</li>
					<li onclick="location.href='index.php?shop'">ШОПУС</li>
					<li>ЗДЕСЬ</li>
					<li>ТАМ</li>
					<li>ВЫХОД</li>
					<?php
					if (isset($_SESSION['id']))
					{
						echo "<li>КОРЗИНА</li>";
					};
					?>
					<li onclick="open_login_form()" id='login_menu_button'>
					<?php
						$dc->auth_key();
					?>
					</li>
					
				</ul>
				
			</nav>
			
			
		</header>
		<div class="popup_form_login" id="login_form">
						<h1>ВЛОГИНИТЬСЯ</h1>
						<form action="php/login.php" class="form-container" method='post'>
							
							<label for='login'><b>ЛОГИН</b></label>
							<input type='text' name='login' required autofocus >
							<label for='password'><b>ПАРОЛЬ</b></label>
							<input type='text' name='password' required>
							<button class='btn_func' type='submit'>СУБМИТНУТЬ</button>
						</form>
						<?php
						
							if (!isset($_SESSION['id']))
								{echo "<a href='index.php?register'>ЗАРЕГИСТРИРОВАТЬСЯ</a>";}
							else
								{echo "<a href='index.php?logout'>РАЗЛОГИНИТЬСЯ</a>";}
						?>
						</div>