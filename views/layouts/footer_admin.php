    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">

        </div>
    </div>
</footer><!--/Footer-->



<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/motionpack.js"></script>
<script src="/template/js/main.js"></script>

<script>
    $(document).ready(function(){
        //задача выполнена
        $(".change-status-complete").click(function () {
            var id = $(this).attr("data-id");
            $.post("/admin/task/setCompleted/"+id, {}, function (data) {
                $("#status-task").html(data);
            });
            return false;
        });

        //задача провалена
        $(".change-status-failed").click(function () {
            var id = $(this).attr("data-id");
            $.post("/admin/task/setFailed/"+id, {}, function (data) {
                $("#status-task").html(data);
            });
            return false;
        });
           //задача активирована
           $(".change-status-activate").click(function () {
            var id = $(this).attr("data-id");
            $.post("/admin/task/activate/"+id, {}, function (data) {
                $("#status-task").html(data);
            });
            return false;
        });
        //задача удалена
        $(".task-delete").click(function () {
            var id = $(this).attr("data-id");
            $.post("/admin/task/delete/"+id, {}, function (data) {
                $("#deleted-task").html(data);
            });
            return false;
        });
        
           //задача оценена
           $(".marked").click(function () {
            var id = $(this).attr("data-id");
            $.post("/admin/task/mark/"+id, {
                difficultly: $('[name="difficultly"]').val(),
                work_cost: $('[name="work_cost"]').val(),
                coef_working: $('[name="coef_working"]').val()
            }, function (data) {
                $("#marked-result").html(data);
            });
            return false;
        });


           /*$("#files").mouseover(function () {
            $("#files").html("download");
        });*/
});

</script>

</body>
</html>