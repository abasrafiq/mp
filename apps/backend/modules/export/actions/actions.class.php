<?php

/**
 * Description of exportActions
 *
 * @author Naser Sharifi
 */
class exportActions extends sfActions {
    //put your code here
    public function executeGdpRecord(sfWebRequest $request)
    {
        //$this->getUser()->setAttribute('render_to_excel', 'true');
        //$this->record = 'This is a cell';
        $this->getResponse()->clearHttpHeaders();
        $this->getResponse()->setHttpHeader('Content-Type', 'application/vnd.ms-excel');
        //$this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=registrants_report_event_' . $id . '.csv');
        #$ids = $this->getUser()->getAttribute('report_ids');
        $this->mp_gdp_records = Doctrine_Core::getTable('MpGdpRecord')
                ->createQuery('gdprecord')
                ->whereIn('id', $ids)
                ->execute();  
        $this->setLayout('export_layout');
    }
}

