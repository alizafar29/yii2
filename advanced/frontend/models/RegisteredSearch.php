<?php
    namespace frontend\models;

    use Yii;
    use common\models\User;
    use yii\web\UploadedFile;
   
    use frontend\models\Registered;
    use yii\data\ActiveDataProvider;

    class RegisteredSearch extends Registered
    {

        public $name;
        public $Mobile_Number;
        public $Email;
        public $DOB;

        public function rules()
        {
            return [
                // [['name','Mobile_Number','Email','DOB','password'],'required'],
                [['name'], 'string'],
            //     [['Mobile_Number'], 'integer'],
            //    [['Email'], 'email'],
            //    [['DOB'], 'date'],
               [['name','Mobile_Number', 'Email', 'DOB'], 'safe'],
            ];
        }

        public function search($params)
        {
            // create ActiveQuery
            $query = Registered::find();
            $dataProvider = new ActiveDataProvider([
                'pagination' => [
                    'pageSize' => 3,
                ],
            'query' => $query,
            // 'sort' => ['attributes' => ['name', 'Mobile_Number', 'Email', 'DOB']]
            ]);

            // No search? Then return data Provider
            $this->load($params);
            if (!$this->validate()) {
                return $dataProvider;
            }

            // $query->andFilterWhere([

            //     'id' => $this->id,
            //     'name' => $this->name,
            //     // 'Mobile_Number' => $this->Mobile_Number,
            //     // 'Email' => $this->Email,
            //     // 'DOB' => $this->DOB,
            // ]);

            $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'Mobile_Number', $this->Mobile_Number])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'DOB', $this->DOB]);

            return $dataProvider;
        }
        
    }

?>