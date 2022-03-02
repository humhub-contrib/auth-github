<?php

namespace humhubContrib\auth\github\authclient;

use yii\authclient\clients\GitHub;
use yii\web\NotFoundHttpException;

/**
 * GitHub allows authentication via GitHub OAuth.
 */
class GithubAuth extends GitHub
{

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
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'username' => 'login',
            'firstname' => function ($attributes) {
                if (!isset($attributes['name'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['name'], 2);
                if (isset($parts[0])) {
                    return $parts[0];
                }
                return '';
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['name'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['name'], 2);
                if (isset($parts[1])) {
                    return $parts[1];
                }
                return '';
            },
            'email' => function ($attributes) {
                if (empty($attributes['email'])) {
                    throw new NotFoundHttpException(Yii::t('AuthGithubModule.base', 'Please add a valid email address to your GitHub account to be able to proceed.'));
                }
                return $attributes['email'];
            },
        ];
    }
}
