<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "role_privillage".
 *
 * @property int $idrole
 * @property string $description
 * @property string $menu_name
 * @property int $flag
 * @property int $urutan
 *
 * @property Role $idrole0
 */
class RolePrivillage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role_privillage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idrole', 'description', 'menu_name', 'flag'], 'required'],
            [['idrole', 'flag'], 'integer'],
            [['description', 'menu_name'], 'string', 'max' => 50],
            [['idrole'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['idrole' => 'idrole']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrole' => 'Idrole',
            'description' => 'Description',
            'menu_name' => 'Menu Name',
            'flag' => 'Flag',
            'urutan' => 'Urutan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdrole0()
    {
        return $this->hasOne(Role::className(), ['idrole' => 'idrole']);
    }
}
