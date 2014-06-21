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
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class Profile extends ActiveRecord
{
    use ModuleTrait;




    /**
     * @inheritdoc
     */
    public static function collectionName() {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function attributes() {
        return [
            '_id',
            'user_id',
            'name',
            'public_email',
            'gravatar_email',
            'gravatar_id',
            'location',
            'website',
            'bio',
        ];
    }
    














    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bio'], 'string'],
            [['public_email', 'gravatar_email'], 'email'],
            ['website', 'url'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => \Yii::t('user', 'Name'),
            'public_email' => \Yii::t('user', 'Email (public)'),
            'gravatar_email' => \Yii::t('user', 'Gravatar email'),
            'location' => \Yii::t('user', 'Location'),
            'website' => \Yii::t('user', 'Website'),
            'bio' => \Yii::t('user', 'Bio'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isAttributeChanged('gravatar_email')) {
                $this->setAttribute('gravatar_id', md5($this->getAttribute('gravatar_email')));
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\mongodb\ActiveQueryInterface
     */
    public function getUser()
    {
        return $this->hasOne('\hipstercreative\user\models\User', ['_id' => 'user_id']);
    }
}
