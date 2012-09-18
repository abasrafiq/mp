<?php

/**
 * MpGdpRecord filter form base class.
 *
 * @package    MP
 * @subpackage filter
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMpGdpRecordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gdp_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpGdp'), 'add_empty' => true)),
      'unit_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUnit'), 'add_empty' => true)),
      'year'              => new sfWidgetFormFilterInput(),
      'month'             => new sfWidgetFormFilterInput(),
      'value'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'creation_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpUser'), 'add_empty' => true)),
      'modification_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'comments'          => new sfWidgetFormFilterInput(),
      'status_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'gdp_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpGdp'), 'column' => 'id')),
      'unit_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpUnit'), 'column' => 'id')),
      'year'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'month'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'value'             => new sfValidatorPass(array('required' => false)),
      'creation_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'user_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpUser'), 'column' => 'id')),
      'modification_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'comments'          => new sfValidatorPass(array('required' => false)),
      'status_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpStatus'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('mp_gdp_record_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpGdpRecord';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'gdp_id'            => 'ForeignKey',
      'unit_id'           => 'ForeignKey',
      'year'              => 'Number',
      'month'             => 'Number',
      'value'             => 'Text',
      'creation_date'     => 'Date',
      'user_id'           => 'ForeignKey',
      'modification_date' => 'Date',
      'comments'          => 'Text',
      'status_id'         => 'ForeignKey',
    );
  }
}
