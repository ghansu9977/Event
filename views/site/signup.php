<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$model = new app\models\event();
use yii\helpers\Url;


?>



<div style="height: 500px;">


<div class="container" style="margin-top:80px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
">
    <div class="signup-content">
        <div class="signup-form">
            <h2 class="form-title text">Sign up</h2>
            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

            <?= $form->field($model, 'fullname')->textInput(['placeholder' => 'Your Name'])->label(false) ?>
            <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Your Email'])->label(false) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('SignUp', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="signup-image">
            <figure><img src="images/signup-image.jpg" alt="signup image"></figure>
            <a href="<?= Url::to(['/site/login']) ?>" class="signup-image-link">I am Already a member</a>

        </div>
    </div>
</div>
</div>
