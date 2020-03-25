<?php
//4、观察者模式
//一个类用于观察另一个类的行为
class Man
{
    protected $observers = [];  //类的成员属性
    //类的成员方法
    function addObservers($observer)
    {
        $this->observers[] = $observer;
        return $this->observers;
    }

    //执行购买的动作
    function buy()
    {
        foreach ($this->observers as $girl) {
            echo $girl->dongjie() . PHP_EOL;
        }
    }

    //执行删除动作
    function delObservers($observer)
    {
        $arrserver = (array)$observer;  //对象转数组
        // $observer = (object)$arrserver; //数组转对象
        foreach ($this->observers as $k=>$v){
            if(array_values((array)$v)[0] == array_values($arrserver)[0]){
                $key = $k;
                break;
            }           
        }
        unset($this->observers[$key]);
    }
}

//定义另一个类用于观察
class Girls
{
    private $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    function dongjie()
    {
        echo $this->name . '，你的男朋友正在消费，马上冻结他的银行卡'.PHP_EOL;
    }
}

$xiaoming = new Man();
$xiaohua = new Girls('xiaohua');
$xiaoli = new Girls('xiaoli');
$xiaoming->addObservers($xiaohua);
$xiaoming->addObservers($xiaoli);

$xiaoming->delObservers($xiaohua);

$xiaoming->buy();
