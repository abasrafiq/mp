<?php

/**
 * BaseMpSession
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property timestamp $start_time
 * @property timestamp $end_time
 * @property MpUser $MpUser
 * 
 * @method integer   getUserId()     Returns the current record's "user_id" value
 * @method timestamp getStartTime()  Returns the current record's "start_time" value
 * @method timestamp getEndTime()    Returns the current record's "end_time" value
 * @method MpUser    getMpUser()     Returns the current record's "MpUser" value
 * @method MpSession setUserId()     Sets the current record's "user_id" value
 * @method MpSession setStartTime()  Sets the current record's "start_time" value
 * @method MpSession setEndTime()    Sets the current record's "end_time" value
 * @method MpSession setMpUser()     Sets the current record's "MpUser" value
 * 
 * @package    MP
 * @subpackage model
 * @author     abas rafiq
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMpSession extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mp_session');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('start_time', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('end_time', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MpUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}