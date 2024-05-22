<?php

namespace humhubContrib\auth\github\authclient;

use yii\authclient\clients\GitHub;
use yii\web\NotFoundHttpException;

/**
 * GitHub allows authentication via GitHub OAuth.
 */
class GithubAuth extends GitHub
{
    public $scope = 'read:user';

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-github',
            'buttonBackgroundColor' => '#e0492f',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function initUserAttributes()
    {
        $attributes = parent::initUserAttributes();

        if (isset($attributes['name'])) {
            $parts = mb_split(' ', $attributes['name'], 2);
            if (isset($parts[0])) {
                $attributes['firstname'] = $parts[0];
            }
            if (isset($parts[1])) {
                $attributes['lastname'] = $parts[1];
            }
        }
        return $attributes;
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'username' => 'login',
        ];
    }
}
