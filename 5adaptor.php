<?php
//5、适配器模式
//一个类中调用另一个类中已经实现的方法，这样就不用在当前类中重复定义相同的方法
class Wife{
    function cook(){
        echo '我会做满汉全席<br/>';
    }
}

//定义一个接口
interface PerfectMan{
    function writePHP();
    function cook();
}

//定义一个实现接口的类
class Man implements PerfectMan{
    protected $wife;    //声明一个受保护的成员

    function __construct($wife)
    {
        $this->wife = $wife;
    }
    function writePHP()
    {
        echo '我会写PHP<br/>';
    }
    
    function cook()
    {
        $this->wife -> cook();  //这里调用wife类的cook方法
    }
}

$wife = new Wife(); //先实例化wife这个类，下面的man类才能直接调用cook方法
$man = new Man($wife);
$man -> writePHP();
$man -> cook();