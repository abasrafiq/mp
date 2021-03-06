<?php use_helper('JavascriptBase') ?>
<?php use_javascript('jquery.js') ?>
<?php include_javascripts() ?>


<form action="<?php echo url_for('gdprecord/single') ?>" method="post">
<!-- <input type="hidden" name="sf_method" value="put" /> -->
<table align="center" cellpadding="0" cellspacing="0" width="600px">
        <tr class="tableH">
            <td align="center" class="fontH">
                <b> Gdp Single Record</b>
            </td>
        </tr>
</table>
<table class="tableAll" align="center" cellpadding="0" cellspacing="0">
    <tbody class="tableAll">
        <?php echo $form->renderGlobalErrors() ?>
        <tr align="left">
            <th><?php echo $form['firstlevelGdp']->renderLabel() ?></th>
            <td><?php echo $form['firstlevelGdp']->renderError() ?></td>
            <td><?php echo $form['firstlevelGdp'] ?></td>
        </tr>        
        <tr align="left">
            <th><?php echo $form['secondlevelGdp']->renderLabel() ?></th>
            <td><?php echo $form['secondlevelGdp']->renderError() ?></td>
            <td><?php echo $form['secondlevelGdp'] ?></td>
        </tr>
        <tr align="left">
            <th><?php echo $form['thirdlevelGdp']->renderLabel() ?></th>
            <td><?php echo $form['thirdlevelGdp']->renderError() ?></td>
            <td><?php echo $form['thirdlevelGdp'] ?></td>
        </tr>
        <tr align="left">
            <th><?php echo $form['fourthlevelGdp']->renderLabel() ?></th>
            <td><?php echo $form['fourthlevelGdp']->renderError() ?></td>
            <td><?php echo $form['fourthlevelGdp'] ?></td>
        </tr>
       
        <tr align="left">
            <th><?php echo $form['unit']->renderLabel() ?></th>
            <td><?php echo $form['unit']->renderError() ?></td>
            <td><?php echo $form['unit'] ?></td>
        </tr>
         <tr align="left">
            <th><?php echo $form['year']->renderLabel() ?></th>
            <td><?php echo $form['year']->renderError() ?></td>
            <td><?php echo $form['year'] ?></td>
        </tr>
         <tr align="left">
            <th><?php echo $form['month']->renderLabel() ?></th>
            <td><?php echo $form['month']->renderError() ?></td>
            <td><?php echo $form['month'] ?></td>
        </tr>
        <tr align="left">
            <th><?php echo $form['value']->renderLabel() ?></th>
            <td><?php echo $form['value']->renderError() ?></td>
            <td><?php echo $form['value'] ?></td>
        </tr>
         <tr align="left">
            <th><?php echo $form['comments']->renderLabel() ?></th>
            <td><?php echo $form['comments']->renderError() ?></td>
            <td><?php echo $form['comments']; ?></td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>

    </tbody>
    <tfoot align="center">
        <tr><td colspan="3"><input type="submit" value="  Save  "/></td></tr>
    </tfoot>
</table> 
</form>

<script type="text/javascript">
    $('#gdprecord_firstlevelGdp').change(function(){
        
            txt=$("#gdprecord_firstlevelGdp").val();
        $.getJSON("<?php echo url_for('gdprecord/children') ?>", {gdp:txt}, func);
        
        function func(result) {
            //$('#output').html('Name: '+result);
            $('#gdprecord_secondlevelGdp').empty();
            $('#gdprecord_thirdlevelGdp').empty();
            $('#gdprecord_thirdlevelGdp').append('<option value="<?php echo sfConfig::get('app_mp_default_value') ?>">'+'<?php echo sfConfig::get("app_mp_combo_default")?>'+'</option>');
            $('#gdprecord_fourthlevelGdp').empty();
            $('#gdprecord_fourthlevelGdp').append('<option value="<?php echo sfConfig::get('app_mp_default_value') ?>">'+'<?php echo sfConfig::get("app_mp_combo_default")?>'+'</option>');          
            $('#gdprecord_secondlevelGdp').append('<option value="<?php echo sfConfig::get('app_mp_default_value') ?>">'+'<?php echo sfConfig::get("app_mp_combo_default")?>'+'</option>');
            $.each(result, function(i, comm){
                $('#gdprecord_secondlevelGdp').append('<option value='+comm.key+'>'+comm.value+'</option>');
            });
        }
    });
    
    $('#gdprecord_secondlevelGdp').change(function(){
        
        var txt=$("#gdprecord_secondlevelGdp").val();
        $.getJSON("<?php echo url_for('gdprecord/children') ?>", {gdp:txt}, func1);
        
        function func1(result) {
            //$('#output').html('Name: '+result);
            $('#gdprecord_thirdlevelGdp').empty();
            $('#gdprecord_fourthlevelGdp').empty();
            $('#gdprecord_fourthlevelGdp').append('<option value="<?php echo sfConfig::get('app_mp_default_value') ?>">'+'<?php echo sfConfig::get("app_mp_combo_default")?>'+'</option>');
            $('#gdprecord_thirdlevelGdp').append('<option value="<?php echo sfConfig::get('app_mp_default_value') ?>">'+'<?php echo sfConfig::get("app_mp_combo_default")?>'+'</option>');
            $.each(result, function(i, comm){
                $('#gdprecord_thirdlevelGdp').append('<option value='+comm.key+'>'+comm.value+'</option>');
            });
        }
    });

    $('#gdprecord_thirdlevelGdp').change(function(){
        
        var txt=$("#gdprecord_thirdlevelGdp").val();
        $.getJSON("<?php echo url_for('gdprecord/children') ?>", {gdp:txt}, func2);
        
        function func2(result) {
            //$('#output').html('Name: '+result);
            $('#gdprecord_fourthlevelGdp').empty();
            $('#gdprecord_fourthlevelGdp').append('<option value="<?php echo sfConfig::get('app_mp_default_value') ?>">'+'<?php echo sfConfig::get("app_mp_combo_default")?>'+'</option>');
            $.each(result, function(i, comm){
                $('#gdprecord_fourthlevelGdp').append('<option value='+comm.key+'>'+comm.value+'</option>');
            });
        }
    });

</script>
<div id="output"></div>