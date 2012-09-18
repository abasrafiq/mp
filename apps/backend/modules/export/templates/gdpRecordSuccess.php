<table class="table_content" width="950px">
    <thead>
        <tr class="QeuryBG"><td colspan="9"><div class="excel_heading">Trade Management Information System</div></td></tr>
        <tr class="QeuryBG"><td colspan="9"><div class="excel_heading">Gdp Records Report</div></td></tr>
    </thead>
    <tbody>
        <?php foreach($mp_gdp_records as $mp_gdp_record): ?>
        <tr class="QeuryBG">
            <td><?php echo $mp_gdp_record->getMpGdp() ?></td>
           <td><?php echo $mp_gdp_record->getYear() ?></td>
            <td><?php echo $mp_gdp_record->getMonth() ?></td>
            <td><?php echo $mp_gdp_record->getMpUnit() ?></td>
            <td><?php echo $mp_gdp_record->getValue() ?></td>
      
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
