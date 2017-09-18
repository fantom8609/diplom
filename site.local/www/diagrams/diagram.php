<?php
$im=@imagecreate(801,501);
$a=rand(0,255);
$background_color=imagecolorallocate($im,255,255,255);
$text_color=imagecolorallocate($im,0,0,0);
imageRectangle($im, 1, 1, 800, 500, $text_color);
imageLine($im,1,250,800,250,$text_color);
$file = file("123.txt");
$count_y=count($file);
$z=$count_y*2-1;
$dlina=800/$z;
$x=0;
$q=0;
	foreach ($file as $data) {
		$y = explode("y=", $data);
$z=abs($y[1]);	
if($z>$q) $q=$z;
$w=220 / $q;
}
	foreach ($file as $data)
	{
		$y = explode("y=", $data);
	    $R = rand(0, 255);
	    $G = rand(0, 255);
	    $B = rand(0, 255);
		$c=strlen($y[1]);
	    $C = ImageColorAllocate($im, $R, $G, $B);
		$b=abs($C);
		imagefilledRectangle($im,$x,250,$x+$dlina,250+$y[1]*(-1)*$w,$C);
		if($y[1]>0) imagestring($im,5,$x+$dlina / 2-($c*2.5),250+$y[1]*(-1)*$w-20,trim($y[1]),$text_color);
		if($y[1]<0) imagestring($im,5,$x+$dlina / 2-($c*3),250+$y[1]*(-1)*$w,trim($y[1]),$text_color);
		$x=$x+2*$dlina; 
	}
imagepng($im,"diagram.png");
echo '<img src="diagram.png">';
?>
