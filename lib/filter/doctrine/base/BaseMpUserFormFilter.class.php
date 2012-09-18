<?php

/**
 * MpUser filter form base class.
 *
 * @package    MP
 * @subpackage filter
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMpUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'designation'       => new sfWidgetFormFilterInput(),
      'gender'            => new sfWidgetFormFilterInput(),
      'username'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'             => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'address'           => new sfWidgetFormFilterInput(),
      'department_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDepartment'), 'add_empty' => true)),
      'access_level_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpAccessLevel'), 'add_empty' => true)),
      'creation_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'modification_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'status_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'first_name'        => new sfValidatorPass(array('required' => false)),
      'last_name'         => new sfValidatorPass(array('required' => false)),
      'designation'       => new sfValidatorPass(array('required' => false)),
      'gender'            => new sfValidatorPass(array('required' => false)),
      'username'          => new sfValidatorPass(array('required' => false)),
      'password'          => new sfValidatorPass(array('required' => false)),
      'phone'             => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'address'           => new sfValidatorPass(array('required' => false)),
      'department_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpDepartment'), 'column' => 'id')),
      'access_level_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpAccessLevel'), 'column' => 'id')),
      'creation_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'modification_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'status_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MpStatus'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('mp_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpUser';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'first_name'        => 'Text',
      'last_name'         => 'Text',
      'designation'       => 'Text',
      'gender'            => 'Text',
      'username'          => 'Text',
      'password'          => 'Text',
      'phone'             => 'Text',
      'email'             => 'Text',
      'address'           => 'Text',
      'department_id'     => 'ForeignKey',
      'access_level_id'   => 'ForeignKey',
      'creation_date'     => 'Date',
      'modification_date' => 'Date',
      'status_id'         => 'ForeignKey',
    );
  }
}
