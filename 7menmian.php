<?php
/*
 * @Author: your name
 * @Date: 2021-04-02 17:02:08
 * @LastEditTime: 2021-04-02 17:02:15
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /dp/7menmian.php
 */
//7、门面模式
//将多个函数封装成一个对外公开的函数

//照相机类
class Camare
{
    function open()
    {
        echo '打开照相机'.PHP_EOL;
    }

    function off()
    {
        echo '关闭照相机'.PHP_EOL;
    }
}

//闪光灯类
class Light
{
    function open()
    {
        echo '打开闪光灯'.PHP_EOL;
    }

    function off()
    {
        echo '关闭闪光灯'.PHP_EOL;
    }
}

class MenMian
{
    function start()
    {
        $camare = new Camare();
        $light = new Light();
        $camare->open();
        $light->open();
    }

    function end()
    {
        $camare = new Camare();
        $light = new Light();
        $camare->off();
        $light->off();
    }
}

$menmian = new MenMian();
$menmian->start();
$menmian->end();
