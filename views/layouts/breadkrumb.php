



<?php if($_SERVER['REQUEST_URI'] != '/admin/index.php'): ?>
<a href="/admin/index.php">Список сотрудников  /</a>
<?php endif; ?>

<?php if($_SERVER['REQUEST_URI'] == "/admin/tasks/".$user_id): ?>
<span class="remove_bread"> Cписок задач пользователя <?php echo $user['name']." ".$user['surname'];?> </span>
<?php endif; ?>

<?php if ($_SERVER['REQUEST_URI'] == "/admin/task/".$task["id"] ): ?>
    
    <a href="/admin/tasks/<?php echo $user_id; ?>"> Список задач пользователя <?php echo $user['name']." ".$user['surname'];?>  /</a>
    <span class="remove_bread"><?php echo $task['title']; ?>  </span>
<?php endif; ?>





