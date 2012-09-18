<?php

/**
 * status actions.
 *
 * @package    MP
 * @subpackage status
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statusActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->mp_statuss = Doctrine_Core::getTable('MpStatus')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->mp_status = Doctrine_Core::getTable('MpStatus')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->mp_status);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MpStatusForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MpStatusForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($mp_status = Doctrine_Core::getTable('MpStatus')->find(array($request->getParameter('id'))), sprintf('Object mp_status does not exist (%s).', $request->getParameter('id')));
    $this->form = new MpStatusForm($mp_status);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($mp_status = Doctrine_Core::getTable('MpStatus')->find(array($request->getParameter('id'))), sprintf('Object mp_status does not exist (%s).', $request->getParameter('id')));
    $this->form = new MpStatusForm($mp_status);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($mp_status = Doctrine_Core::getTable('MpStatus')->find(array($request->getParameter('id'))), sprintf('Object mp_status does not exist (%s).', $request->getParameter('id')));
    $mp_status->delete();

    $this->redirect('status/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $mp_status = $form->save();

      $this->redirect('status/edit?id='.$mp_status->getId());
    }
  }
}
