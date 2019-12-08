<?php
//7、门面模式
//将多个函数封装成一个对外公开

//照相机类
class Camare
{
    function open(){
       echo '打开照相机<br>';
    }

    function off(){
        echo '关闭照相机<br>';
    }
}

//闪光灯类
class Light
{
    function open(){
        echo '打开闪光灯<br>';
     }
 
     function off(){
         echo '关闭闪光灯<br>';
     }
}

class MenMian
{
    function start(){
        $camare = new Camare();
        $light = new Light();
        $camare->open();
        $light->open();
    }

    function end(){
        $camare = new Camare();
        $light = new Light();
        $camare->off();
        $light->off();
    }
}

$menmian = new MenMian();
$menmian ->start();
$menmian ->end();