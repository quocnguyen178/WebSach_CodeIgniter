<table border = "1">
		<tr>
			<th>Mã </th>
			<th>Tên </th>
		</tr>
<?php 
if (isset($nxb) && count($nxb)){
	foreach($nxb as $key => $val){
		?>
		<tr>
			<td><?php echo $val['manxb']; ?> </td>
			<td><?php echo $val['tennxb']; ?> </td>
		</tr>
		<?php 
	}
}
?>
</table>