<?php

/**
 * core actions.
 *
 * @package    tmis
 * @subpackage core
 * @author     Naser Sharifi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class coreActions extends sfActions
{
    
  public function executeChangePassword(sfWebRequest $request)
  {
      $this->form = new sfForm();
      
      $this->form->setWidgets(array(
          'oldpass' => new sfWidgetFormInputPassword(),
          'newpass' => new sfWidgetFormInputPassword(),
          'confirmnewpass' => new sfWidgetFormInputPassword(),
      ));
      $this->form->getWidgetSchema()->setLabels(array(
          'oldpass' => 'Old Password',
          'newpass' => 'New Password',
          'confirmnewpass' => 'Confirm New Password',
      ));
      
      if($request->isMethod('post') && !$this->getUser()->hasFlash('error')) {
          $old_pass = md5($request->getPostParameter('oldpass'));
          $new_pass = $request->getPostParameter('newpass');
          $confirm_pass = $request->getPostParameter('confirmnewpass');
          $user = Doctrine_Core::getTable('TmisUser')
                  ->createQuery('u')
                  ->where('id=?', $this->getUser()->getAttribute('active_user_id'))
                  ->execute()->getFirst();
          $real_pass = $user->getPassword();
          if($old_pass != $real_pass) {
              $this->getUser()->setFlash('error', 'Wrong old password');
              
              $this->forward('core', 'changePassword');
          }
          if($new_pass != $confirm_pass) {
              $this->getUser()->setFlash('error', 'New password and the confirmation don\'t match');
              $this->forward('core', 'changePassword');
              
          }
          
          $user->setPassword(md5($request->getPostParameter('newpass')));
          $user->save();
          $this->getUser()->setFlash('notice', 'Password changed successfully!');
      }
  }
    
  public function executeHome(sfWebRequest $request)
  {
      //$this->const = sfConfig::get('app_test');
  }
  
  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('core', 'home');
  }
  
  public function executeBackup(sfWebRequest $request)
  {
      /*$this->form = new sfForm();
      $this->form->setWidgets(array(
          'mysql_host' => new sfWidgetFormInputText(),
          'mysql_user' => new sfWidgetFormInputText(),
          'mysql_password' => new sfWidgetFormInputPassword(),
          'backup_location' => new sfWidgetFormInputFile(),
          'backup_location' => new sfWidgetFormInputFile(),
      ));
      if($request->isMethod('post')){*/
          /* Backup the database */
          $mysql_user = $request->getParameter('mysql_user');
          $mysql_password = $request->getParameter('mysql_password');
          $mysql_host = $request->getParameter('mysql_password');
          $mysql_db = 'tmis';//$request->getParameter('mysql_db');
          $backup_location = sfConfig::get('sf_data_dir'). '/backup';//
          //$mysql_conn = mysql_connect($mysql_host, $mysql_username, $mysql_password);
          //mysql_select_db($mysql_db); // TODO err handling
          
          $backup_command = 'mysqldump -u'.$mysql_user.' -p'.$mysql_password.' '.$mysql_db.' > '.$backup_location.'/mybak_'.date('Ymd-His').'.sql';
          //$bak = system($backup_command);
          if ($bak)
              $this->status = 'Success'.$bak;
          else
              $this->status = 'fail'.$bak;

          /* Backup the application data (files) */
          //$source_loc = $request->getParameter('source_location');
          //$source_loc = 'C:/development/tmis/web/uploads/bulkupload';
          $source_loc = sfProjectConfiguration::guessRootDir().'\web\uploads\bulkupload';
          //sfConfig::get('back_source');
          //$backup_location = $request->getParameter('backup_location');
          //$root_dir =  sfProjectConfiguration::guessRootDir();
          //copy($source, $dest);      $dir = new DirectoryScanner();
          //$this->files=file('C:/development/tmis/web/uploads/bulkupload/test.txt');
          $zip = new ZipArchive();         
          $bak_filename = 'tmis_backup_'.date('Ymd-His').'.zip';
          //filetype($filename); // Return the type of the file to check if it is a directory
          $zip->open($backup_location.'/'.$bak_filename, ZipArchive::CREATE);
          //$files = array();
          $files=$this->processDir($source_loc);
          $zip->addFile($source_loc, 'zipfile.txt');
          $zip->close();
      //}
  }
  
  protected function processDir($dir)
  {
      $handle = opendir($dir);
      //$files = scandir($dir);
      while($file=readdir($handle)) {
          if ($file===false)
              return $files;
          elseif(!is_dir($dir.$file)) {
              //echo $file;
              $files[$dir.$file] = $dir.'/'.$file;
          } elseif ($file === '.' || $file === '..') {
              continue;
          } else {
              $this->processDir($dir.$file);
          }
      }
  }
  protected function processDir1($dir)
  {
      //$handle = opendir($dir);
      $files_list;
      $files = scandir($dir);
      foreach($files as $file) {
          if ($file===false)
              return $files_list;
          elseif(!is_dir($dir.$file)) {
              //echo $file;
              $files_list[$dir.$file] = $dir.'/'.$file;
          } elseif ($file === '.' || $file === '..') {
              continue;
          } else {
              $this->processDir($dir.$file);
          }
      }
  }
}
