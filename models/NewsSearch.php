<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;

/**
 * NewsSearch represents the model behind the search form about `app\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['title', 'auth', 'date', 'from', 'content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
        ]);
		
        if ($this->date) {
        	$date = \DateTime::createFromFormat('Y-m-d', $this->date);
        	$date->setTime(0,0,0);
        	$unixDateStart = $date->getTimeStamp();
        	$date->add(new \DateInterval('P1D'));
        	$date->sub(new \DateInterval('PT1S'));
        	$unixDateEnd = $date->getTimeStamp();
        	$query->andFilterWhere(['between', 'date', $unixDateStart, $unixDateEnd]);
        }
        
        
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'auth', $this->auth])
            ->andFilterWhere(['like', 'from', $this->from])
            //->andFilterWhere(['between', 'date', $this->start_date, $this->end_date])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
