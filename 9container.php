<?php
/*
 * @Author: your name
 * @Date: 2021-03-10 17:34:53
 * @LastEditTime: 2021-03-10 17:54:21
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /dp/9container.php
 */

// //方式一：9.容器  结合依赖注入实现
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

// //定义容器类用于存放类
// class Container
// {
//     protected $registers = [];    //声明一个成员属性
//     //声明一个绑定所属类的方法
//     function bind($name, Closure $register)
//     { //闭包函数
//         $this->registers[$name] = $register;
//     }

//     //获取容器中的对象
//     function make($name)
//     {
//         $clo = $this->registers[$name];
//         return $clo();
//     }
// }

// //1、一般情况下使用的方式，耦合度高，不推荐使用
// // $bmw = new BMW();
// // $bmw->run();

// //2、这里用依赖注入的方式实现
// // $luntai = new Luntai();
// // $bmw = new BMW($luntai);    //对象传值
// // $bmw ->run();

// //3、容器方式实现
// $container = new Container();
// $container->bind('luntai', function () {
//     return new Luntai();
// });
// $bmw = new BMW($container->make('luntai'));    //对象传值
// $bmw->run();


//方式二：容器模式
/**
 * 为了约束我们先定义一个消息接口
 * Interface Message
 */
interface  Message
{
    public function send();
}

/**
 * 有一个发送邮件的类
 * Class sendEmail
 */
class SendEmail implements Message
{
    public function send()
    {
        return  'send email';
        // TODO: Implement send() method.
    }
}

/**
 *新增一个发送短信的类
 * Class sendSMS
 */
class SendSMS implements Message
{
    public function send()
    {
        return 'send sms';
        // TODO: Implement send() method.
    }
}

/**
 * 这是一个简单的服务容器
 * Class Container
 */
class Container
{
    protected $binds;
    protected $instances;
    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        array_unshift($parameters, $this);
        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}

//创建一个消息工厂
$message = new  Container();
//将发送短信注册绑定到工厂里面
$message->bind('SMS',function (){
    return new SendSMS();
});
//将发送邮件注册绑定到工厂
$message->bind('EMAIL',function (){
    return new SendEmail();
});
//需要发送短信的时候
$sms = $message->make('SMS');
echo $sms->send();

//传统模式：
/**
 * 定义了一个消息类
 * Class Message 
 */
// class Message
// {
//   public function send()
//   {
//       return 'send email';
//   }
// }

// /**
//  * 订单产生的时候 需要发送消息
//  */
// class Order
// {
//     protected $messager = '';
//     function __construct()
//     {
//         $this->messager = new Message();
//     }

//     public function sendMsg()
//     {
//         return $this->messager->send();
//     }
// }
// $order = new Order();
// echo $order->sendMsg();
