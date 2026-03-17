<?php

use humhub\widgets\bootstrap\Button;
use humhub\widgets\bootstrap\Link;
use humhub\widgets\form\ActiveForm;
use humhubContrib\auth\github\models\ConfigureForm;

/* @var $model ConfigureForm */
?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthGithubModule.base', '<strong>GitHub</strong> Sign-In configuration') ?></div>

        <div class="panel-body">
            <p>
                <?= Link::primary(Yii::t('AuthGithubModule.base', 'GitHub Documentation'))
                    ->link('https://docs.github.com/en/developers/apps/creating-an-oauth-app')
                    ->blank()
                    ->right()->sm() ?>
                <?= Yii::t('AuthGithubModule.base', 'Please follow the GitHub instructions to create the required <strong>OAuth client</strong> credentials.'); ?>
                <br/>
            </p>
            <br/>

            <?php $form = ActiveForm::begin(['id' => 'configure-form', 'enableClientValidation' => false, 'enableClientScript' => false]); ?>

            <?= $form->field($model, 'enabled')->checkbox(); ?>

            <br/>
            <?= $form->field($model, 'clientId'); ?>
            <?= $form->field($model, 'clientSecret'); ?>

            <br/>
            <?= $form->field($model, 'redirectUri')->textInput(['readonly' => true]); ?>
            <br/>

            <?= Button::save()->submit() ?>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
