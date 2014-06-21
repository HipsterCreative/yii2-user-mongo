<?php

use dektrium\user\tests\_pages\UpdatePage;
use dektrium\user\tests\_pages\LoginPage;

$I = new TestGuy($scenario);
$I->wantTo('ensure that user update works');

$loginPage = LoginPage::openBy($I);
$user = $I->getFixture('user')->getModel('user');
$loginPage->login($user->email, 'qwerty');

$page = UpdatePage::openBy($I, ['id' => $user->id]);

$page->update('user', 'updated_user@example.com', 'new_pass');
$I->see('User has been updated');

Yii::$app->user->logout();
LoginPage::openBy($I)->login('updated_user@example.com', 'new_pass');
$I->see('Logout');
