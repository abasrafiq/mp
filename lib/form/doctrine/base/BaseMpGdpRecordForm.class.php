<?php

/**
 * MpGdpRecord form base class.
 *
 * @method MpGdpRecord getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpGdpRecordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'gdp_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpGdp'), 'add_empty' => true)),
      'unit_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUnit'), 'add_empty' => true)),
      'year'              => new sfWidgetFormInputText(),
      'month'             => new sfWidgetFormInputText(),
      'value'             => new sfWidgetFormInputText(),
      'creation_date'     => new sfWidgetFormDateTime(),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'add_empty' => true)),
      'modification_date' => new sfWidgetFormDateTime(),
      'comments'          => new sfWidgetFormTextarea(),
      'status_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'gdp_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpGdp'), 'required' => false)),
      'unit_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpUnit'), 'required' => false)),
      'year'              => new sfValidatorInteger(array('required' => false)),
      'month'             => new sfValidatorInteger(array('required' => false)),
      'value'             => new sfValidatorPass(),
      'creation_date'     => new sfValidatorDateTime(array('required' => false)),
      'user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'required' => false)),
      'modification_date' => new sfValidatorDateTime(array('required' => false)),
      'comments'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'status_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mp_gdp_record[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpGdpRecord';
  }

}
