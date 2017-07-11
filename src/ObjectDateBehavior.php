<?php

namespace ivankff\yii2Behaviors;

use Yii;
use ivankff\yii2Helpers\DateTimeHelper;

/**
 * Class GlobalAccessBehavior
 * @package common\behaviors
 */
class ObjectDateBehavior extends yii\base\Behavior {


    /**
     * @var array
     * $attributes = [
     *  'DateBeginObj' => 'date_begin',
     *  'DateEndObj' => 'date_end',
     * ];
     */
    public $attributes = [];

    /**
     * @var array
     * $format = [
     *  'DateBeginObj' => DateTimeHelper::MYSQL_DATE,
     * ];
     */
    public $format = [];


    /**
     * Expose [[$attributes]] readable
     * @inheritdoc
     */
    public function canGetProperty($name, $checkVars = true)
    {
        return isset($this->attributes[$name]) || parent::canGetProperty($name, $checkVars);
    }


    /**
     * Make [[$attributes]] readable
     * @inheritdoc
     */
    public function __get($param)
    {
        if (isset($this->attributes[$param])) {
            try {
                $format = isset($this->format[$param]) ? $this->format[$param] : DateTimeHelper::MYSQL_DATETIME;
                $date = \DateTime::createFromFormat($format, $this->owner->{$this->attributes[$param]});
            } catch (\Exception $e) {
                $date = null;
            }
            return $date;
        } else {
            return parent::__get($param);
        }
    }

}
