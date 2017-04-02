<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

            	<?php foreach ($user as $userItem): ?>
            		<li> - <?php echo $userItem['name']; ?></li>
            		<li> - <?php echo $userItem['surnane']; ?></li>
            		<li> - <?php echo $userItem['name']; ?></li>
            		<li> - <?php echo $userItem['name']; ?></li>
            		<li> - <?php echo $userItem['name']; ?></li>
            	<?php endforeach; ?>
            	<div>Hello,world!</div>

     


            
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>