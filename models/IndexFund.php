<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "index_fund".
 *
 * @property integer $id
 * @property integer $fund_id
 * @property string $fund_title
 * @property double $index_fund
 * @property integer $create_time
 */
class IndexFund extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'index_fund';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fund_id', 'index_fund', 'create_time'], 'required'],
            [['fund_id'], 'integer'],
            [['index_fund'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fund_id' => '基金id',
            'index_fund' => '基金指数',
            'create_time' => '创建时间',
        ];
    }
    
    public function beforeSave($insert)
    {
    	$this->create_time = strtotime($this->create_time);
    	return true;
    }
}
