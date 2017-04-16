<?php
class Man {
	public $rost;
	public $ves;
	public $color_head;

	public function getPoints($rost,$ves) {
		$point=$this->rost * $this->ves - 100;
		return $point;
	}
  public function __construct($rost,$ves,$color_head) {
  	$this->rost=$rost;
  	$this->ves=$ves;
  	$this->color_head=$color_head;
  	echo "new object of class ".__CLASS__." created<br>";
  }
   public function __destruct() {
  	echo "new object of class ".__CLASS__." deleted<br>";
  }

}
/*
$denis = new Man;
$denis->rost=180;
$denis->ves=68;
$denis->color_head="green";
echo $denis->getPoints(180,68);
echo '<pre>';
print_r($denis);*/
$denis = new Man(180,68,"green");
echo $denis->getPoints(180,68);


?>