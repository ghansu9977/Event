<?php
use yii\helpers\Html;
?>

<style>
    .event-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 50px;
        background-color: #ffffff;
        overflow: hidden;
        position: relative;
        margin-top: 60px;
    }

    .event-info {
        max-width: 50%;
        z-index: 1;
    }

    .event-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .event-subtitle {
        font-size: 1.5rem;
        color: #666;
        margin-bottom: 20px;
    }

    .discover-more {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .discover-more:hover {
        background-color: #0056b3;
    }

    .event-image {
        max-width: 50%;
        height: auto;
        z-index: 1;
    }

    .shape {
        position: absolute;
        opacity: 0.5;
    }

    .circle {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #007bff;
        top: 10%;
        left: 45%;
    }

    .triangle {
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-bottom: 25px solid #ffc107;
        bottom: 10%;
        right: 10%;
    }

    @media (max-width: 768px) {
        .event-container {
            flex-direction: column;
            text-align: center;
        }

        .event-info, .event-image {
            max-width: 100%;
        }

        .event-image {
            order: -1;
            margin-bottom: 20px;
        }

        .event-title {
            font-size: 2rem;
        }

        .event-subtitle {
            font-size: 1.2rem;
        }

        .circle {
            top: 5%;
            left: 10%;
        }

        .triangle {
            bottom: 5%;
            right: 5%;
        }
    }
</style>

<div class="event-container">
    <div class="event-info">
        <h1 class="event-title">World Wide Event & Digital Conference</h1>
        <p class="event-subtitle">Join us for an immersive digital experience</p>
        <?= Html::a('Get Start →', ['site/discover'], ['class' => 'discover-more']) ?>
    </div>
    <?= Html::img('@web/images/eve.jpeg', ['class' => 'event-image', 'alt' => 'Woman with laptop']) ?>
    <div class="shape circle"></div>
    <div class="shape triangle"></div>
</div>