<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$model = new app\models\LoginForm();

?>


<div class="container" style="margin-top:50px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
">
    <div class="signup-content" style="margin-top:80px;box-shadow:">
        <div class="signup-form">
            <h2 class="form-title text">Sign In</h2>
            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

            <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Your Email'])->label(false) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('SignIn', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="signup-image">
            <figure><img src="<?= Url::to("@web/images/signin-image.jpg") ?>" alt="signup image"></figure>
            <a href="<?= Url::to(['site/signup']) ?>" class="signup-image-link">Create Account</a>
        </div>
    </div>
</div>