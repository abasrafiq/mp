<h1>Mp gdps List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Dari description</th>
      <th>Hs code</th>
      <th>Level</th>
      <th>Parent</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mp_gdps as $mp_gdp): ?>
    <tr>
      <td><a href="<?php echo url_for('gdp/show?id='.$mp_gdp->getId()) ?>"><?php echo $mp_gdp->getId() ?></a></td>
      <td><?php echo $mp_gdp->getName() ?></td>
      <td><?php echo $mp_gdp->getDescription() ?></td>
      <td><?php echo $mp_gdp->getDariDescription() ?></td>
      <td><?php echo $mp_gdp->getHsCode() ?></td>
      <td><?php echo $mp_gdp->getLevel() ?></td>
      <td><?php echo $mp_gdp->getParentId() ?></td>
      <td><?php echo $mp_gdp->getStatusId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('gdp/new') ?>">New</a>
