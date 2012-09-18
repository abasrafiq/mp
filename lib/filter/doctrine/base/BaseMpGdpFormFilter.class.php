<?php

/**
 * MpGdp filter form base class.
 *
 * @package    MP
 * @subpackage filter
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMpGdpFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
     # 'description'      => new sfWidgetFormFilterInput(),
     # 'dari_description' => new sfWidgetFormFilterInput(),
      #'hs_code'          => new sfWidgetFormFilterInput(),
      #'level'            => new sfWidgetFormFilterInput(),
    'parent_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpGdp'), 'add_empty' => true)),
     # 'status_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'description'      => new sfValidatorPass(array('required' => false)),
      'dari_description' => new sfValidatorPass(array('required' => false)),
      'hs_code'          => new sfValidatorPass(array('required' => false)),
      'level'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpGdp'), 'column' => 'id')),
      'status_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpStatus'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('mp_gdp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpGdp';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'description'      => 'Text',
      'dari_description' => 'Text',
      'hs_code'          => 'Text',
      'level'            => 'Number',
      'parent_id'        => 'ForeignKey',
      'status_id'        => 'ForeignKey',
    );
  }
}
