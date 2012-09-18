<?php

/**
 * MpGdp form base class.
 *
 * @method MpGdp getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpGdpForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'dari_description' => new sfWidgetFormTextarea(),
      'hs_code'          => new sfWidgetFormInputText(),
      'level'            => new sfWidgetFormInputText(),
      'parent_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpGdp'), 'add_empty' => true)),
      'status_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 225)),
      'description'      => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'dari_description' => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'hs_code'          => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'level'            => new sfValidatorInteger(array('required' => false)),
      'parent_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpGdp'), 'required' => false)),
      'status_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'MpGdp', 'column' => array('hs_code')))
    );

    $this->widgetSchema->setNameFormat('mp_gdp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpGdp';
  }

}
