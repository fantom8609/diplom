

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



</body>
</html>