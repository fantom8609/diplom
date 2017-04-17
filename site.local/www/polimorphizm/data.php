<?php
require_once "classes.php";
//инициализируем массив со всеми публикацими
$publications=array();

//2#

/*$publications[]=new NewsPublication;
$publications[]=new NewsPublication;
$publications[]=new NewsPublication;*/

$con = mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
	echo "Failed to connect MySQL".mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM publication");
while($row = mysqli_fetch_array($result)) {
	//echo "<br>".$row['type'];
	$publications[] = new $row['type']($row);
}

echo "<pre>";
print_r($publications);















//1#

//создаем экземпляры классов
/*$news1 = new NewsPublication;
$news2 = new NewsPublication;
$news3 = new NewsPublication;
$article1 = new ArticlePublication;
$article2 = new ArticlePublication;
$photo1 = new PhotoReportPublication;
$photo2 = new PhotoReportPublication;
$photo3 = new PhotoReportPublication;*/

//запишем некоторые оюъекты в массив $publications
//$publications = array($news1, $news2, $article1, $photo1);
/*echo "<pre>";
print_r($publications);*/


?>