<?php
    //高内聚，低耦合
    //1、单例模式
    class Dog
    {
        //定义一个静态私有变量用于存放对象
        static private $instance;
        //构造函数用于实例化对象成员属性
        private function __construct()
        {

        }

        //静态函数获取对象
        static function getInstance(){
            if(!self::$instance){   //如果不存在对象，则创建
                $instance = new Dog();
            }else{
                return $instance;
            }
        }


    }

    //普通方式创建对象
    // $dog1 = new Dog();
    // $dog2 = new Dog();

    //单例模式创建对象
    $dog1 = Dog::getInstance();
    $dog2 = Dog::getInstance();

    if($dog1 === $dog2){
        echo '这是同一个对象';
    }else{
        echo '这不是同一个对象';
    }