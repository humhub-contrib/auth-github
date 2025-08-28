<?php

namespace humhubContrib\auth\github;

use humhub\components\Event;
use humhub\modules\user\authclient\Collection;
use humhubContrib\auth\github\authclient\GithubAuth;
use humhubContrib\auth\github\models\ConfigureForm;

class Events
{
    /**
     * @param Event $event
     */
    public static function onAuthClientCollectionInit($event)
    {
        /** @var Collection $authClientCollection */
        $authClientCollection = $event->sender;

        if (!empty(ConfigureForm::getInstance()->enabled)) {
            $authClientCollection->setClient('github', [
                'class' => GithubAuth::class,
                'clientId' => ConfigureForm::getInstance()->clientId,
                'clientSecret' => ConfigureForm::getInstance()->clientSecret,
            ]);
        }
    }

}
