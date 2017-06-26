<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TaxDeclaration;

/**
 * TaxDeclarationSearch represents the model behind the search form of `app\models\TaxDeclaration`.
 */
class TaxDeclarationSearch extends TaxDeclaration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['td_no', 'survey_no', 'area', 'effectivity_quarter', 'effectivity_year', 'cancels_assessed_value', 'lot_no', 'blk_no'], 'integer'],
            [['property_owner', 'property_index_no', 'arp_no', 'address', 'tel_no', 'classification', 'actual_use', 'assessment_level', 'tot_assessed_value', 'property_kind', 'location', 'taxability', 'faas', 'cancels_arp_no', 'beneficial_user', 'user_tel_no', 'user_address', 'otc', 'oct', 'date', 'bound_south', 'bound_north', 'bound_east', 'bound_west', 'mun_assessor', 'prov_assessor', 'tax_dec_pdf', 'tax_dec_filename', 'first_name', 'last_name'], 'safe'],
            [['market_value', 'assessed_value', 'php', 'total_php'], 'number'],
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
        $query = TaxDeclaration::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'td_no' => $this->td_no,
            'survey_no' => $this->survey_no,
            'area' => $this->area,
            'market_value' => $this->market_value,
            'assessed_value' => $this->assessed_value,
            'php' => $this->php,
            'total_php' => $this->total_php,
            'effectivity_quarter' => $this->effectivity_quarter,
            'effectivity_year' => $this->effectivity_year,
            'cancels_assessed_value' => $this->cancels_assessed_value,
            'lot_no' => $this->lot_no,
            'blk_no' => $this->blk_no,
        ]);

        $query->andFilterWhere(['ilike', 'property_owner', $this->property_owner])
            ->andFilterWhere(['ilike', 'first_name', $this->first_name])
            ->andFilterWhere(['ilike', 'last_name', $this->last_name])               
            ->andFilterWhere(['ilike', 'property_index_no', $this->property_index_no])
            ->andFilterWhere(['ilike', 'arp_no', $this->arp_no])
            ->andFilterWhere(['ilike', 'address', $this->address])
            ->andFilterWhere(['ilike', 'tel_no', $this->tel_no])
            ->andFilterWhere(['ilike', 'classification', $this->classification])
            ->andFilterWhere(['ilike', 'actual_use', $this->actual_use])
            ->andFilterWhere(['ilike', 'assessment_level', $this->assessment_level])
            ->andFilterWhere(['ilike', 'tot_assessed_value', $this->tot_assessed_value])
            ->andFilterWhere(['ilike', 'property_kind', $this->property_kind])
            ->andFilterWhere(['ilike', 'location', $this->location])
            ->andFilterWhere(['ilike', 'taxability', $this->taxability])
            ->andFilterWhere(['ilike', 'faas', $this->faas])
            ->andFilterWhere(['ilike', 'cancels_arp_no', $this->cancels_arp_no])
            ->andFilterWhere(['ilike', 'cancels_owner', $this->cancels_owner])
            ->andFilterWhere(['ilike', 'beneficial_user', $this->beneficial_user])
            ->andFilterWhere(['ilike', 'user_tel_no', $this->user_tel_no])
            ->andFilterWhere(['ilike', 'user_address', $this->user_address])
            ->andFilterWhere(['ilike', 'otc', $this->otc])
            ->andFilterWhere(['ilike', 'oct', $this->oct])
            ->andFilterWhere(['ilike', 'date', $this->date])
            ->andFilterWhere(['ilike', 'bound_south', $this->bound_south])
            ->andFilterWhere(['ilike', 'bound_north', $this->bound_north])
            ->andFilterWhere(['ilike', 'bound_east', $this->bound_east])
            ->andFilterWhere(['ilike', 'bound_west', $this->bound_west])
            ->andFilterWhere(['ilike', 'mun_assessor', $this->mun_assessor])
            ->andFilterWhere(['ilike', 'prov_assessor', $this->prov_assessor])
            ->andFilterWhere(['ilike', 'tax_dec_pdf', $this->tax_dec_pdf])
            ->andFilterWhere(['ilike', 'tax_dec_filename', $this->tax_dec_filename]);

        return $dataProvider;
    }
}
