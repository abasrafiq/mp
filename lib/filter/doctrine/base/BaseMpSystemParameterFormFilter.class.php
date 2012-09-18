<?php

/**
 * MpSystemParameter filter form base class.
 *
 * @package    MP
 * @subpackage filter
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMpSystemParameterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'key1'   => new sfWidgetFormFilterInput(),
      'value1' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'key1'   => new sfValidatorPass(array('required' => false)),
      'value1' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mp_system_parameter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpSystemParameter';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'key1'   => 'Text',
      'value1' => 'Text',
    );
  }
}
