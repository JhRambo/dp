<?php
    //4、观察者模式
    //一个类用于观察另一个类的行为
    class Man{
        protected $observers = [];  //类的成员属性

        //类的成员方法
        function addObservers($observer){
            $this->observers[] = $observer;
            return $this->observers;
        }

        //执行购买的动作
        function buy(){
            foreach($this->observers as $girl){
                echo $girl->dongjie().'<br/>';
            }
        }

        //执行删除动作
        function delObservers($observer){
            $key = array_search($observer,$this->observers);
            if($key){
                unset($this->observers[$key]);
            }
            $this->observers = array_values($this->observers);  //重新索引
        }
    }

    //定义另一个类用于观察
    class Girls{
        function dongjie(){
            echo '你的男朋友正在消费，马上冻结他的银行卡';
        }
    }


    $xiaoming = new Man();
    $xiaohua = new Girls();
    $xiaoli = new Girls();
    $xiaoming->addObservers($xiaohua);
    print_r($xiaoming->addObservers($xiaoli));

    // $xiaoming->delObservers($xiaohua);

    $xiaoming->buy();