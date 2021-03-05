<?php
    namespace frontend\modules\assign\models;

    use Yii;
    use common\models\User;
    use yii\web\UploadedFile;
   
    use frontend\modules\assign\models\Variants;
    use yii\data\ActiveDataProvider;

    class CustomSearch extends Variants
    {
        public $id;
        public $product_id;
        public $title;
        public $variant_id;
        public $price;
        public $inventory;
        public $from;
        public $to;

        public function rules()
        {
            return [
                [['id'], 'integer'],
                [['product_id'], 'integer'],
               [['title'], 'string'],
               [['variant_id'], 'integer'],
               [['price'], 'integer'],
               [['inventory'], 'integer'],
               [['product_id', 'variant_id', 'title', 'inventory', 'from', 'to'], 'safe'],
            ];
        }


        public function search($params)
        {
            // create ActiveQuery
            $query = Variants::find()->joinWith('products');

            $dataProvider = new ActiveDataProvider([
                'pagination' => [
                    'pageSize' => 2,
                ],
            'query' => $query,
            ]);

            // No search? Then return data Provider
            $this->load($params);
            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([

                'variants.id' => $this->id,
                // 'name' => $this->name,
                // 'Mobile_Number' => $this->Mobile_Number,
                // 'Email' => $this->Email,
                // 'DOB' => $this->DOB,
            ])

            ->andFilterWhere(['like', 'variants.product_id', $this->product_id])
            ->andFilterWhere(['like', 'products.title', $this->title])
            ->andFilterWhere(['like', 'variants.variant_id', $this->variant_id])
            ->andFilterWhere(['between', 'price', $this->from,$this->to])
            ->andFilterWhere(['like', 'inventory', $this->inventory]);
            // if ($this->stats != null && count ($this->stats)>0) {
            //     //this bad practic, but I don't find right way use " IN "
            //         $query->andFilterWhere( "status IN (".implode(',',$this->stats).")" );
            //     }

            // echo $query->createCommand()->getRawSql();
            // die();

            return $dataProvider;
        }
        
    }

?>