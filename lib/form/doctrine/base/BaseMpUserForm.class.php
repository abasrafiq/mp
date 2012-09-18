<?php

/**
 * MpUser form base class.
 *
 * @method MpUser getObject() Returns the current form's model object
 *
 * @package    MP
 * @subpackage form
 * @author     abas rafiq
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMpUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'first_name'        => new sfWidgetFormInputText(),
      'last_name'         => new sfWidgetFormInputText(),
      'designation'       => new sfWidgetFormInputText(),
      'gender'            => new sfWidgetFormInputText(),
      'username'          => new sfWidgetFormInputText(),
      'password'          => new sfWidgetFormInputText(),
      'phone'             => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'address'           => new sfWidgetFormTextarea(),
      'department_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpDepartment'), 'add_empty' => true)),
      'access_level_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpAccessLevel'), 'add_empty' => true)),
      'creation_date'     => new sfWidgetFormDateTime(),
      'modification_date' => new sfWidgetFormDateTime(),
      'status_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'        => new sfValidatorString(array('max_length' => 225)),
      'last_name'         => new sfValidatorString(array('max_length' => 225)),
      'designation'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'gender'            => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'username'          => new sfValidatorString(array('max_length' => 20)),
      'password'          => new sfValidatorString(array('max_length' => 50)),
      'phone'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'address'           => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'department_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpDepartment'), 'required' => false)),
      'access_level_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpAccessLevel'), 'required' => false)),
      'creation_date'     => new sfValidatorDateTime(array('required' => false)),
      'modification_date' => new sfValidatorDateTime(array('required' => false)),
      'status_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MpStatus'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'MpUser', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('mp_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MpUser';
  }

}
