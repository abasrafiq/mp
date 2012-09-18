<?php

/**
 * MpDocumentRecord form base class.
 *
 * @method MpDocumentRecord getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpDocumentRecordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'document_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDocument'), 'add_empty' => true)),
      'data_source_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDataSource'), 'add_empty' => true)),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'add_empty' => true)),
      'department_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDepartment'), 'add_empty' => true)),
      'creation_date'     => new sfWidgetFormDateTime(),
      'modification_date' => new sfWidgetFormDateTime(),
      'comments'          => new sfWidgetFormTextarea(),
      'status_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'document_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpDocument'), 'required' => false)),
      'data_source_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpDataSource'), 'required' => false)),
      'user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'required' => false)),
      'department_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpDepartment'), 'required' => false)),
      'creation_date'     => new sfValidatorDateTime(array('required' => false)),
      'modification_date' => new sfValidatorDateTime(array('required' => false)),
      'comments'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'status_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mp_document_record[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpDocumentRecord';
  }

}
