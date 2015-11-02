<?php
require ('point.php');

class Triangle extends Point {	
	protected $x1;
	protected $x2;
	protected $y1;
	protected $y2;
	protected $x3;
	protected $y3;
	protected $distanceX1Y1toX2Y2;
	protected $distanceX1Y1toX3Y3;
	protected $distanceX2Y2toX3Y3;
	protected $area;

	public function __construct(){
		parent::__construct();
	}
	public function setX1 ($x1){
		$this->x1 = $x1;
	}	
	public function getX1 (){
		return $this->x1;
	}
	public function setY1 ($y1){
		$this->y1 = $y1;
	}	
	public function getY1 (){
		return $this->y1;
	}
	public function setX2 ($x2){
		$this->x2 = $x2;
	}	
	public function getX2 (){
		return $this->x2;
	}
	public function setY2 ($y2){
		$this->y2 = $y2;
	}	
	public function getY2 (){
		return $this->y2;
	}
	public function setX3 ($x3){
		$this->x3 = $x3;
	}	
	public function getX3 (){
		return $this->x3;
	}
	public function setY3 ($y3){
		$this->y3 = $y3;
	}	
	public function getY3 (){
		return $this->y3;
	}
	public function drawAndMoveTriangle($move=0){
		parent::drawAndMovePoint($this->x1, $this->y1, $move);
		parent::drawAndMovePoint($this->x2, $this->y2, $move);
		parent::drawAndMovePoint($this->x3, $this->y3, $move);
	}
	public function calcDistanceX1Y1toX2Y2(){
		$this->distanceX1Y1toX2Y2 = sqrt((pow(($this->x2-$this->x1), 2))+(pow(($this->y2-$this->y1), 2)));
		return $this->distanceX1Y1toX2Y2;
	}
	public function calcDistanceX1Y1toX3Y3(){
		$this->distanceX1Y1toX3Y3 = sqrt((pow(($this->x3-$this->x1), 2))+(pow(($this->y3-$this->y1), 2)));
		return $this->distanceX1Y1toX3Y3;
	}
	public function calcDistanceX2Y2toX3Y3(){
		$this->distanceX2Y2toX3Y3 = sqrt((pow(($this->x3-$this->x2), 2))+(pow(($this->y3-$this->y2), 2)));
		return $this->distanceX2Y2toX3Y3;
	}
	public function calcArea(){
		$p = ($this->calcDistanceX1Y1toX2Y2() + $this->calcDistanceX1Y1toX3Y3() + $this->calcDistanceX2Y2toX3Y3())/2;
		$this->area = sqrt($p*($p-$this->distanceX1Y1toX2Y2)*($p-$this->distanceX1Y1toX3Y3)*($p-$this->distanceX2Y2toX3Y3));
		return $this->area;
	}
}