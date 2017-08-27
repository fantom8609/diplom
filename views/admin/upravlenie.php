 <?php include ROOT . '/views/layouts/header.php'; ?>
 <?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>

 <section>

 	<div class="container">


 		<div class="col-sm-4">
 			<!-- Поиск по сотрудникам -->
 			<form name="search" method="POST">
 				<input type="text" name="words" />
 				<input type="submit" name="bsearch" value="Поиск по сотрудникам"/>
 			</form>

 			<?php if (isset($_POST['bsearch'])) {
 				$words = $_POST['words'];
 				$result = Admin::search($words);

 				if (empty($result)) {
 					echo "Сотрудников не найдено";
 				}
       // else print_r($result);
 			}
 			?>
 			<?php if(isset($_POST['bsearch']) && !empty($result)): ?>
 				<!-- Результаты поиска -->
 				<h5>Результаты поиска</h5>
 				
 				<?php foreach($result as $resultItem): ?>
 					<div class="panel panel-default">
 						<div class="panel-heading">
 							<h4 class="panel-title">
 								<?php echo $resultItem['name']." ".$resultItem['surname'];?> <br>
 								Возраст: <?php echo $resultItem['age'];?> <br>
 								Специализация: <?php echo $resultItem['spec'];?> <br>
 								Рабочий стаж: <?php echo $resultItem['work_exp'];?> мес.  <br>
 								Email: <?php echo $resultItem['email'];?> <br>
 								Пароль: <?php echo $resultItem['password'];?>
 							</h4>
 							<a href="/admin/edit/user/<?php echo $resultItem['id'];?>">Редактировать</a> <br>	
 							<a href="/admin/delete/user/<?php echo $resultItem['id'];?>">Удалить</a>
 						</div>
 					</div>

 				
 				<?php endforeach; ?>
 			<?php endif; ?>

 			</div>
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