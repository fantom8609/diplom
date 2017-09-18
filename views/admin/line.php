<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/main_menu_admin.php'; ?>


<table>
<?php foreach($result as $item):?>
    <tr style="border: 1px solid #000;">
        <?php echo $item; ?>
    </tr>
<?php endforeach;?>
</table>










<?php include ROOT . '/views/layouts/footer.php'; ?>