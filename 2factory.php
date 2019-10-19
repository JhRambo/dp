<?php
    //2、工厂模式
    //定义一个接口
    interface Skill{
        function family();
        function buy();
    }

    //类实现接口，必须实现接口中的所有方法
    class Person implements Skill{
        function family()
        {
            echo '人族在辛辛苦苦的伐木<br/>';
        }
        function buy()
        {
            echo '人族使用人民币买房子<br/>';
        }
    }

    class Jingling implements Skill{
        function family()
        {
            echo '精灵族在伐木<br/>';
        }
        function buy()
        {
            echo '精灵族使用精灵币<br/>';
        }
    }

    //创建工厂类用于创建对象=====>这里是定义一个类
    class Factory{
        //静态方法创建对象
        static function createInstance($type){
            switch($type){
                case 'person':
                    return new Person();
                    break;
                case 'jingling':
                    return new Jingling();
                    break;
            }
        }   
    }

    $person = Factory::createInstance('person');
    $person->family();
    $person->buy();

    $jingling = Factory::createInstance('jingling');
    $jingling->family();
    $jingling->buy();


