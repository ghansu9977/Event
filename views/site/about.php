<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'About the Event';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="<?= Html::encode($this->params['meta_description'] ?? 'Learn more about our SBS MTV The Kpop Show event.') ?>">
    <meta name="keywords"
        content="<?= Html::encode($this->params['meta_keywords'] ?? 'Kpop, SBS MTV, Event, About') ?>">
    <link rel="icon" type="image/x-icon" href="<?= Yii::getAlias('@web/favicon.ico') ?>">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerCss("
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }
        .about-section {
            background: white;
            color: #333;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 300 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 5rem;
 
        }
        .about-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .about-text {
            flex: 1;
            padding-right: 1rem;
        }
        .about-image {
            flex: 1;
            text-align: right;
        }
        .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        @media (max-width: 991px) {
            .about-content {
                flex-direction: column;
            }
            .about-image {
                margin-top: 1rem;
                text-align: center;
            }
        }
    ") ?>
</head>

<body>
    <div class="container-fluid">
        <div class="about-section">
            <div class="about-content">
                <div class="about-text">
                    <h2>About Us</h2>
                    <br />
                    <p>An event is a planned occasion or gathering that serves a particular purpose and involves a group
                        of people. Events can vary widely depending on their nature and objectives. Social events, like
                        weddings and birthday parties, bring people together to celebrate personal milestones and
                        relationships. These occasions are often characterized by ceremonies, festivities, and a focus
                        on personal connections.

                    </p>
                   
                    <br />

                    <p>For more details on ticket packages, schedules, and other event information, feel free to <a
                            href="<?= Yii::$app->urlManager->createUrl(['site/contact']) ?>">contact us</a>.</p>
                    <br />

                    <div class="mt-3">
                        <?= Html::a('Get Tickets', ['site/get-ticket'], ['class' => 'btn btn-warning me-2']) ?>
                        <?= Html::a('Learn More', ['site/learn-more'], ['class' => 'btn btn-outline-secondary']) ?>
                    </div>
                </div>
                <div class="about-image">
                    <?= Html::img('@web/images/eve.jpeg', ['alt' => 'K-pop Event']) ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>