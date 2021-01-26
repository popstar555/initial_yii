<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient\widgets\AuthChoice;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>
                                <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column-centered">


<?= Html::submitButton('Login', ['class' => 'btn-as btn-primary', 'name' => 'login-button']) ?>
</div>
</div>
<br>
<div class="text-center"><h3>Or Login with</h3></div>
<hr> </hr> 

             
                <div class="row">
                <div class="col-lg-6">
                                    <?php
                                    $authAuthChoice = AuthChoice::begin([
                                        'baseAuthUrl' => ['site/loginGoogle']
                                    ]);
                                    foreach ($authAuthChoice->getClients() as $client) {
                                        if($client->getName() == 'google') {
                                            echo $authAuthChoice->clientLink($client,'<i class="fa fa-fw fa-facebook"></i> GOOGLE',['class'=>'btn-as googleplus']);
                                        }
                                    }
                                    AuthChoice::end();
                                    ?>
                                </div>
    
                        <div class="col-lg-6">
                                  <?php
                                $authAuthChoice = AuthChoice::begin([
                                      'baseAuthUrl' => ['site/loginfb']
                                ]);
                                foreach ($authAuthChoice->getClients() as $client) {
                                    if($client->getName() == 'facebook') {
                                        echo $authAuthChoice->clientLink($client,'<i class="fa fa-fw fa-facebook"></i> FACEBOOK',['class'=>'btn-as facebook']);
                                    }
                                }
                                AuthChoice::end();
                                ?>
                              </div>
                       </div>
                       <br>
                       <div class="row">
                        <div class="col-lg-6">
                                    <?php
                                    $authAuthChoice = AuthChoice::begin([
                                        'baseAuthUrl' => ['site/loginLinkedIn']
                                    ]);
                                    foreach ($authAuthChoice->getClients() as $client) {
                                        if($client->getName() == 'linkedin') {
                                            echo $authAuthChoice->clientLink($client,'linkedin',['class'=>'btn-as linkedin']);
                                        }
                                    }
                                    AuthChoice::end();
                                    ?>
                            </div>
                        <div class="col-lg-6">
                           <?php
                                    $authAuthChoice = AuthChoice::begin([
                                        'baseAuthUrl' => ['site/loginTwitter'],
                                    ]);
                                    foreach ($authAuthChoice->getClients() as $client) {
                                        if ($client->getName() == 'twitter') {
                                            echo $authAuthChoice->clientLink($client, 'twitter', ['class' => 'btn-as twitter']);
                                        }
                                    }
                                    AuthChoice::end();
                                    ?>
                        </div>

                       </div>
                       <br>
                       <div class="row">
                        <div class="col-lg-6">
                          <?php
                                    $authAuthChoice = AuthChoice::begin([
                                        'baseAuthUrl' => ['site/loginInstagram'],
                                    ]);
                                    foreach ($authAuthChoice->getClients() as $client) {
                                        if ($client->getName() == 'instagram') {
                                            echo $authAuthChoice->clientLink($client, 'instagram', ['class' => 'btn-as instagram']);
                                        }
                                    }
                                    AuthChoice::end();
                                    ?>
                        </div>
                       </div>

                            


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
