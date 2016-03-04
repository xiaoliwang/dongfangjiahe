<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property string $link
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 50],
            [['pic', 'link'], 'string', 'max' => 255],
        	[['link'], 'url', 'defaultScheme' => 'http'],
        	[['title', 'pic', 'type'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'pic' => '图标',
            'link' => '链接',
        ];
    }
}
