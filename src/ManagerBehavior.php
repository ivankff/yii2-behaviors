<?php

namespace ivankff\yii2Behaviors;

use Yii;
use yii\db\BaseActiveRecord;

class ManagerBehavior extends \yii\behaviors\AttributeBehavior {

    public $managerIdAttribute = 'manager_id';
    public $value;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => $this->managerIdAttribute,
                BaseActiveRecord::EVENT_BEFORE_UPDATE => $this->managerIdAttribute,
            ];
        }
    }

    protected function getValue($event)
    {
        if ($this->value === null) {
            if (!empty(Yii::$app->user->identity)) return Yii::$app->user->identity->id;
            return null;
        }
        return parent::getValue($event);
    }

}
