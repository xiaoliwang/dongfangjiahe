<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "front_page".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $pic
 * @property integer $used
 */
class FrontPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'front_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['used'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['link', 'pic'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'link' => 'Link',
            'pic' => 'Pic',
            'used' => 'Used',
        ];
    }
}
