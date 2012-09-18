<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $mp_status->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $mp_status->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $mp_status->getDescription() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $mp_status->getStatusId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('status/edit?id='.$mp_status->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('status/index') ?>">List</a>
