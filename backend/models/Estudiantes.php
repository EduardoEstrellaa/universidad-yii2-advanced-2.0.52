<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estudiantes".
 *
 * @property int $estudiante_id
 * @property string $nombre
 * @property string $apellido
 * @property string|null $fecha_nacimiento
 * @property string|null $genero
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $email
 * @property string|null $fecha_ingreso
 * @property string|null $estado
 */
class Estudiantes extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const GENERO_M = 'M';
    const GENERO_F = 'F';
    const GENERO_O = 'O';
    const ESTADO_ACTIVO = 'activo';
    const ESTADO_GRADUADO = 'graduado';
    const ESTADO_RETIRADO = 'retirado';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiantes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento', 'genero', 'direccion', 'telefono', 'email', 'fecha_ingreso'], 'default', 'value' => null],
            [['estado'], 'default', 'value' => 'activo'],
            [['nombre', 'apellido'], 'required'],
            [['fecha_nacimiento', 'fecha_ingreso'], 'safe'],
            [['genero', 'estado'], 'string'],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 200],
            [['telefono'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            ['genero', 'in', 'range' => array_keys(self::optsGenero())],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'estudiante_id' => 'Estudiante ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'genero' => 'Genero',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'fecha_ingreso' => 'Fecha Ingreso',
            'estado' => 'Estado',
        ];
    }


    /**
     * column genero ENUM value labels
     * @return string[]
     */
    public static function optsGenero()
    {
        return [
            self::GENERO_M => 'M',
            self::GENERO_F => 'F',
            self::GENERO_O => 'O',
        ];
    }

    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_ACTIVO => 'activo',
            self::ESTADO_GRADUADO => 'graduado',
            self::ESTADO_RETIRADO => 'retirado',
        ];
    }

    /**
     * @return string
     */
    public function displayGenero()
    {
        return self::optsGenero()[$this->genero];
    }

    /**
     * @return bool
     */
    public function isGeneroM()
    {
        return $this->genero === self::GENERO_M;
    }

    public function setGeneroToM()
    {
        $this->genero = self::GENERO_M;
    }

    /**
     * @return bool
     */
    public function isGeneroF()
    {
        return $this->genero === self::GENERO_F;
    }

    public function setGeneroToF()
    {
        $this->genero = self::GENERO_F;
    }

    /**
     * @return bool
     */
    public function isGeneroO()
    {
        return $this->genero === self::GENERO_O;
    }

    public function setGeneroToO()
    {
        $this->genero = self::GENERO_O;
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
    public function isEstadoActivo()
    {
        return $this->estado === self::ESTADO_ACTIVO;
    }

    public function setEstadoToActivo()
    {
        $this->estado = self::ESTADO_ACTIVO;
    }

    /**
     * @return bool
     */
    public function isEstadoGraduado()
    {
        return $this->estado === self::ESTADO_GRADUADO;
    }

    public function setEstadoToGraduado()
    {
        $this->estado = self::ESTADO_GRADUADO;
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
