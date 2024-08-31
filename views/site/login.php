<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$model = new app\models\LoginForm();
?>

<!-- Include jQuery and SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container" style="margin-top:50px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
    <div class="signup-content" style="margin-top:80px;">
        <div class="signup-form">
            <h2 class="form-title text">Sign In</h2>
            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

            <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Your Email'])->label(false) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('SignIn', ['class' => 'btn btn-primary', 'id' => 'signin-btn']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="signup-image">
            <figure><img src="<?= Url::to("@web/images/signin-image.jpg") ?>" alt="signin image"></figure>
            <a href="<?= Url::to(['site/signup']) ?>" class="signup-image-link">Create Account</a>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#signup-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Login Successful!',
                        text: 'You will be redirected shortly.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = '<?= Url::to(['/site/index']) ?>'; // Redirect to the homepage or dashboard
                    });
                } else {
                    Swal.fire({
                        title: 'Login Failed',
                        text: response.message || 'Please check your credentials and try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while trying to log in.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>
