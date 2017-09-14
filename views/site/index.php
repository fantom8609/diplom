<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                   

                    <div class="panel-group category-tests-2">Текущие:
                        <?php foreach ($tasks as $taskItem): ?>
                            <?php if($taskItem['status']==1): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/task/<?php echo $taskItem['id']; ?>">
                                            <?php echo $taskItem['title']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <?php endif;?> 
                        <?php endforeach; ?>
                    </div>

                    <div class="panel-group category-tests">Выполненные:
                        <?php foreach ($tasks as $taskItem): ?>
                            <?php if($taskItem['status']==3): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/task/<?php echo $taskItem['id']; ?>">
                                            <?php echo $taskItem['title']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <?php endif;?> 
                        <?php endforeach; ?>
                    </div>

                    <div class="panel-group category-tests-3">Проваленные:
                        <?php foreach ($tasks as $taskItem): ?>   
                            <?php if($taskItem['status']==2): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/task/<?php echo $taskItem['id']; ?>">
                                            <?php echo $taskItem['title']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <?php endif;?> 
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
            <div class="col-sm-9 padding-right">
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>