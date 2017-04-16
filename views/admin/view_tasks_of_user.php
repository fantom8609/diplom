<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">

      <?php foreach($tasks as $task): ?>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="/task/<?php echo $task['id'];?>">
                  <?php echo $task['title'];?>
                </a>
              </h4>

            </div>
          </div>

        <?php endforeach; ?>
      </div>



      <div class="col-sm-4 padding-right">



      </div>
    </div>
  </div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>