<?php

/**
 * BaseMpGdpRecord
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $gdp_id
 * @property integer $unit_id
 * @property integer $year
 * @property integer $month
 * @property double $value
 * @property timestamp $creation_date
 * @property integer $user_id
 * @property timestamp $modification_date
 * @property string $comments
 * @property integer $status_id
 * @property MpStatus $MpStatus
 * @property MpUnit $MpUnit
 * @property MpGdp $MpGdp
 * @property MpUser $MpUser
 * 
 * @method integer     getGdpId()             Returns the current record's "gdp_id" value
 * @method integer     getUnitId()            Returns the current record's "unit_id" value
 * @method integer     getYear()              Returns the current record's "year" value
 * @method integer     getMonth()             Returns the current record's "month" value
 * @method double      getValue()             Returns the current record's "value" value
 * @method timestamp   getCreationDate()      Returns the current record's "creation_date" value
 * @method integer     getUserId()            Returns the current record's "user_id" value
 * @method timestamp   getModificationDate()  Returns the current record's "modification_date" value
 * @method string      getComments()          Returns the current record's "comments" value
 * @method integer     getStatusId()          Returns the current record's "status_id" value
 * @method MpStatus    getMpStatus()          Returns the current record's "MpStatus" value
 * @method MpUnit      getMpUnit()            Returns the current record's "MpUnit" value
 * @method MpGdp       getMpGdp()             Returns the current record's "MpGdp" value
 * @method MpUser      getMpUser()            Returns the current record's "MpUser" value
 * @method MpGdpRecord setGdpId()             Sets the current record's "gdp_id" value
 * @method MpGdpRecord setUnitId()            Sets the current record's "unit_id" value
 * @method MpGdpRecord setYear()              Sets the current record's "year" value
 * @method MpGdpRecord setMonth()             Sets the current record's "month" value
 * @method MpGdpRecord setValue()             Sets the current record's "value" value
 * @method MpGdpRecord setCreationDate()      Sets the current record's "creation_date" value
 * @method MpGdpRecord setUserId()            Sets the current record's "user_id" value
 * @method MpGdpRecord setModificationDate()  Sets the current record's "modification_date" value
 * @method MpGdpRecord setComments()          Sets the current record's "comments" value
 * @method MpGdpRecord setStatusId()          Sets the current record's "status_id" value
 * @method MpGdpRecord setMpStatus()          Sets the current record's "MpStatus" value
 * @method MpGdpRecord setMpUnit()            Sets the current record's "MpUnit" value
 * @method MpGdpRecord setMpGdp()             Sets the current record's "MpGdp" value
 * @method MpGdpRecord setMpUser()            Sets the current record's "MpUser" value
 * 
 * @package    MP
 * @subpackage model
 * @author     abas rafiq
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMpGdpRecord extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mp_gdp_record');
        $this->hasColumn('gdp_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('unit_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('year', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('month', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('value', 'double', null, array(
             'type' => 'double',
             'notnull' => true,
             ));
        $this->hasColumn('creation_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('modification_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('comments', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             ));
        $this->hasColumn('status_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MpStatus', array(
             'local' => 'status_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('MpUnit', array(
             'local' => 'unit_id',
             'foreign' => 'id'));

        $this->hasOne('MpGdp', array(
             'local' => 'gdp_id',
             'foreign' => 'id'));

        $this->hasOne('MpUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}