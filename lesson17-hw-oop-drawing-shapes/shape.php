<?php
require ('point.php');

class Shape extends Point {

	protected $points = array();

	public function __construct(){
		parent::__construct();
	}
	public function setPoints ($x, $y){
		$this->points[count($this->points)][] = $x;
		$this->points[(count($this->points))-1][] = $y;
	}	
	public function getPoints (){
		return $this->points;
	}	
	public function getPointOnIndex ($index){
		$members = $this->points[$index];
		for($i=0; $i<(count($members)-1); $i++){

			return $this->points[$index];
		}
	}	
	public function modifyPointOnIndex ($newX, $newY, $i){
		$oldPoints = $this->getPointOnIndex($i);
		$newPoints = [$newX, $newY];
		
		$modifiedPoints = array_replace($oldPoints, $newPoints);
		$this->points[$i] = $modifiedPoints;
		return $modifiedPoints;
		
	}	
	public function deletePointOnIndex($index){
		unset($this->points[$index]);
		return $this->points;
	}
	public function drawAndMoveShape($move=0){
		for($i=0; $i<count($this->points); $i++){
			parent::drawAndMovePoint($this->points[$i][0], $this->points[$i][1], $move);
		}			
	}
	
	public function calcPerimeter(){
		$perimeter=0;
		for($i=0; $i<(count($this->points)-1); $i++){
			$perimeter += sqrt((pow(($this->points[$i+1][0]-$this->points[$i][0]), 2))+(pow(($this->points[$i+1][1]-$this->points[$i][1]), 2)));
		}
		return $perimeter;
	}
}