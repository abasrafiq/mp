<?php

/**
 * gdp actions.
 *
 * @package    MP
 * @subpackage gdp
 * @author     abas rafiq
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gdpActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->mp_gdps = Doctrine_Core::getTable('MpGdp')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->mp_gdp = Doctrine_Core::getTable('MpGdp')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->mp_gdp);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MpGdpForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MpGdpForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($mp_gdp = Doctrine_Core::getTable('MpGdp')->find(array($request->getParameter('id'))), sprintf('Object mp_gdp does not exist (%s).', $request->getParameter('id')));
    $this->form = new MpGdpForm($mp_gdp);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($mp_gdp = Doctrine_Core::getTable('MpGdp')->find(array($request->getParameter('id'))), sprintf('Object mp_gdp does not exist (%s).', $request->getParameter('id')));
    $this->form = new MpGdpForm($mp_gdp);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($mp_gdp = Doctrine_Core::getTable('MpGdp')->find(array($request->getParameter('id'))), sprintf('Object mp_gdp does not exist (%s).', $request->getParameter('id')));
    $mp_gdp->delete();

    $this->redirect('gdp/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $mp_gdp = $form->save();

      $this->redirect('gdp/edit?id='.$mp_gdp->getId());
    }
  }
}
