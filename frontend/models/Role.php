<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $idrole
 * @property string $role_name
 * @property int $status
 *
 * @property RolePrivillage[] $rolePrivillages
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name', 'status'], 'required'],
            [['status'], 'integer'],
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrole' => 'Idrole',
            'role_name' => 'Role Name',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolePrivillages()
    {
        return $this->hasMany(RolePrivillage::className(), ['idrole' => 'idrole']);
    }
}
