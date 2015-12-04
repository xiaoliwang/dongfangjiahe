<?php

namespace app\models;

use yii\base\Model;

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
class UploadForm extends Model
{
    public $image;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['image', 'image', 'extensions' => ['png', 'jpg']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'image' => '图片'
        ];
    }
}
