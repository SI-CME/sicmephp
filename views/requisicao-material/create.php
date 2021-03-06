<?php

use yii\helpers\Html;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\RequisicaoMaterial */

$this->title = Yii::t('app', 'Create Requisicao Material');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requisicao Materiais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requisicao-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'materiaisDisponiveis'=>$materiaisDisponiveis
    ]) ?>

    <h3>Materiais já cadastrados</h3>
    <?= GridView::widget([
        'dataProvider' => $materiais,
       // 'filterModel' => $searchModel,
        'columns' => [
            'material.nomebadge:html',
            'quantidade',
],
    ]); ?>

</div>
