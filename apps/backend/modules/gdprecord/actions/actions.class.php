<?php

/**
 * document actions.
 *
 * @package    mp
 * @subpackage document
 * @author     Naser Sharifi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gdprecordActions extends sfActions
{ 
  public function executeChildren(sfWebRequest $request)
  {
      $active_selection = $request->getParameter('gdp');
      $t = Doctrine_Core::getTable('MpGdp')
                ->createQuery('c')
                ->where('hs_code=?',$active_selection)
                ->execute()->getFirst();
      $id = $t->getId();
      $gdp = new MpGdp();
      $gdps = $gdp->getImmediateChildern($id);
      $data=array();
      
      $keys=array_keys($gdps);
      $values=  array_values($gdps);
      $i=0;
      foreach($gdps as $key=>$value){
          array_push($data, array('key'=>$key, 'value'=>$value));
          $i++;
      }
      //$data = array('title'=>'Manager', 'name'=>'Naser');
      $json_data = json_encode($data);
      //$this->getResponse()->setHttpHeader('Content-type','application/json');
      //$this->setTemplate('gdprecord','single');
      return $this->renderText($json_data);
  }
  public function executeSingle(sfWebRequest $request)
  {
    $this->form = new GdpRecordForm();
    if ($request->isMethod('post')) {
        $this->processForm($request, $this->form);
    }
  }

  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($mp_gdp_record = Doctrine_Core::getTable('MpGdpRecord')->find($id));
    $this->form = new GdpRecordForm($mp_gdp_record);
    $this->object = $mp_gdp_record;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    //$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $id=$request->getParameter('id');
    $this->forward404Unless($mp_gdp_record = Doctrine_Core::getTable('MpGdpRecord')->find($id));
    $this->form = new GdpRecordForm($mp_gdp_record);

    $this->processUpdateForm($request, $this->form);

    $this->redirect('gdprecord/edit?id='.$request->getParameter('id'));
  }

public function executeQuery(sfWebRequest $request)
  {
      #$type = new MpType();
      #$this->types = $type->getNames();
     # $country = new MpCountry();
      #$this->countries = $country->getNames();

      $gdpRecord = new MpGdpRecord();
      $this->years = $gdpRecord->getYearsDistinct();
      $this->months = $gdpRecord->getMonthsDistinct();
      #$data_source = new MpDataSource();
      #$this->data_sources = $data_source->getNames();
      #$this->data_sources[sfConfig::get('app_mp_default_value')] = sfConfig::get('app_mp_default_data_srouce');
      $gdp = new MpGdp();
      $this->gdps = $gdp->getFirstLevelGdps();
      #$this->gdps = $gdp->getSecondLevelGdps();
      
      //$this->mp_gdp_records = null;
      if ($request->isMethod('post')) {
          $year = $request->getPostParameter('year');
          $month = $request->getPostParameter('month');
          $gdp_ids=array();
          if ($request->getPostParameter('gdp') != sfConfig::get('app_mp_default_value')) {
                $hs_code = $request->getPostParameter('gdp'); // 
                $gdps = Doctrine_Core::getTable('MpGdp')
                        ->createQuery('c')
                        ->where('hs_code like ?', $hs_code.'%')
                        ->execute()->getData();
                foreach($gdps as $gdp) {
                    //$gdp_ids .= $gdp->getId().',';
                    $gdp_ids[$gdp->getId()] = $gdp->getId();
                }
          }
          //$gdp_ids = substr($gdp_ids, 0, -1);
          //$gdp_ids=$gdp_ids.')';
         # $type_id = $request->getPostParameter('type');
         # $type = array();
         # if($type_id != sfConfig::get('app_mp_default_value')) {
          #    array_push($type, $type_id);
          #}
          
      
          //$arr= array_values($gdp_ids);]
         # if($request->getPostParameter('data_source') == sfConfig::get('app_mp_default_value')) {
         #     $data_source=array();
         # } else {
         #     $data_source = array($request->getPostParameter('data_source'));
         # }
          $this->mp_gdp_records = Doctrine_Core::getTable('MpGdpRecord')
                  ->createQuery('a')
                  ->whereIn('gdp_id',$gdp_ids)
                  #->andWhereIn('type_id', $type)
                  #->andWhereIn('country_id', $country)
                  ->andWhere('year=?', $year)
                  ->andWhere('month=?', $month)
                  #->andWhereIn('data_source_id', $data_source)
                  ->execute();
          
          //$this->report_ids = array(); // Used for exporting data to excel
          //$this->getUser()->setAttribute('gdprecords_', $this->mp_gdp_records);
          
      }
  }


  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($mp_document = Doctrine_Core::getTable('MpDocument')->find(array($request->getParameter('id'))), sprintf('Object mp_document does not exist (%s).', $request->getParameter('id')));
    $mp_document->delete();

    $this->redirect('document/index');
  }

 protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter('gdprecord'), $request->getFiles('gdprecord')); 
    if ($form->isValid())
    {
        $mp_gdp_record = new MpGdpRecord();
        // Set and save gdp record values
        $gdp_hs = '';
        $a = $request->getPostParameter('gdprecord[fourthlevelGdp]');
        if($a != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[frouthlevelGdp]');
        } elseif ($request->getPostParameter('gdprecord[thirdlevelGdp]') != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[thirdlevelGdp]');
        } elseif ($request->getPostParameter('gdprecord[secondlevelGdp]') != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[secondlevelGdp]');
        } elseif ($request->getPostParameter('gdprecord[firstlevelGdp]') != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[firstlevelGdp]');
        } else {
            $gdp_hs = false;
        }
        // TODO Do validation for the $gdp_hs false value
        $gdp_id = MpGdp::getIdForHS($gdp_hs);
        $mp_gdp_record->setGdpId($gdp_id);
       # $mp_gdp_record->setCountryId($request->getPostParameter('gdprecord[country]'));
       # $mp_gdp_record->setTypeId($request->getPostParameter('gdprecord[type]'));
       # $mp_gdp_record->setQuantity($request->getPostParameter('gdprecord[quantity]'));
        $mp_gdp_record->setUnitId($request->getPostParameter('gdprecord[unit]'));
        $mp_gdp_record->setValue($request->getPostParameter('gdprecord[value]'));
        $mp_gdp_record->setYear($request->getPostParameter('gdprecord[year]'));
        $mp_gdp_record->setMonth($request->getPostParameter('gdprecord[month]'));
       # $mp_gdp_record->setPeriodId($request->getPostParameter('gdprecord[period]'));
       # $mp_gdp_record->setDataSourceId($request->getPostParameter('gdprecord[dataSource]'));
        $mp_gdp_record->setCreationDate(date('Y-m-d H:i:s'));
        $mp_gdp_record->setStatusId(sfConfig::get('app_mp_default_status_id'));
       #$active_user_id = $this->getUser()->getAttribute('active_user_id');
       # $mp_gdp_record->setUserId($active_user_id);
        $mp_gdp_record->setComments($request->getPostParameter('gdprecord[comments]'));
       #$mp_gdp_record->setIsBulk(sfConfig::get('app_mp_false'));
        $mp_gdp_record->save();
        // Set and save document_record values
        
        $this->getUser()->setFlash('notice', 'Record created successfully');
        
        //Redirect to a page
        $this->redirect('gdprecord/single');
        
    }
  }
  protected function processUpdateForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form), $request->getFiles($form)); 
    if ($form->isValid())
    {
        $id = $request->getParameter('id');
        $mp_gdp_record = Doctrine_Core::getTable('MpGdpRecord')->find($id);
        // Set and save gdp record values
        $gdp_hs = '';
        $a = $request->getPostParameter('gdprecord[fourthlevelGdp]');
        if($a != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[frouthlevelGdp]');
        } elseif ($request->getPostParameter('gdprecord[thirdlevelGdp]') != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[thirdlevelGdp]');
        } elseif ($request->getPostParameter('gdprecord[secondlevelGdp]') != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[secondlevelGdp]');
        } elseif ($request->getPostParameter('gdprecord[firstlevelGdp]') != -1) {
            $gdp_hs = $request->getPostParameter('gdprecord[firstlevelGdp]');
        } else {
            $gdp_hs = false;
        }
        // TODO Do validation for the $gdp_hs false value
        $gdp_id = MpGdp::getIdForHS($gdp_hs);
        $mp_gdp_record->setGdpId($gdp_id);
        $mp_gdp_record->setUnitId($request->getPostParameter('gdprecord[unit]'));
        $mp_gdp_record->setYear($request->getPostParameter('gdprecord[year]'));
        $mp_gdp_record->setMonth($request->getPostParameter('gdprecord[month]'));
        $mp_gdp_record->setValue($request->getPostParameter('gdprecord[value]'));
        $mp_gdp_record->setModificationDate(date('Y-m-d H:i:s'));
        $mp_gdp_record->setStatusId(sfConfig::get('app_mp_default_status_id'));
        $active_user_id = $this->getUser()->getAttribute('active_user_id');
        $mp_gdp_record->setUserId($active_user_id);
        $mp_gdp_record->setComments($request->getPostParameter('gdprecord[comments]'));
        $mp_gdp_record->save();
        // Set and save document_record values
        
        //$this->getUser()->setFlash('notice', 'Record updated successfully');
        
        //Redirect to a page
        //$this->redirect('gdprecord/single');
        
    }
  }

}
