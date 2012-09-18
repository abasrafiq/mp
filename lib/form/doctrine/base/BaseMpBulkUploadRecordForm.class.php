<?php

/**
 * MpBulkUploadRecord form base class.
 *
 * @method MpBulkUploadRecord getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpBulkUploadRecordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'filename'       => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormTextarea(),
      'type_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpType'), 'add_empty' => true)),
      'data_source_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDataSource'), 'add_empty' => false)),
      'year'           => new sfWidgetFormInputText(),
      'period_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpPeriod'), 'add_empty' => true)),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'add_empty' => true)),
      'creation_date'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'filename'       => new sfValidatorString(array('max_length' => 100)),
      'description'    => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'type_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpType'), 'required' => false)),
      'data_source_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpDataSource'))),
      'year'           => new sfValidatorInteger(array('required' => false)),
      'period_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpPeriod'), 'required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'required' => false)),
      'creation_date'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mp_bulk_upload_record[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpBulkUploadRecord';
  }

}
