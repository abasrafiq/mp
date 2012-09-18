<?php

/**
 * MpGdp
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    mp
 * @subpackage model
 * @author     Naser Sharifi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MpGdp extends BaseMpGdp
{
    /**
     * Check if the record exists (given the HS Code)
     * 
     * @param 
     * 
     * @return 
     */
    public function existsGdp($hsCode)
    {
        if (strlen($hsCode) > 8)
            return false;
        
        $result =  Doctrine_Core::getTable('MpGdp')
                    ->createQuery('gdp')
                    ->where('gdp.hs_code = ?', $hsCode)
                    ->orWhere('gdp.hs_code = ?', substr($hsCode, 0, 6))
                    ->orWhere('gdp.hs_code = ?', substr($hsCode, 0, 4))
                    ->orWhere('gdp.hs_code = ?', substr($hsCode, 0, 2))
                    ->execute()->getData();
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getNameForHS($hsCode)
    {
        $gdp = Doctrine_Core::getTable('MpGdp')
              ->createQuery('c')
              ->where('hs_code=?', $hsCode)
              ->execute()->getFirst();
        $name = $gdp->getName();
        return self::slugName($name);
    }
    // 02 23 04 04
    public static function getIdForHS($hsCode)
    {
        /*for ($i=-1; $i>strlen($hsCode); $i-=2) {
            
        }*/
        
        $hs_list = array($hsCode=>$hsCode);
        if (strlen($hsCode)==8) {
            $hs_list[substr($hsCode,0, 6)] = substr($hsCode,0, 6);
            $hs_list[substr($hsCode,0, 4)] = substr($hsCode,0, 4);
            $hs_list[substr($hsCode,0, 2)] = substr($hsCode,0, 2);
        } elseif(strlen($hsCode)==6) {
            $hs_list[substr($hsCode,0, 4)] = substr($hsCode,0, 4);
            $hs_list[substr($hsCode,0, 2)] = substr($hsCode,0, 2);
        } elseif(strlen($hsCode)==4) {
            $hs_list[substr($hsCode,0, 2)] = substr($hsCode,0, 2);
        }
        
        $gdp = Doctrine_Core::getTable('MpGdp')
              ->createQuery('c')
              ->whereIn('hs_code', $hs_list)
              ->orderBy('hs_code DESC')
              ->execute()->getFirst();
        
        return $gdp->getId();
    }
    
    public function getIdsForHS($hsCode)
    {
        $gdps = Doctrine_Core::getTable('MpGdp')
              ->createQuery('c')
              ->where('hs_code like ?', $hsCode.'%')
              ->execute()->getData();
        $gdp_ids = array();
        foreach($gdps as $gdp) {
            $gdp_ids[] = $gdp->getId();
        }
        
        return $gdp_ids;
    }
    
    public function getFirstLevelGdps()
    {
        $collection = Doctrine_Core::getTable('MpGdp')
                ->createQuery('a')
                ->where('level=?', sfConfig::get('app_mp_first_level_gdp_id')) 
                ->orderBy('hs_code')
                ->execute();
        $collection = $collection->toArray();
        $gdps = array();
        foreach ($collection as $gdp) {
            $gdps[$gdp['hs_code']] = $gdp['hs_code'].'_'.strtolower(substr($gdp['name'], 0, 30));
        }
        return $gdps;
    }
    
    public function getImmediateChildern($id)
    {
        $collection = Doctrine_Core::getTable('MpGdp')
                ->createQuery('a')
                ->where('parent_id=?', $id) 
                ->orderBy('hs_code')
                ->execute();
        $collection = $collection->toArray();
        $gdps = array();
        foreach ($collection as $gdp) {
            $gdps[$gdp['hs_code']] = $gdp['hs_code'].'_'.strtolower(substr($gdp['name'], 0, 30));
        }
        return $gdps;
    }
    
    public function getUppers($id)
    {
        $output_gdps = array();
        $temp_gdp = Doctrine_Core::getTable('MpGdp')->find($id);
        $parent_id = $temp_gdp->getParentId();
        while($parent_id!=-1) {
            $parent_gdp = Doctrine_Core::getTable('MpGdp')->find($parent_id);
            $output_gdps[] = $parent_gdp;
            $parent_id=$parent_gdp->getParentId();
        }
        
        return $output_gdps;
    }
    
    
    protected static function slugName($name)
    {
        return str_replace(' ', '_', $name);
    }
    
}