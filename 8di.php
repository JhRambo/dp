<?php

//8.依赖注入

class Luntai
{
    function roll()
    {
        echo '轮胎在滚动<br />';
    }
}

class BMW
{
    protected $luntai;  //声明一个成员属性，用来依赖注入
    
    //构造函数用于实例化成员属性
    function __construct($luntai)
    {
        $this->luntai = $luntai;
    }
    
    function run()
    {
        //$luntai = new Luntai(); //1.一般场景，类里面new另一个类，耦合度高
        $this->luntai->roll();
        echo '开着宝马吃烤串<br />';
    }
}

//1、一般情况下使用的方式，耦合度高，不推荐使用
// $bmw = new BMW();
// $bmw->run();

//2、这里用依赖注入的方式实现
$luntai = new Luntai();
$bmw = new BMW($luntai);    //对象传值
$bmw ->run();

