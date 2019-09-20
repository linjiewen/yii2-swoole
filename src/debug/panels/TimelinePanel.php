<?php

namespace haotong\debug\panels;


use yii;

class TimelinePanel extends \yii\debug\panels\TimelinePanel
{
    public function save()
    {
        return [
            'start' => yii::$app->getLog()->yiiBeginAt,
            'end' => microtime(true),
            'memory' => memory_get_peak_usage(),
        ];
    }
}
