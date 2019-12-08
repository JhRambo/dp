<?php
//6、策略模式
//多种策略按需执行不同的动作

//定义一个接口
interface Love
{
    function sajiao();
}

//定义实现接口的类
class KeAi implements Love
{
    //实现接口的所有方法
    function sajiao(){
        echo '讨厌，不理你了<br/>';
    }
}

class Tiger implements Love
{
    function sajiao(){
        echo '给老娘过来跪舔<br/>';
    }
}

//定义一个类
class GirlType 
{
    protected $xingge;  //声明一个成员属性
    function __construct($xingge)
    {
        $this->xingge = $xingge;    //构造函数实例化成员
    }

    function sajiao(){
        $this->xingge->sajiao();
    }
}

$keAi = new KeAi(); //需要先实例化对象，下面才能正常传值并策略输出
$tiger = new Tiger();
$girl = new GirlType($keAi);
$girl = new GirlType($tiger);
$girl->sajiao();