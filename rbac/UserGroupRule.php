<?php
namespace app\rbac;

use Yii;
use yii\rbac\Rule;

/**
 * Checks if user group matches
 */
class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $group = Yii::$app->user->identity->group;
            return $group;
        }
        return false;
    }
}

// $auth = Yii::$app->authManager;

// $rule = new \app\rbac\UserGroupRule;

// $auth->add($rule);

// $author = $auth->createRole('author');
// $author->ruleName = $rule->name;
// $auth->add($author);
// // ... add permissions as children of $author ...

// $admin = $auth->createRole('admin');
// $admin->ruleName = $rule->name;
// $auth->add($admin);
// $auth->addChild($admin, $author);