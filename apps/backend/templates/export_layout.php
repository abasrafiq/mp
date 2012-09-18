<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    
    <link rel="shortcut icon" href="/favicon.ico" />
    
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo url_for('/js/jqplot/excanvas.js') ?>"></script><![endif]-->

    <title><?php  echo include_slot('title', 'Trade Management Information System') ?></title>    
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body style="background-color: white">
      <div style="background-color: white"><?php echo $sf_content ?></div>
      
  </body>
