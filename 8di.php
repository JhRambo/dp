<?php
/*
 * @Author: your name
 * @Date: 2021-04-02 16:44:03
 * @LastEditTime: 2021-04-02 16:54:40
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /dp/8di.php
 */

//8.依赖注入

// class Luntai
// {
//     function roll()
//     {
//         echo '轮胎在滚动' . PHP_EOL;
//     }
// }

// class BMW
// {
//     protected $luntai;  //声明一个成员属性，用来依赖注入

//     //构造函数用于实例化成员属性
//     function __construct($luntai)
//     {
//         $this->luntai = $luntai;
//     }

//     function run()
//     {
//         //$luntai = new Luntai(); //1.一般场景，类里面new另一个类，耦合度高
//         $this->luntai->roll();
//         echo '开着宝马吃烤串' . PHP_EOL;
//     }
// }

// //1、一般情况下使用的方式，耦合度高，不推荐使用
// // $bmw = new BMW();
// // $bmw->run();

// //2、这里用依赖注入的方式实现
// $luntai = new Luntai();
// $bmw = new BMW($luntai);    //对象传值
// $bmw->run();






















//定义轮胎类
class LunTai 
{
    //定义轮胎滚动的方法
    public function roll()
    {
        return '轮胎在滚动';
    }
}

//定义一个具体车辆的类
class BMW 
{
    protected $sx;
    public function __construct($class = '')
    {
        $this->sx = $class;
    }
    //定义一个具体运行的方法 
    public function run()
    {
        echo $this->sx->roll();
        return '开着宝马吃烤串';
    } 
}

$cc = new BMW(new LunTai());
echo $cc->run();