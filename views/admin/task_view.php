
<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>
<?php include ROOT . '/views/layouts/breadkrumb.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-7">
                            <?php if(!isset($task)): ?>
                                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">вернуться к списку задач</a>
                            <?php endif;?>


                            <div class="product-information" id="deleted-task">

                                <h2><?php echo $task['title']; ?></h2>
                                <p>Комментарий: <?php echo $task['coment']; ?></p>
                                
                                Статус задачи: 
                                <span id="status-task"><?php echo Task::getStatusTask($task['status']); ?></span>
                                <br>
                                <span>Файлы:</span>
                                
                                
                               
                                <ul>
                                    <?php if (!empty($pathes)): ?>
                                    <?php foreach ($pathes as $path): ?>
                                    <li>
                                       <a id="files" target="_blank" href="<?php
                                       $path_name=explode("/htdocs",$path);
                                       print_r ($path_name[1]); ?>" download><?php
                                       $name=explode("upload/",$path); print_r ($name[1]); ?> </a><br>
                                    </li>
                                    <?php endforeach;?>
                                    <?php endif; ?>
                                </ul>
                                    
                                
                                
                         
                                <a href="#" class="btn change-status-complete" data-id="<?php echo $task['id'];?>">Отметить выполнение</a><br>
                                <a href="#" class="btn change-status-failed" data-id="<?php echo $task['id'];?>">Отметить провал</a><br>
                                <a href="#" class="btn change-status-activate" data-id="<?php echo $task['id'];?>">Активировать</a><br>
                                <a href="#" class="btn task-delete" data-id="<?php echo $task['id'];?>">удалить</a>
                                
                           
                    
                                <!-- Оценка -->
                                <div class="event_cont"> 
                                    <div class="event_visible">                
                                        <div class="visible_cont">
                                            <a  title="" href="javascript:;" onmousedown="slidedown('mydiv');slideup('mydiv');">Оценить</a>
                                        </div>
                                    </div>
                                    <div id="mydiv" class="about" style="display:none; overflow:hidden; height:265px;">                   
                                        <!-- Начало блока mydiv-->
                                        
                                            <span>1 показатель </span> <br>
                                            <input type="text" name="difficultly" data-id="<?php echo $task['id'];?>"> <br>
                                            <span>2 показатель </span><br>
                                            <input type="text" name="work_cost" data-id="<?php echo $task['id'];?>"> <br>
                                            <span>3 показатель </span><br>
                                            <input type="text" name="coef_working" data-id="<?php echo $task['id'];?>"> <br><br>
                                            <input type="button" class="marked"  value="сохранить оценки" data-id="<?php echo $task['id'];?>"> 
                                        <!-- Конец блока mydiv -->      
                                    </div>
                                </div>
                            </div> <!--/product-information-->
                            <div id="marked-result"> </div>
                        </div>
                    </div>
                </div> <!--/product-details-->
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer_admin.php'; ?>