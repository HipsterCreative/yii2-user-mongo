<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace hipstercreative\user\models;

use hipstercreative\user\helpers\ModuleTrait;
use yii\mongodb\ActiveRecord;

/**
 * @property integer $id         Id
 * @property integer $user_id    User id, null if account is not bind to user
 * @property string  $provider   Name of service
 * @property string  $client_id  Account id
 * @property string  $properties Account properties returned by social network (json encoded)
 * @property string  $data       Json-decoded properties
 * @property User    $user       User that this account is connected for.
 *
 * @property \hipstercreative\user\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Account extends ActiveRecord
{
    use ModuleTrait;

    /**
     * @var
     */
    private $_data;

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'account';
    }


    /**
     * @inheritdoc
     */
    public function attributes() {
        return [
            '_id',
            'id',
            'user_id',
            'provider',
            'client_id',
            'properties',
            'data',
            'user',
        ];
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->hasOne($this->module->manager->userClass, ['_id' => 'user_id']);
    }

    /**
     * @return bool Whether this social account is connected to user.
     */
    public function getIsConnected()
    {
        return $this->user_id != null;
    }

    /**
     * @return mixed Json decoded properties.
     */
    public function getData()
    {
        if ($this->_data == null) {
            $this->_data = json_decode($this->properties);
        }

        return $this->_data;
    }
}