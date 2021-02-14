<?php

use humhub\modules\user\authclient\Collection;

return [
    'id' => 'auth-github',
    'class' => 'humhubContrib\auth\github\Module',
    'namespace' => 'humhubContrib\auth\github',
    'events' => [
        [Collection::class, Collection::EVENT_AFTER_CLIENTS_SET, ['humhubContrib\auth\github\Events', 'onAuthClientCollectionInit']]
    ],
];
