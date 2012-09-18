<h1>Mp statuss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mp_statuss as $mp_status): ?>
    <tr>
      <td><a href="<?php echo url_for('status/show?id='.$mp_status->getId()) ?>"><?php echo $mp_status->getId() ?></a></td>
      <td><?php echo $mp_status->getName() ?></td>
      <td><?php echo $mp_status->getDescription() ?></td>
      <td><?php echo $mp_status->getStatusId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('status/new') ?>">New</a>
