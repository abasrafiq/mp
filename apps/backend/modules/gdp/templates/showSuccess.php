<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $mp_gdp->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $mp_gdp->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $mp_gdp->getDescription() ?></td>
    </tr>
    <tr>
      <th>Dari description:</th>
      <td><?php echo $mp_gdp->getDariDescription() ?></td>
    </tr>
    <tr>
      <th>Hs code:</th>
      <td><?php echo $mp_gdp->getHsCode() ?></td>
    </tr>
    <tr>
      <th>Level:</th>
      <td><?php echo $mp_gdp->getLevel() ?></td>
    </tr>
    <tr>
      <th>Parent:</th>
      <td><?php echo $mp_gdp->getParentId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $mp_gdp->getStatusId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('gdp/edit?id='.$mp_gdp->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('gdp/index') ?>">List</a>
