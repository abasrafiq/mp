<?php

/**
 * MpCountry form base class.
 *
 * @method MpCountry getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpCountryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'abbreviation' => new sfWidgetFormInputText(),
      'code'         => new sfWidgetFormInputText(),
      'status_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 225)),
      'description'  => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'abbreviation' => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'code'         => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'status_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'MpCountry', 'column' => array('abbreviation'))),
        new sfValidatorDoctrineUnique(array('model' => 'MpCountry', 'column' => array('code'))),
      ))
    );

    $this->widgetSchema->setNameFormat('mp_country[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpCountry';
  }

}
