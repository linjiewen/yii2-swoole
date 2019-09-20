<?php

namespace haotong\debug;


use yii;
use yii\helpers\Url;

class Module extends \yii\debug\Module
{
    public function init()
    {
        parent::init();
        $this->setViewPath('@vendor/yiisoft/yii2-debug/views');
    }

    public function setDebugHeaders($event)
    {
        if (!$this->checkAccess()) {
            return;
        }
        $url = Url::toRoute(['/' . $this->id . '/default/view',
            'tag' => $this->logTarget->tag,
        ]);
        $event->sender->getHeaders()
            ->set('X-Debug-Tag', $this->logTarget->tag)
            ->set('X-Debug-Duration', number_format((microtime(true) - yii::$app->getLog()->yiiBeginAt) * 1000 + 1))
            ->set('X-Debug-Link', $url);
    }
}
