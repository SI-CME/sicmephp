<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = 'Atualizar Material: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Materiais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app','Update');
?>
<div class="material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
