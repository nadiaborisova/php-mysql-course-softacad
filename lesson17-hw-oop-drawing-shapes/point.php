<?php
class Point {

	protected $canvas;
	protected $background;
	protected $shape_color;

	public function __construct(){
		$this->canvas = imagecreate(200,200);
		$this->background = imagecolorallocate($this->canvas, 170, 170, 170);
		$this->shape_color = imagecolorallocate($this->canvas,50, 50, 50);
	}
	public function drawAndMovePoint($x, $y, $move=0){
		imagesetpixel ($this->canvas, $x+$move, $y+$move, $this->shape_color);
	}
	public function displayImage(){
		header("Content-type: image/png");
		imagepng($this->canvas);
	}
	
	public function destroyImage (){
		imagecolordeallocate($this->canvas);
		imagecolordeallocate($this->background);
		imagedestroy($this->shape_color);
	}
}

?>
