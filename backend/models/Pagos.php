<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pagos".
 *
 * @property int $pago_id
 * @property int $estudiante_id
 * @property float $monto
 * @property string|null $fecha_pago
 * @property string $concepto
 * @property string $metodo_pago
 * @property string|null $estado
 * @property int|null $semestre_id
 */
class Pagos extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const CONCEPTO_MATRICULA = 'matricula';
    const CONCEPTO_MENSUALIDAD = 'mensualidad';
    const CONCEPTO_OTROS = 'otros';
    const METODO_PAGO_EFECTIVO = 'efectivo';
    const METODO_PAGO_TARJETA = 'tarjeta';
    const METODO_PAGO_TRANSFERENCIA = 'transferencia';
    const ESTADO_COMPLETO = 'completo';
    const ESTADO_PENDIENTE = 'pendiente';
    const ESTADO_ATRASADO = 'atrasado';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_pago', 'semestre_id'], 'default', 'value' => null],
            [['estado'], 'default', 'value' => 'pendiente'],
            [['estudiante_id', 'monto', 'concepto', 'metodo_pago'], 'required'],
            [['estudiante_id', 'semestre_id'], 'integer'],
            [['monto'], 'number'],
            [['fecha_pago'], 'safe'],
            [['concepto', 'metodo_pago', 'estado'], 'string'],
            ['concepto', 'in', 'range' => array_keys(self::optsConcepto())],
            ['metodo_pago', 'in', 'range' => array_keys(self::optsMetodoPago())],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pago_id' => 'Pago ID',
            'estudiante_id' => 'Estudiante ID',
            'monto' => 'Monto',
            'fecha_pago' => 'Fecha Pago',
            'concepto' => 'Concepto',
            'metodo_pago' => 'Metodo Pago',
            'estado' => 'Estado',
            'semestre_id' => 'Semestre ID',
        ];
    }


    /**
     * column concepto ENUM value labels
     * @return string[]
     */
    public static function optsConcepto()
    {
        return [
            self::CONCEPTO_MATRICULA => 'matricula',
            self::CONCEPTO_MENSUALIDAD => 'mensualidad',
            self::CONCEPTO_OTROS => 'otros',
        ];
    }

    /**
     * column metodo_pago ENUM value labels
     * @return string[]
     */
    public static function optsMetodoPago()
    {
        return [
            self::METODO_PAGO_EFECTIVO => 'efectivo',
            self::METODO_PAGO_TARJETA => 'tarjeta',
            self::METODO_PAGO_TRANSFERENCIA => 'transferencia',
        ];
    }

    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_COMPLETO => 'completo',
            self::ESTADO_PENDIENTE => 'pendiente',
            self::ESTADO_ATRASADO => 'atrasado',
        ];
    }

    /**
     * @return string
     */
    public function displayConcepto()
    {
        return self::optsConcepto()[$this->concepto];
    }

    /**
     * @return bool
     */
    public function isConceptoMatricula()
    {
        return $this->concepto === self::CONCEPTO_MATRICULA;
    }

    public function setConceptoToMatricula()
    {
        $this->concepto = self::CONCEPTO_MATRICULA;
    }

    /**
     * @return bool
     */
    public function isConceptoMensualidad()
    {
        return $this->concepto === self::CONCEPTO_MENSUALIDAD;
    }

    public function setConceptoToMensualidad()
    {
        $this->concepto = self::CONCEPTO_MENSUALIDAD;
    }

    /**
     * @return bool
     */
    public function isConceptoOtros()
    {
        return $this->concepto === self::CONCEPTO_OTROS;
    }

    public function setConceptoToOtros()
    {
        $this->concepto = self::CONCEPTO_OTROS;
    }

    /**
     * @return string
     */
    public function displayMetodoPago()
    {
        return self::optsMetodoPago()[$this->metodo_pago];
    }

    /**
     * @return bool
     */
    public function isMetodoPagoEfectivo()
    {
        return $this->metodo_pago === self::METODO_PAGO_EFECTIVO;
    }

    public function setMetodoPagoToEfectivo()
    {
        $this->metodo_pago = self::METODO_PAGO_EFECTIVO;
    }

    /**
     * @return bool
     */
    public function isMetodoPagoTarjeta()
    {
        return $this->metodo_pago === self::METODO_PAGO_TARJETA;
    }

    public function setMetodoPagoToTarjeta()
    {
        $this->metodo_pago = self::METODO_PAGO_TARJETA;
    }

    /**
     * @return bool
     */
    public function isMetodoPagoTransferencia()
    {
        return $this->metodo_pago === self::METODO_PAGO_TRANSFERENCIA;
    }

    public function setMetodoPagoToTransferencia()
    {
        $this->metodo_pago = self::METODO_PAGO_TRANSFERENCIA;
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
    public function isEstadoCompleto()
    {
        return $this->estado === self::ESTADO_COMPLETO;
    }

    public function setEstadoToCompleto()
    {
        $this->estado = self::ESTADO_COMPLETO;
    }

    /**
     * @return bool
     */
    public function isEstadoPendiente()
    {
        return $this->estado === self::ESTADO_PENDIENTE;
    }

    public function setEstadoToPendiente()
    {
        $this->estado = self::ESTADO_PENDIENTE;
    }

    /**
     * @return bool
     */
    public function isEstadoAtrasado()
    {
        return $this->estado === self::ESTADO_ATRASADO;
    }

    public function setEstadoToAtrasado()
    {
        $this->estado = self::ESTADO_ATRASADO;
    }
}
