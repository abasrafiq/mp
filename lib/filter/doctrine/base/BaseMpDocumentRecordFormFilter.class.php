<?php

/**
 * MpDocumentRecord filter form base class.
 *
 * @package    MP
 * @subpackage filter
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMpDocumentRecordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'document_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDocument'), 'add_empty' => true)),
      'data_source_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDataSource'), 'add_empty' => true)),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'add_empty' => true)),
      'department_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDepartment'), 'add_empty' => true)),
      'creation_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'modification_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'comments'          => new sfWidgetFormFilterInput(),
      'status_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'document_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpDocument'), 'column' => 'id')),
      'data_source_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpDataSource'), 'column' => 'id')),
      'user_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpUser'), 'column' => 'id')),
      'department_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpDepartment'), 'column' => 'id')),
      'creation_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'modification_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'comments'          => new sfValidatorPass(array('required' => false)),
      'status_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpStatus'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('mp_document_record_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpDocumentRecord';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'document_id'       => 'ForeignKey',
      'data_source_id'    => 'ForeignKey',
      'user_id'           => 'ForeignKey',
      'department_id'     => 'ForeignKey',
      'creation_date'     => 'Date',
      'modification_date' => 'Date',
      'comments'          => 'Text',
      'status_id'         => 'ForeignKey',
    );
  }
}
