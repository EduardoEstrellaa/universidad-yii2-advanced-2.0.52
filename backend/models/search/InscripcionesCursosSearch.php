<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\InscripcionesCursos;

/**
 * InscripcionesCursosSearch represents the model behind the search form of `backend\models\InscripcionesCursos`.
 */
class InscripcionesCursosSearch extends InscripcionesCursos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inscripcion_id', 'estudiante_id', 'horario_id'], 'integer'],
            [['calificacion_final'], 'number'],
            [['estado'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = InscripcionesCursos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'inscripcion_id' => $this->inscripcion_id,
            'estudiante_id' => $this->estudiante_id,
            'horario_id' => $this->horario_id,
            'calificacion_final' => $this->calificacion_final,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
