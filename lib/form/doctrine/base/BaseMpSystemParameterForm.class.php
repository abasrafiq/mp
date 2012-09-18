<?php

/**
 * MpSystemParameter form base class.
 *
 * @method MpSystemParameter getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpSystemParameterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'key1'   => new sfWidgetFormInputText(),
      'value1' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'key1'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'value1' => new sfValidatorString(array('max_length' => 225, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mp_system_parameter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpSystemParameter';
  }

}
