<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

// Register custom CSS
$this->registerCss("
   .navbar {
        // padding: 0.5rem 1rem;
        border-radius: 50px;
        background-color: #fff !important;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000; /* Ensures the navbar stays on top */
    }
    .navbar-nav .nav-link {
        color: #333 !important;
        font-weight: 500;
        padding: 0.5rem 1rem !important;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
    }
    .btn {
        border-radius: 20px;
        padding: 0.375rem 1.5rem;
    }
    @media (max-width: 991px) {
        .navbar {
            border-radius: 0;
            margin: 0;
        }
        .navbar-nav {
            padding: 1rem 0;
        }
        .btn {
            margin-bottom: 0.5rem;
        }
    }
");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <div class="">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar navbar-expand-lg navbar-light shadow-sm']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Services', 'url' => ['/site/services']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ]
        ]);
        echo Html::beginTag('div', ['class' => 'navbar-nav']);
        echo Html::a('Login', ['/site/login'], ['class' => 'btn btn-warning me-2']);
        echo Html::a('Signup', ['/site/signup'], ['class' => 'btn btn-primary']);
        echo Html::endTag('div');
        NavBar::end();
        ?>
    </div>
</header>

<main id="" class="flex-shrink-0 container-fluid" role="main">
    <div class="container-fluid">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>