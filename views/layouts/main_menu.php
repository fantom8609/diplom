
<div class="row">
<div class="mainmenu col-md-6 col-md-offset-4">
<?php $user['id']=$_SESSION['user']; ?>
	<ul class="nav navbar-nav collapse navbar-collapse">
		<li><a href="/">Мои задачи</a></li>
		<li><a href="/profile/<?php echo $user['id']; ?>"">Профиль</a></li>
		<li><a href="/statistic/">Статистика</a></li>
		<li><a href="/rating/">Рейтинг</a></li>
	</ul>
</div>
</div>