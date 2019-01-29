
<table border="1px">
  <?php foreach($sach as $arr){ ?>
  <tr>
    <td><?php echo $arr['tensach']; ?></td>
    <td><img src="<?php echo public_url(); ?>/products-images/<?php echo $arr['urlhinh']; ?>" /></td>
    <td><?php echo $arr['masach']; ?></td>
  </tr>
  <?php } ?>
</table>
