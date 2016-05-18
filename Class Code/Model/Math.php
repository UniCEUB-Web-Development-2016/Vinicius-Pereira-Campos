<?php
/**
 * Created by PhpStorm.
 * User: Vinícius Campos
 * Date: 29/02/2016
 * Time: 19:55
 */
class Math
{
    private $pi = 3.14159261;
    public function fibonacci($position)
    {
        if ($position == 0) {
            return 0;
        }
        if ($position == 1) {
            return 1;
        }
        return fibonacci($position - 1) + fibonacci($position - 2);
    }
    function circleArea($radius){
        return $this->pi * ($radius * $radius);
    }
    function listCircleArea($radius){
        $areas = array();
        foreach($radius as $r){
            array_push($areas,circleArea($r));
        }
        return $areas;
    }
    function getHipotenusa($catetoopst, $catetoadj){
        return sqrt((@$catetoadj * $catetoadj) + ($catetoopst * $catetoopst));
    }
}