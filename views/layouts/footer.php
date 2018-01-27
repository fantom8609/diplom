

<footer id="footer" class="page-footer"><!--Footer-->
    
    <div class="col-sm-3 right-sidebar" style="position:absolute;right: 50px;bottom: 50px;height: 202px;" >

                <div id="messages" style="overflow: auto; height: 150px; width: 307px; background: #C4C4BE;">

                </div>
                <textarea id="message" placeholder="Введите здесь ваше сообщение" onkeypress="if(event.keyCode==13) {send();}">
                    
                </textarea><br><br>

                <input class="btn" style="" type="button" id="send_message" data-id="<?php echo $userId; ?>" onclick="send();" value="Отправить сообщение">
                <br><br>

                <div id="send_message_result"></div>
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

    //подсвечивание цветом пункта активного меню
    $(document).ready (function () {
        var pathes = window.location.pathname + window.location.search;
        $.each($('.mainmenu ul li a'), function (){
            if($(this).attr('href') == pathes) $(this).addClass('active');
        });

        $(".complete-status").click(function () {
            var id = $(this).attr("data-id");
            $.post("/task/"+id+"/complete", {}, function (data) {
                $("#status-task").html(data);
            });
            return false;
        });

    });


    document.getElementById('feedback-form').addEventListener('submit', function(evt){
      var http = new XMLHttpRequest(), f = this;
      evt.preventDefault();
      http.open("POST", "/task/"+id+"/complete", true);
      http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
          alert(http.responseText);
      }
  }
  http.onerror = function() {
    alert('Извините, данные не были переданы');
}
http.send(new FormData(f));
}, false);

</script>




<script type="text/javascript">
    
    //Онлайн чат 
    function topscroll() {
            var block = document.getElementById("messages");
            block.scrollTop = block.scrollHeight;
        }
        
    function show() {
        // выводим сообщения в блок #messages
        
        $.ajax({
            url: '/show/messages',
          //  timeout: 10000, // время ожидания загрузки сообщений 10 секунд (или 10000 миллисекунд)
            success: function(data) {
                //вывод
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
                        setTimeout('topscroll()',interval);
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
    topscroll();
    
    setTimeout('topscroll()',interval); //выполнить код 1раз через интервал
    setInterval('show()', interval); //выполнить код интервал раз
    
</script>
</body>
</html>