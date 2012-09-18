<form action="<?php echo url_for('gdprecord/query') ?>" method="post" name="form">
<table class="table_content" cellpadding="0" cellspacing="0" width="990px">
    <thead></thead>
    <tfoot></tfoot>
    <tbody>
        <tr class="QeuryBG">
            <th><label for="gdp">Gdp</label></th>
            <td>
                <select name="gdp">
                    <option value="<?php echo sfConfig::get('app_mp_default_value') ?>"><?php echo sfConfig::get('app_mp_default_gdp') ?></option>
                    <?php foreach ($gdps as $gdp_key=>$gdp_value): ?>
                    <option value="<?php echo $gdp_key ?>"><?php echo $gdp_value?></option>
                    <?php endforeach;?>
                </select>
            </td>
        
            <th><label for="year">from</label></th>
            <td>
                <select name="year">
                    <?php foreach ($years as $year_key=>$year_value): ?>
                    <option value="<?php echo $year_key ?>"><?php echo $year_value?></option>
                    <?php endforeach;?>
                </select>
            </td>
            
            
            <td>
                <select name="month">
                    <?php foreach ($months as $month_key=>$month_value): ?>
                    <option value="<?php echo $month_key ?>"><?php echo $month_value?></option>
                    <?php endforeach;?>
                </select>
            </td>
           
            <td><input type="submit" value="Search"/></td>
        </tr>
    </tbody>
</table>
</form>
<div id="headercontent_separator"><img alt="" src="/images/separator.png" /></div>
<br />
<table class="table_content" cellpading="0" cellspacing="0" width="950px" align="center">
<thead>
    <tr class="QeuryBG">
      <th width="400px"  align="left">Gdp</th>
      <th width="50px" align="left">Year</th>
      <th width="50px" align="left">month</th>
      <th width="100px" align="left">Unit</th>
      <th width="400px" align="left">Value</th>
    
    </tr>
  </thead>
  <tbody>

    <?php if(count($mp_gdp_records)>0): ?>
    <?php foreach ($mp_gdp_records as $mp_gdp_record): ?>
      <?php $report_ids[$mp_gdp_record->getId()] = $mp_gdp_record->getId()?>
    <tr>
      <td><?php echo $mp_gdp_record->getMpGdp() ?></td>
      <td><?php echo $mp_gdp_record->getYear() ?></td>
      <td><?php echo $mp_gdp_record->getMonth() ?></td>
      <td><?php echo $mp_gdp_record->getMpUnit() ?></td>
      <td><?php echo $mp_gdp_record->getValue() ?></td>
    </tr>
    <tr>
        <td colspan="10"><hr /></td></tr>
    <?php endforeach; ?>
    <?php endif ?>
    <tr>
        <td><?php echo "selected one" ?></td>
        <td><?php echo "s year" ?></td>
        <td><?php echo "s month" ?></td>
        <td><?php echo "s unit" ?></td>
        <td><?php echo "Total Value" ?></td>
    </tr>
  </tbody> 
</table>
<center>
<center>
  <a href="<?php echo url_for('/backend.php/export/gdpRecord') ?>">Export To Excel</a>
  <?php //echo link_to('Excellllll', 'export/commodityRecord', $tmis_commodity_records) ?>
<?php // include_component('export', 'commodityRecord', array('comrec'=>$tmis_commodity_records)); ?></center>