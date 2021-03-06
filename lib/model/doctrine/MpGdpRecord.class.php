<?php

/**
 * TmisCommodityRecord
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tmis
 * @subpackage model
 * @author     Naser Sharifi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MpGdpRecord extends BaseMpGdpRecord
{
    /**
     *
     * @param type $year the particular year for which number of records is required
     * @return type number of records for a particular year
     */
    public function getValueForYear($year, $month, $gdp_id, $unit)
    {
        
        $result = Doctrine_Core::getTable('MpGdpRecord')
                ->createQuery('gdprecord') //->select('SUM(comrec.value)')
                ->where('gdprecord.year = ?', $year)
                ->where('gdprecord.month = ?', $month)
                ->andWhereIn('gdprecord.gdp_id', $gdp_id)
                ->andWhereIn('gdprecord.unit_id', $unit) 
                ->execute();
        $value=0;
        foreach($result as $gdprecord) {
            $value += $gdprecord->getValue();
        }
        return $value;
    }
    
    public function getValueForHS($gdp_id, $year, $month, $unit)
    {
        $result = Doctrine_Core::getTable('MpGdpRecord')
                ->createQuery('gdprecord')
                ->whereIn('gdprecord.year', $year)
                ->whereIn('gdprecord.month', $month)
                ->andWhereIn('gdprecord.gdp_id', $gdp_id)
                ->andWhereIn('gdprecord.unit_id', $unit) 
                
                ->execute();
        $value=0;
        foreach($result as $gpdrecord) {
            $value += $gdprecord->getValue();
        }
        return $value;
        
    }

    
    /**
     * Returns array of years
     * 
     * @return years array
     */
    public function getYearsDistinct()
    {
        $q =  Doctrine_Query::create()
                ->select('gdprecord.year')
                ->from('MpGdpRecord gdprecord')
                ->orderBy('gdprecord.year');
        $q->distinct();
        $result= $q->fetchArray();
        $years=array();
        foreach ($result as $year)
            $years[$year['year']] = $year['year'];
        return $years;
    }
    public function getMonthsDistinct()
    {
        $q =  Doctrine_Query::create()
                ->select('gdprecord.month')
                ->from('MpGdpRecord gdprecord')
                ->orderBy('gdprecord.month');
        $q->distinct();
        $result= $q->fetchArray();
        $months=array();
        foreach ($result as $month)
            $months[$month['month']] = $month['month'];
        return $months;
    }

}