<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu.php'; ?>

    <div class="container">
        <div class="row">

        	<div class="col-sm-4 col-sm-offset-4">
        		<ul>
        			<li>Имя: <?php echo $user['name']; ?>  <br></li>
        			<li>Фамилия: <?php echo $user['surname']; ?> <br></li>
        			<li>Возраст: <?php echo $user['age']; ?> <br></li>
        			<li>Специализация: <?php echo $user['spec']; ?> <br></li>
        			<li>Рабочий стаж: <?php echo $user['work_exp']; ?> <br></li>
        			<li>Пароль: 
        			<?php $pass = $user['password']; 
        		for($i=1;$i<=strlen($pass);$i++) {
        			$invisible[$i] = preg_replace('/^[a-zA-Z0-9]+/','*',$pass);
        			print_r($invisible[$i]);
        		}
        			
        			?> 
        			<br>
        			</li>
        			<li>Email: <?php echo $user['email']; ?> <br></li>
        		</ul>
            </div>



            <div class="col-sm-4 col-sm-offset-4 padding-right">
            trggrtr

            </div>


          </div>
        </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>