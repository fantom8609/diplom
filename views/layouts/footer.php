

<footer id="footer" class="page-footer"><!--Footer-->

</footer><!--/Footer-->



<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
$(document).ready (function () {
var pathes = window.location.pathname + window.location.search;
$.each($('.mainmenu ul li a'), function (){
if($(this).attr('href') == pathes) $(this).addClass('active');
})
});
</script>

<script type="text/javascript">
    
    //Онлайн чат 
    
    function show() {
        // выводим сообщения в блок #messages
        $.ajax({
            url: '/show/messages',
          //  timeout: 10000, // время ожидания загрузки сообщений 10 секунд (или 10000 миллисекунд)
            success: function(data) {
                $('#messages').html(data);
            },
            error: function() {
                $('#messages').html("Не удалось загрузить сообщения");
            }
        });
    }
    
    function send() {
        // функция отправки сообщения
        var message = $('#message').val(); // сообщение
        var id = $('#send_message').attr("data-id");
       // console.log(id);
        if(message.length > 0) { // проверка поля "Сообщение"
            $.ajax({
                    url: '/send/'+id,
                    type: 'post',
                    timeout: 10000, // время ожидания отправки сообщения 10 сек.
                    data: {'message': message},
                    success: function (data) {
                        document.getElementById('message').value = ""; // удаляем содержимое поля "Сообщение", если сообщение было успешно отправлено
                        $('#send_message_result').html("");
                    },
                    error: function () {
                        $('#send_message_result').html("Не удалось отправить сообщение");
                    }
                });
            } else if (message.length == 0) {
                $('#send_message_result').html("Введите сообщение!");
            }
        }
 var interval = 1000; // количество миллисекунд для авто-обновления сообщений (1 секунда = 1000 миллисекунд)
    
    show();
    
    setInterval('show()', interval);
</script>


</body>
</html>