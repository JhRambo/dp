<?php
    //3、工厂方法模式  ====> 工厂方法模式与工厂模式
    //最大的区别是，工厂类只提供一个接口，具体实例化的方式交个实现这个工厂接口的子类去实现
    interface Skill{
        function family();
        function buy();
    }

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

    //这里只创建工厂接口，具体创建对象的方式交给实现这个接口的子类去实现=====>这里是定义一个接口
    interface Factory{
        static function createInstance();
    }

    //继承工厂接口的类用于实例化对象
    class FactoryFunc implements Factory{
        static function createInstance($type=null)
        {
            switch($type){
                case 'person':
                    return new Person();
                    break;
                case 'jingling':
                    return new Jingling();
            }    
        }
    }

    $person = FactoryFunc::createInstance('person');
    $person->family();
    $person->buy();

    $jingling = FactoryFunc::createInstance('jingling');
    $jingling->family();
    $jingling->buy();

