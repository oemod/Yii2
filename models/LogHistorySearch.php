<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LogHistory;

/**
 * LogHistorySearch represents the model behind the search form about `app\models\LogHistory`.
 */
class LogHistorySearch extends LogHistory {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_log'], 'integer'],
            [['created_at', 'id_user', 'page_accessed', 'page_url', 'action', 'ip_address'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = LogHistory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id_log' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('user');
        $query->andFilterWhere([
            'id_log' => $this->id_log,
            'created_at' => $this->created_at,
                //'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'page_accessed', $this->page_accessed])
                ->andFilterWhere(['like', 'page_url', $this->page_url])
                ->andFilterWhere(['like', 'action', $this->action])
                ->andFilterWhere(['like', 'ip_address', $this->ip_address]);
        $query->andFilterWhere(['like', 'user.username', $this->id_user]);

        return $dataProvider;
    }

}
