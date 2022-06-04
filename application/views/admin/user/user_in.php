<?php
 //print_r($user);
    $n=0;
    if(!empty($user)):
		foreach($user as $values):
		$n++;
		?>
    <tr id="<?=$values->id?>">


	<td><?=$n?></td>
	
    
	<td><?php echo ucwords($values->name)?></a></td>
     <td><?php echo ucwords("Walking dead")?></a></td>
     

	<td><?=$values->email ?></td>
	<td><?=$values->phone ?></td>
	<td><?=$values->country ?></td>
	<td><?=$values->city ?></td>
	
	

	<td><?php echo date('Y-m-d',strtotime($values->created_date))?></td>

	<td style="width:100px; text-align:center;">		
	  <button onclick="return rowstatus('<?=USERS?>','id','<?=$values->id?>','status','<?=$values->status?>');"  title="Change Status" <?php if($values->status == '1' ){ ?> class="btn btn-success btn-xs"> <?php echo "Active "; } else { ?> class="btn btn-primary btn-xs"><?php  echo "Inactive"; } ?>
		</button>
	</td>
   <td style="text-align:center;">
		<div class="btn-group">
			<button type="button" class="btn btn-danger btn-xs maction dropdown-toggle" data-toggle="dropdown">Action</button>
			<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
				
				<li>
					<a href="<?= base_url('admin/user/edit/'.$values->id) ?>"><i class="fa fa-edit" aria-hidden="true" class="btn"></i>Edit </a>
				</li>
				<li>
					<a href="javascript:void(null);" onclick="return deleterow('<?=strrev(USERS)?>','id','<?=$values->id?>');"><i class="fa fa-trash" aria-hidden="true" class="btn"></i>Delete </a>
				</li>
				
			
				
			</ul>
		</div>	
	</td>


	
 </tr>
	<?php
		endforeach;
	else:

	?>
<tr>
	<td ><center><b style="color: red;">No Record Available</b></center></td>
</tr>
<?php
	endif;
	echo $this->ajax_pagination->create_links(); 
?>



