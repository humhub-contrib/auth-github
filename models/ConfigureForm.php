<?php

namespace humhubContrib\auth\github\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use humhubContrib\auth\github\Module;

/**
 * The module configuration model
 */
class ConfigureForm extends Model
{
    /**
     * @var bool Enable this authclient
     */
    public $enabled;

    /**
     * @var string the client id provided by GitHub
     */
    public $clientId;

    /**
     * @var string the client secret provided by GitHub
     */
    public $clientSecret;

    /**
     * @var string readonly
     */
    public $redirectUri;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientId', 'clientSecret'], 'required'],
            [['enabled'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enabled' => Yii::t('AuthGithubModule.base', 'Enabled'),
            'clientId' => Yii::t('AuthGithubModule.base', 'Client ID'),
            'clientSecret' => Yii::t('AuthGithubModule.base', 'Client secret'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Loads the current module settings
     */
    public function loadSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-github');

        $settings = $module->settings;

        $this->enabled = (bool)$settings->get('enabled');
        $this->clientId = $settings->get('clientId');
        $this->clientSecret = $settings->get('clientSecret');

        $this->redirectUri = Url::to(['/user/auth/external', 'authclient' => 'github'], true);
    }

    /**
     * Saves module settings
     */
    public function saveSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-github');

        $module->settings->set('enabled', (bool)$this->enabled);
        $module->settings->set('clientId', $this->clientId);
        $module->settings->set('clientSecret', $this->clientSecret);

        return true;
    }

    /**
     * Returns a loaded instance of this configuration model
     */
    public static function getInstance()
    {
        $config = new static();
        $config->loadSettings();

        return $config;
    }

}
