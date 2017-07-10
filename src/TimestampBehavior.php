<?php

namespace ivankff\yii2-behaviors;

use ivankff\yii2-helpers\DateTimeHelper;

class TimestampBehavior extends \yii\behaviors\TimestampBehavior {

    protected function getValue($event){
        if ($this->value === null) {
            return (new \DateTime())->format(DateTimeHelper::MYSQL_DATETIME);
        }
        return parent::getValue($event);
    }

}
