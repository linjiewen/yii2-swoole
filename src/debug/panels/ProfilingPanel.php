<?php

namespace haotong\debug\panels;

use yii;
use yii\log\Logger;

class ProfilingPanel extends \yii\debug\panels\ProfilingPanel
{
    public function save()
    {
        $target = $this->module->logTarget;
        $messages = $target->filterMessages($target->messages, Logger::LEVEL_PROFILE);
        return [
            'memory' => memory_get_peak_usage(),
            'time' => microtime(true) - yii::$app->getLog()->yiiBeginAt,
            'messages' => $messages,
        ];
    }
}
