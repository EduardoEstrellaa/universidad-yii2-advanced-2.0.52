<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

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
class Estudiantes extends ActiveRecord
{
    // Valores ENUM para genero
    const GENERO_M = 'M';
    const GENERO_F = 'F';
    const GENERO_O = 'O';

    // Valores ENUM para estado
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
     * Reglas simplificadas ya que la validación principal está en el SP
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'email'], 'required'],
            [['fecha_nacimiento', 'fecha_ingreso'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 200],
            [['telefono'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['email'], 'email'],

            [['genero'], 'in', 'range' => [self::GENERO_M, self::GENERO_F, self::GENERO_O]],
            [['estado'], 'in', 'range' => [self::ESTADO_ACTIVO, self::ESTADO_GRADUADO, self::ESTADO_RETIRADO]],
            [
                ['telefono'],
                'unique',
                'targetClass' => self::class,
                'message' => 'Este número telefónico ya está registrado'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'estudiante_id' => 'ID Estudiante',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'genero' => 'Género',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'email' => 'Correo Electrónico',
            'fecha_ingreso' => 'Fecha de Ingreso',
            'estado' => 'Estado',
        ];
    }

    /**
     * Sobreescribimos save() para forzar el uso del procedimiento almacenado
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        throw new \yii\base\NotSupportedException('El guardado directo está deshabilitado. Use el procedimiento almacenado sp_alta_estudiante.');
    }

    /**
     * Métodos para opciones de formulario
     */
    public static function getOpcionesGenero()
    {
        return [
            self::GENERO_M => 'Masculino',
            self::GENERO_F => 'Femenino',
            self::GENERO_O => 'Otro',
        ];
    }

    public static function getOpcionesEstado()
    {
        return [
            self::ESTADO_ACTIVO => 'Activo',
            self::ESTADO_GRADUADO => 'Graduado',
            self::ESTADO_RETIRADO => 'Retirado',
        ];
    }

    /**
     * Método para ejecutar el procedimiento almacenado
     */
    public function registrarEstudiante()
    {
        $db = Yii::$app->db;

        try {
            $command = $db->createCommand("CALL sp_alta_estudiante(
                :nombre, :apellido, :fecha_nacimiento, :genero,
                :direccion, :telefono, :email, :fecha_ingreso,
                @estudiante_id, @resultado, @error
            )");

            $command->bindValues([
                ':nombre' => $this->nombre,
                ':apellido' => $this->apellido,
                ':fecha_nacimiento' => $this->fecha_nacimiento,
                ':genero' => $this->genero,
                ':direccion' => $this->direccion,
                ':telefono' => $this->telefono,
                ':email' => $this->email,
                ':fecha_ingreso' => $this->fecha_ingreso,
            ]);

            $command->execute();

            $output = $db->createCommand("
                SELECT @estudiante_id as estudiante_id, 
                       @resultado as resultado, 
                       @error as error
            ")->queryOne();

            if (!empty($output['error'])) {
                $this->addError('email', $output['error']);
                return false;
            }

            $this->estudiante_id = $output['estudiante_id'];
            return true;
        } catch (\Exception $e) {
            $this->addError('email', 'Error al registrar el estudiante: ' . $e->getMessage());
            return false;
        }
    }
}
