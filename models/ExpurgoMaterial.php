<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expurgo_material".
 *
 * @property int $expurgo_id
 * @property int $material_id
 * @property int $carga_id
 * @property int $id
 * @property int|null $quantidade
 * @property string $observacao
 *
 * @property Carga $carga
 * @property Expurgo $expurgo
 * @property Material $material
 */
class ExpurgoMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expurgo_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expurgo_id', 'material_id'], 'required'],
            [['expurgo_id', 'material_id', 'carga_id', 'quantidade'], 'default', 'value' => null],
            [['expurgo_id', 'material_id', 'carga_id', 'id', 'quantidade'], 'integer'],
            [['id'], 'unique'],
            [['carga_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carga::class, 'targetAttribute' => ['carga_id' => 'id']],
            [['expurgo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Expurgo::class, 'targetAttribute' => ['expurgo_id' => 'id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::class, 'targetAttribute' => ['material_id' => 'id']],
            [['observacao'], 'string', 'max' => 500], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'expurgo_id' => Yii::t('app', 'Expurgo ID'),
            'material_id' => Yii::t('app', 'Material ID'),
            'carga_id' => Yii::t('app', 'Carga ID'),
            'id' => Yii::t('app', 'ID'),
            'quantidade' => Yii::t('app', 'Quantidade'),
            'observacao' => Yii::t('app', 'Observacao'),
        ];
    }

    /**
     * Gets query for [[Carga]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCarga()
    {
        return $this->hasOne(Carga::class, ['id' => 'carga_id']);
    }

    /**
     * Gets query for [[Expurgo]].
     *
     * @return \yii\db\ActiveQuery|ExpurgoQuery
     */
    public function getExpurgo()
    {
        return $this->hasOne(Expurgo::class, ['id' => 'expurgo_id']);
    }

    /**
     * Gets query for [[Material]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::class, ['id' => 'material_id']);
    }

    /**
     * {@inheritdoc}
     * @return ExpurgoMaterialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExpurgoMaterialQuery(get_called_class());
    }
}
