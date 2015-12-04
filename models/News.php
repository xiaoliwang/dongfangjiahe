<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $auth
 * @property string $from
 * @property integer $date
 * @property string $content
 * @property integer $type
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'type'], 'integer'],
            [['content'], 'string'],
            [['title', 'auth'], 'string', 'max' => 50],
            [['from'], 'string', 'max' => 100]
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
            'auth' => '作者',
            'from' => '文章来源',
            'date' => '发布日期',
            'content' => '正文',
            'type' => '分类',
        ];
    }
}
