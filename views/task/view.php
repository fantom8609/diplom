<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <h2><?php echo $task['title']; ?></h2>
                                <p>Комментарий: <?php echo $task['coment']; ?></p>
                                <span>
                                    <span>Статус задачи: <?php echo $task['status']; ?></span>
                                </span>
                                
                                <span class="padding-right"><button>Отметить выполнение</button></span>
                            </div><!--/product-information-->
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>