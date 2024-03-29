<?php

namespace haotong\swoole;

use yii;

class Util
{
    public static  function dump($var){
        if( is_array($var) || is_object($var) ){
            $body = print_r($var, true);
        }else{
            $body = $var;
        }
        if( isset(yii::$app->getResponse()->swooleResponse) ){
            echo "dump function must called in request period" . PHP_EOL;
        }
        yii::$app->getResponse()->swooleResponse->header("Content-Type", "text/html;charset=utf-8");
        yii::$app->getResponse()->swooleResponse->end($body);
    }
}
