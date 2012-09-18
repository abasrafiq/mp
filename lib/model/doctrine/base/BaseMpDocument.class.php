<?php

/**
 * BaseMpDocument
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property string $filename
 * @property integer $document_type_id
 * @property integer $status_id
 * @property MpStatus $MpStatus
 * @property MpDocumentType $MpDocumentType
 * @property Doctrine_Collection $DocumentRecords
 * 
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method string              getFilename()         Returns the current record's "filename" value
 * @method integer             getDocumentTypeId()   Returns the current record's "document_type_id" value
 * @method integer             getStatusId()         Returns the current record's "status_id" value
 * @method MpStatus            getMpStatus()         Returns the current record's "MpStatus" value
 * @method MpDocumentType      getMpDocumentType()   Returns the current record's "MpDocumentType" value
 * @method Doctrine_Collection getDocumentRecords()  Returns the current record's "DocumentRecords" collection
 * @method MpDocument          setName()             Sets the current record's "name" value
 * @method MpDocument          setDescription()      Sets the current record's "description" value
 * @method MpDocument          setFilename()         Sets the current record's "filename" value
 * @method MpDocument          setDocumentTypeId()   Sets the current record's "document_type_id" value
 * @method MpDocument          setStatusId()         Sets the current record's "status_id" value
 * @method MpDocument          setMpStatus()         Sets the current record's "MpStatus" value
 * @method MpDocument          setMpDocumentType()   Sets the current record's "MpDocumentType" value
 * @method MpDocument          setDocumentRecords()  Sets the current record's "DocumentRecords" collection
 * 
 * @package    MP
 * @subpackage model
 * @author     abas rafiq
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMpDocument extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mp_document');
        $this->hasColumn('name', 'string', 225, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 225,
             ));
        $this->hasColumn('description', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             ));
        $this->hasColumn('filename', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('document_type_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('status_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MpStatus', array(
             'local' => 'status_id',
             'foreign' => 'id'));

        $this->hasOne('MpDocumentType', array(
             'local' => 'document_type_id',
             'foreign' => 'id'));

        $this->hasMany('MpDocumentRecord as DocumentRecords', array(
             'local' => 'id',
             'foreign' => 'document_id'));
    }
}