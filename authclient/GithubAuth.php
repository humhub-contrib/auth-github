<?php

namespace humhubContrib\auth\github\authclient;

use yii\authclient\clients\GitHub;

/**
 * GitHub allows authentication via GitHub OAuth.
 */
class GithubAuth extends GitHub
{
    public $scope = 'user:email';

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

        $name = trim((string)preg_replace('/\s+/u', ' ', (string)($attributes['name'] ?? '')));
        if ($name !== '') {
            $parts = explode(' ', $name, 2);
            $attributes['firstname'] = $parts[0];
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
