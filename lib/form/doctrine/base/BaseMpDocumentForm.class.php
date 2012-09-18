<?php

/**
 * MpDocument form base class.
 *
 * @method MpDocument getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpDocumentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'filename'         => new sfWidgetFormInputText(),
      'document_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDocumentType'), 'add_empty' => true)),
      'status_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 225)),
      'description'      => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'filename'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'document_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpDocumentType'), 'required' => false)),
      'status_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mp_document[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpDocument';
  }

}
