<?php

namespace srag\RequiredData\Fill;

use ActiveRecord;
use arConnector;
use srag\DIC\DICTrait;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class FillStorage
 *
 * @package srag\RequiredData\Fill
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class FillStorage extends ActiveRecord
{

    use DICTrait;
    use RequiredDataTrait;
    /**
     * @var string
     *
     * @abstract
     */
    const TABLE_NAME_SUFFIX = "storage";


    /**
     * @return string
     */
    public static function getTableName() : string
    {
        return self::requiredData()->getTableNamePrefix() . "_" . static::TABLE_NAME_SUFFIX;
    }


    /**
     * @return string
     */
    public function getConnectorContainerName()
    {
        return static::getTableName();
    }


    /**
     * @return string
     *
     * @deprecated
     */
    public static function returnDbTableName()
    {
        return static::getTableName();
    }


    /**
     * @var int
     *
     * @con_has_field    true
     * @con_fieldtype    integer
     * @con_length       8
     * @con_is_notnull   true
     * @con_is_primary   true
     * @con_sequence     true
     */
    protected $fill_storage_id;
    /**
     * @var int
     *
     * @con_has_field    true
     * @con_fieldtype    text
     * @con_is_notnull   integer
     * @con_length       8
     */
    protected $fill_id;
    /**
     * @var string
     *
     * @con_has_field    true
     * @con_fieldtype    text
     * @con_is_notnull   true
     */
    protected $field_id;
    /**
     * @var mixed
     *
     * @con_has_field    true
     * @con_fieldtype    text
     * @con_is_notnull   true
     */
    protected $field_value;


    /**
     * FillStorage constructor
     *
     * @param int              $primary_key_value
     * @param arConnector|null $connector
     */
    public function __construct(/*int*/ $primary_key_value = 0, arConnector $connector = null)
    {
        parent::__construct($primary_key_value, $connector);
    }


    /**
     * @inheritDoc
     */
    public function sleep(/*string*/ $field_name)
    {
        $field_value = $this->{$field_name};

        switch ($field_name) {
            case "field_value":
                return json_encode($field_value);

            default:
                return null;
        }
    }


    /**
     * @inheritDoc
     */
    public function wakeUp(/*string*/ $field_name, $field_value)
    {
        switch ($field_name) {
            case "field_value":
                return json_decode($field_value, true);

            default:
                return null;
        }
    }


    /**
     * @return int
     */
    public function getFillStorageId() : int
    {
        return $this->fill_storage_id;
    }


    /**
     * @param int $fill_storage_id
     */
    public function setFillStorageId(int $fill_storage_id)/* : void*/
    {
        $this->fill_storage_id = $fill_storage_id;
    }


    /**
     * @return int
     */
    public function getFillId() : int
    {
        return $this->fill_id;
    }


    /**
     * @param int $fill_id
     */
    public function setFillId(int $fill_id)/* : void*/
    {
        $this->fill_id = $fill_id;
    }


    /**
     * @return string
     */
    public function getFieldId() : string
    {
        return $this->field_id;
    }


    /**
     * @param string $field_id
     */
    public function setFieldId(string $field_id)/* : void*/
    {
        $this->field_id = $field_id;
    }


    /**
     * @return mixed
     */
    public function getFieldValue()
    {
        return $this->field_value;
    }


    /**
     * @param mixed $field_value
     */
    public function setFieldValue($field_value)/* : void*/
    {
        $this->field_value = $field_value;
    }
}
