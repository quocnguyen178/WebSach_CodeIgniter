<?php 
	if(isset($nxb)){
		foreach($nxb as $key => $val ){
			echo ($key+1).'-'.$val['manxb'].' - '. $val['tennxb'].'<br />';
		}
	}
	echo '<a href=http://localhost/Codeigniter/nhasanxuat/add>ADD</a>';