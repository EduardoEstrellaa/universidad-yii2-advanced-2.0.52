<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inscripciones_cursos".
 *
 * @property int $inscripcion_id
 * @property int $estudiante_id
 * @property int $horario_id
 * @property float|null $calificacion_final
 * @property string|null $estado
 */
class InscripcionesCursos extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const ESTADO_EN_CURSO = 'en_curso';
    const ESTADO_APROBADO = 'aprobado';
    const ESTADO_REPROBADO = 'reprobado';
    const ESTADO_RETIRADO = 'retirado';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inscripciones_cursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calificacion_final'], 'default', 'value' => null],
            [['estado'], 'default', 'value' => 'en_curso'],
            [['estudiante_id', 'horario_id'], 'required'],
            [['estudiante_id', 'horario_id'], 'integer'],
            [['calificacion_final'], 'number'],
            [['estado'], 'string'],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inscripcion_id' => 'Inscripcion ID',
            'estudiante_id' => 'Estudiante ID',
            'horario_id' => 'Horario ID',
            'calificacion_final' => 'Calificacion Final',
            'estado' => 'Estado',
        ];
    }


    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_EN_CURSO => 'en_curso',
            self::ESTADO_APROBADO => 'aprobado',
            self::ESTADO_REPROBADO => 'reprobado',
            self::ESTADO_RETIRADO => 'retirado',
        ];
    }

    /**
     * @return string
     */
    public function displayEstado()
    {
        return self::optsEstado()[$this->estado];
    }

    /**
     * @return bool
     */
    public function isEstadoEncurso()
    {
        return $this->estado === self::ESTADO_EN_CURSO;
    }

    public function setEstadoToEncurso()
    {
        $this->estado = self::ESTADO_EN_CURSO;
    }

    /**
     * @return bool
     */
    public function isEstadoAprobado()
    {
        return $this->estado === self::ESTADO_APROBADO;
    }

    public function setEstadoToAprobado()
    {
        $this->estado = self::ESTADO_APROBADO;
    }

    /**
     * @return bool
     */
    public function isEstadoReprobado()
    {
        return $this->estado === self::ESTADO_REPROBADO;
    }

    public function setEstadoToReprobado()
    {
        $this->estado = self::ESTADO_REPROBADO;
    }

    /**
     * @return bool
     */
    public function isEstadoRetirado()
    {
        return $this->estado === self::ESTADO_RETIRADO;
    }

    public function setEstadoToRetirado()
    {
        $this->estado = self::ESTADO_RETIRADO;
    }
}
