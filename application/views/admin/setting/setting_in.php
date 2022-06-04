<?php
 //print_r($user);
    $n=0;
    if(!empty($setting)):
		foreach($setting as $values):
		$n++;
	?>
    <tr id="<?=$values->id?>">
	<td><?=$n?></td>
	
    
	<td><?php echo ucwords($values->email)?></a></td>
    <td><?= $values->contact ?></td>   
     <td><img src="<?php echo base_url($values->logo);?>" width="100px"></td>  
   <td style="text-align:center;">
		<div class="btn-group">
			<button type="button" class="btn btn-danger btn-xs maction dropdown-toggle" data-toggle="dropdown">Action</button>
			<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
				
				<li>
					<a href="<?= base_url('admin/setting/edit/'.$values->id) ?>"><i class="fa fa-edit" aria-hidden="true" class="btn"></i>Edit </a>
				</li>
				<!-- <li>
					<a href="javascript:void(null);" onclick="return deleterow('<?=strrev(SETTING)?>','id','<?=$values->id?>');"><i class="fa fa-trash" aria-hidden="true" class="btn"></i>Delete </a>
				</li> -->
				
			
				
			</ul>
		</div>	
	</td>


	
 </tr>
	<?php
		endforeach;
	else:

	?>
<!-- <tr>
	<td colspan="6"><center><b style="color: red;">No Record Available</b></center></td>
</tr> -->
<?php
	endif;
	//echo $this->ajax_pagination->create_links(); 
?>



