<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contact Us';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">Services</h1>
                <h2 class="text-primary mb-4">Events Page</h2>
                <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisi vel consectetur interdum, nisl nunc egestas nunc.</p>
                <?= Html::a('Read More', ['site/about'], ['class' => 'btn btn-warning btn-lg']) ?>
            </div>
            <div class="col-lg-6">
                <div class="contact-image">
                    <?= Html::img('@web/images/e.jpg', ['alt' => 'Contact Illustration', 'class' => 'img-fluid']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.site-contact {
    padding: 5rem 0;
    background-color: #ffffff;
}

.contact-image {
    position: relative;
}

.contact-image::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    background-color: #e9ecef;
    z-index: -1;
    border-radius: 20px;
}

@media (max-width: 991px) {
    .site-contact {
        padding: 3rem 0;
    }
    
    .contact-image {
        margin-top: 2rem;
    }
}

.text-primary {
    color: #00bcd4 !important;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-warning:hover {
    background-color: #ffca2c;
    border-color: #ffc720;
}
</style>