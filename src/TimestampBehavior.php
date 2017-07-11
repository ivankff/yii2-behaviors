<?php

namespace ivankff\yii2Behaviors;

use ivankff\yii2Helpers\DateTimeHelper;

class TimestampBehavior extends \yii\behaviors\TimestampBehavior {

    protected function getValue($event){
        if ($this->value === null) {
            return (new \DateTime())->format(DateTimeHelper::MYSQL_DATETIME);
        }
        return parent::getValue($event);
    }

}
