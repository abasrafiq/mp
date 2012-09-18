<?php

/**
 * MpBulkUploadRecord filter form base class.
 *
 * @package    MP
 * @subpackage filter
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMpBulkUploadRecordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'filename'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'    => new sfWidgetFormFilterInput(),
      'type_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpType'), 'add_empty' => true)),
      'data_source_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDataSource'), 'add_empty' => true)),
      'year'           => new sfWidgetFormFilterInput(),
      'period_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpPeriod'), 'add_empty' => true)),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'add_empty' => true)),
      'creation_date'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'filename'       => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'type_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpType'), 'column' => 'id')),
      'data_source_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpDataSource'), 'column' => 'id')),
      'year'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'period_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpPeriod'), 'column' => 'id')),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpUser'), 'column' => 'id')),
      'creation_date'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('mp_bulk_upload_record_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpBulkUploadRecord';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'filename'       => 'Text',
      'description'    => 'Text',
      'type_id'        => 'ForeignKey',
      'data_source_id' => 'ForeignKey',
      'year'           => 'Number',
      'period_id'      => 'ForeignKey',
      'user_id'        => 'ForeignKey',
      'creation_date'  => 'Date',
    );
  }
}
