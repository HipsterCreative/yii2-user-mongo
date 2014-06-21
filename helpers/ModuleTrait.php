<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace hipstercreative\user\helpers;

/**
 * @property \hipstercreative\user\Module $module
 */
trait ModuleTrait
{
    /**
     * @var null|\hipstercreative\user\Module
     */
    private $_module;

    /**
     * @return null|\hipstercreative\user\Module
     */
    protected function getModule()
    {
        if ($this->_module == null) {
            $this->_module = \Yii::$app->getModule('user');
        }

        return $this->_module;
    }
}