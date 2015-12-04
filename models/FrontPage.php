<?php

namespace app\models;


/**
 * This is the model class for table "front_page".
 *
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $link
 * @property string $pic
 * @property integer $used
 */
class FrontPage extends \yii\db\ActiveRecord
{
    public $file;
    
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
            [['title'], 'string', 'max' => 50],
            [['summary', 'link', 'pic'], 'string', 'max' => 255],
        	[['link'], 'url', 'defaultScheme' => 'http'],
        	[['title', 'summary', 'link', 'pic'], 'required']
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
            'summary' => '简介',
            'link' => '链接',
            'pic' => '图片',
            'used' => '是否使用',
        	'file' => '首页banner图'
        ];
    }
}
