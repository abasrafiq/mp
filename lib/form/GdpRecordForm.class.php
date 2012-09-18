<?php

class GdpRecordForm extends BaseForm
{
    public function configure()
    {
        /*$level2_gdps_validation=array();
        $temp = Doctrine_core::getTable('MpGdp')->createQuery()->select('hs_code')->where('level=')
                ->execute()->getData();
        foreach($temp as $t) {
            $level2_gdps_validation[] = $t->getHSCode();
        }*/
      
        $mp_units = Doctrine_Core::getTable('MpUnit')->createQuery('unit')->execute();
        $mp_statuss = Doctrine_Core::getTable('MpUnit')->createQuery('status')->execute();
     
        $mp_gdp = new MpGdp();
        
        $mp_firstlevel_gdps= $mp_gdp->getFirstLevelGdps();
        $mp_firstlevel_gdps[0] = sfConfig::get('app_mp_combo_default');
       
        
        foreach($mp_units as $u) {
            $units[$u->getId()] = $u->getName();
        }
      
        
        foreach($mp_statuss as $s) {
            $statuss[$s->getId()] = $s->getName();
        }
      
        
        $secondlevel_gdps[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_combo_default');
        $thirdlevel_gdps[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_combo_default');
        $fourthlevel_gdps[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_combo_default');
        $this->setWidgets(array(
            'firstlevelGdp' => new sfWidgetFormChoice(array('choices'=>$mp_firstlevel_gdps)),
            'secondlevelGdp' => new sfWidgetFormChoice(array('choices'=>$secondlevel_gdps)),
            'thirdlevelGdp' => new sfWidgetFormChoice(array('choices'=>$thirdlevel_gdps)),
            'fourthlevelGdp' => new sfWidgetFormChoice(array('choices'=>$fourthlevel_gdps)),
 
            'unit' => new sfWidgetFormChoice(array('choices'=>$units)),
            'year' => new sfWidgetFormInputText(),
            'month' => new sfWidgetFormInputText(),
            'value' => new sfWidgetFormInputText(),            
            'comments' => new sfWidgetFormTextarea(),
            //'status' => new sfWidgetFormChoice(),
        ));
        $this->widgetSchema->setIdFormat('%s'); // will be accessed gdprecord_field
        $this->widgetSchema->setNameFormat('gdprecord[%s]');
        $this->widgetSchema->setLabels(array(
            'firstlevelGdp' => 'Gdp 1st level',
            'secondlevelGdp' => 'Second Level',
            'thirdlevelGdp' => 'Third Level',
            'fourthlevelGdp' => 'Fourth Level',
            #'type' => 'Entry Type',
            
        ));
                
        $this->setValidators(array(
            'firstlevelGdp' => new sfValidatorChoice(array('choices'=>array_keys($mp_firstlevel_gdps))),
            'secondlevelGdp' => new sfValidatorPass(array('required'=>false)),
            'thirdlevelGdp' => new sfValidatorPass(array('required'=>false)),
            'fourthlevelGdp' => new sfValidatorPass(array('required'=>false)),
           
            'unit' => new sfValidatorChoice(array('choices' => array_keys($units))),
            'year' => new sfValidatorNumber(array('min'=>  sfConfig::get('app_mp_min_year'), 'max'=>sfConfig::get('app_mp_max_year'))),
            'month' => new sfValidatorNumber(array('min'=>  sfConfig::get('app_mp_min_month'), 'max'=>sfConfig::get('app_mp_max_month'))),
            'value' => new sfValidatorNumber(array('required'=>true)),
            'comments' => new sfValidatorString(array('required'=>false)),
        ));
        

        
        $this->setDefaults(array('firstlevelGdp' => 0));
    }
   
    public function postValidatorCallback($validator, $values)
    {
        $mp_gdp = new MpGdp();
        $id = $mp_gdp->getIdForHS($values['firstlevelGdp']);
        $level2_values = $mp_gdp->getImmediateChildern($id);
        $validator = new sfValidatorChoice('secondlevelGdp', new sfValidatorChoice(array('choices'=>array_keys($level2_values))));
        return $values;
    }
    
    public function __construct($object = null)
    {
        $this->configure();
        if($object) {
            $firstlevel_gdps = array();
            $secondlevel_gdps = array();
            $thirdlevel_gdps = array();
            $fourthlevel_gdps = array();
            $gdp_id = $object->getGdpId();
            $temp_gdp = new MpGdp();
            $gdps = $temp_gdp->getUppers($gdp_id);
            $gdps[] = Doctrine_Core::getTable('MpGdp')->find($gdp_id);
            $level1_gdp=null;
            $level2_gdp=null;
            $level3_gdp=null;
            $level4_gdp=null;
            foreach($gdps as $gdp){
                switch($gdp->getLevel()) {
                    case 0:
                        $level1_gdp = $gdp->getHSCode();
                        $firstlevel_gdps = $gdp->getFirstLevelGdps();
                        $secondlevel_gdps = $gdp->getImmediateChildern($gdp->getId());
                        break;
                    case 1:
                        $level2_gdp = $gdp->getHSCode();
                        $thirdlevel_gdps = $gdp->getImmediateChildern($gdp->getId());
                        break;
                    case 2:
                        $level3_gdp = $gdp->getHSCode();
                        $fourthlevel_gdps = $gdp->getImmediateChildern($gdp->getId());
                        break;
                    case 3:
                        $level4_gdp = $gdp->getHSCode();
                        break;
                        
                }
            }
            $firstlevel_gdps[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_combo_default');
            $secondlevel_gdps[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_combo_default');
            $thirdlevel_gdps[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_combo_default');
            $fourthlevel_gdps[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_combo_default');

            $this->setWidget('firstlevelGdp', new sfWidgetFormChoice(array('choices'=>$firstlevel_gdps)));            
            $this->setWidget('secondlevelGdp', new sfWidgetFormChoice(array('choices'=>$secondlevel_gdps)));
            $this->setWidget('thirdlevelGdp', new sfWidgetFormChoice(array('choices'=>$thirdlevel_gdps)));
            $this->setWidget('fourthlevelGdp', new sfWidgetFormChoice(array('choices'=>$fourthlevel_gdps)));
            
            $this->setDefaults(array(
                'firstlevelGdp' => !is_null($level1_gdp)?$level1_gdp:sfConfig::get('app_mp_default_value'),
                'secondlevelGdp' => !is_null($level2_gdp)?$level2_gdp:sfConfig::get('app_mp_default_value'),
                'thirdlevelGdp' => !is_null($level3_gdp)?$level3_gdp:sfConfig::get('app_mp_default_value'),
                'fourthlevelGdp' => !is_null($level4_gdp)?$level4_gdp:sfConfig::get('app_mp_default_value'),
             
                'unit' => $object->getUnitId(),
                'year' => $object->getYear(),
                'month' => $object->getMonth(),
                'value' => $object->getValue(),
           
                
                
            ));
        }
    }
}