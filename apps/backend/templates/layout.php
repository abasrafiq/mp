<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>

    <link rel="shortcut icon" href="/favicon.ico" />
    
    <title><?php echo include_slot('title', 'Monetary Policy') ?></title>
    <?php use_javascript('jquery.js') ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <center><div class="head_all">&nbsp;</div></center>
      <center><div id="menu"><?php include_component('core','menu')?></div></center>
      <br />
      <div>
          <div id="content">
              <div class="content">
              <table border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFF">
              	<tr>
                <td height="300px" width="1px">&nbsp;</td></td>
                <td width="999px" height="auto" valign="top"><?php echo $sf_content ?></td>
                </tr>
                </table>
              </div>
          </div>
          
          <div id="footer">
              Copyright(C) Ministry of Commerce and Industries | Developed by: <?php echo link_to('Best Tech', 'http://besttech.af')?>
          </div>
      </div>
  </body>
</html>
