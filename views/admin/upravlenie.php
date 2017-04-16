 <?php include ROOT . '/views/layouts/header.php'; ?>
 <?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>

 <section>

 	<div class="container">
 		<div class="col-sm-4 padding-right">

 			<div class="users_list">
 				<h5>Сотрудники</h5>
 				<?php foreach($users as $user): ?>

 					<div class="panel panel-default">
 						<div class="panel-heading">
 							<h4 class="panel-title">
 									<?php echo $user['name']." ".$user['surname'];?> <br>
 									Возраст: <?php echo $user['age'];?> <br>
 									Специализация: <?php echo $user['spec'];?> <br>
 									Рабочий стаж: <?php echo $user['work_exp'];?> мес.  <br>
 									Email: <?php echo $user['email'];?> <br>
 									Пароль: <?php echo $user['password'];?>
 							</h4>
 							<a href="/admin/edit/user/<?php echo $user['id'];?>">Редактировать</a> <br>	
 							<a href="/admin/delete/user/<?php echo $user['id'];?>">Удалить</a>


 						</div>
 					</div>
 	
 				<?php endforeach; ?>


 			</div>

 		</div>
 	</div>

 </section>

 <?php include ROOT . '/views/layouts/footer.php'; ?>