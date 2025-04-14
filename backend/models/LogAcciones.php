<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "log_acciones".
 *
 * @property int $log_id
 * @property string $tabla_afectada
 * @property string $accion_realizada
 * @property int|null $id_registro_afectado
 * @property string $mensaje
 * @property string $datos_nuevos
 * @property string|null $fecha_hora
 * @property string $tipo_operacion
 */
class LogAcciones extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_acciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registro_afectado'], 'default', 'value' => null],
            [['tabla_afectada', 'accion_realizada', 'mensaje', 'datos_nuevos', 'tipo_operacion'], 'required'],
            [['id_registro_afectado'], 'integer'],
            [['mensaje'], 'string'],
            [['datos_nuevos', 'fecha_hora'], 'safe'],
            [['tabla_afectada'], 'string', 'max' => 255],
            [['accion_realizada'], 'string', 'max' => 50],
            [['tipo_operacion'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'tabla_afectada' => 'Tabla Afectada',
            'accion_realizada' => 'Accion Realizada',
            'id_registro_afectado' => 'Id Registro Afectado',
            'mensaje' => 'Mensaje',
            'datos_nuevos' => 'Datos Nuevos',
            'fecha_hora' => 'Fecha Hora',
            'tipo_operacion' => 'Tipo Operacion',
        ];
    }

}
