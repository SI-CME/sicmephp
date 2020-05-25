<?php

use app\models\Material;
use app\models\RequisicaoMaterial;
use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use app\models\Unidade;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Requisicao */
/* @var $form yii\widgets\ActiveForm */

$unidades = Unidade::find()->all();
$listUnidades = ArrayHelper::map($unidades, 'id', 'descricao');

?>

<div class="requisicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->widget(DateTimePicker::className(), [
            'language' => 'pt-BR',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy hh:ii'
            ]
        ]) ?>

    <?= $form->field($model, 'unidadeid')->widget(Select2::className(), ['data' => $listUnidades]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>