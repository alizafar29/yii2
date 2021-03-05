<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => 'Shopify',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    // ['label' => 'About', 'url' => ['/site/about']],
    // ['label' => 'Contact', 'url' => ['/site/contact']],
    // ['label' => 'QuestionAnswer', 'url' => ['/custom/question-answer']],
    // ['label' => 'Find Product', 'url' => ['/product-search/find-product']],
    ['label' => 'Registration', 'url' => ['/registration/registration']],
    // ['label' => 'Show Records', 'url' => ['/info/show-data']],
    ['label' => 'Show Records', 'url' => ['/registration/confirmation']],
    ['label' => 'Custom Login', 'url' => ['/custom-login/login-form']],
    // ['label' => 'Cache', 'url' => ['/cache/cache-data']],
    ['label' => 'cURL', 'url' => ['/cache/curl-form']],
        ['label' => 'CSV', 'url' => ['/csv/import']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();

?>