<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $name
 * @property string $position
 * @property string $mobile
 * @property string $email
 * @property string $summary
 * @property string $pic
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobile'], 'string', 'max' => 20],
            [['position', 'email'], 'string', 'max' => 100],
            ['pic', 'string', 'max' => 255],
        	['summary', 'string', 'max' => 500],
        	['email', 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'position' => '职位',
            'mobile' => '电话',
            'email' => '邮箱',
            'summary' => '简介',
            'pic' => '照片',
        ];
    }

    /**
     * @inheritdoc
     * @return MemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MemberQuery(get_called_class());
    }
}
