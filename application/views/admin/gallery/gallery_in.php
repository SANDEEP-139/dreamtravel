<?php
 //print_r($phase);die;
    $n=0;
    if(!empty($gallery)):
		foreach($gallery as $values):
		$n++;
		?>
    <tr id="<?=$values->id?>">
	<td><?=$n?></td>
    <td><?=ucfirst($values->title)?></td>
    <td><?= $values->description;?></td>
	<td><img src="<?php echo base_url($values->image)?>" width="50px"></td>
	
	<td style="width:100px; text-align:center;">		
	   <button onclick="return rowstatus('<?=GALLERY?>','id','<?=$values->id?>','status','<?=$values->status?>');"  title="Change Status" <?php if($values->status == '1'){ ?> class="btn btn-success btn-xs"> <?php echo "Active "; } else { ?> class="btn btn-primary btn-xs"><?php  echo "Inactive"; } ?>
		</button> 
	</td>

	<td><?php echo date('d-m-Y',strtotime($values->created_date))?></td>
	<td style="text-align:center;">
		<div class="btn-group">
			<button type="button" class="btn btn-danger btn-xs maction dropdown-toggle" data-toggle="dropdown">Action</button>
			<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
				
				
				<li>
					<a href="javascript:void(null);" onclick="return deleterowAll('<?=strrev(GALLERY)?>','id','<?=$values->id?>');"><i class="fa fa-trash" aria-hidden="true" class="btn"></i>Delete</a>
				</li>
				<li><a href="<?= base_url('admin/gallery/edit/'.$values->id)?>"><i class="fa fa-edit" aria-hidden="true" class="btn"></i>Edit</a></li>
			
				
			</ul>
		</div>	
	</td>

	
 </tr>
	<?php
		endforeach;
	else:

	?>
<tr>
	<td colspan="7"><center><b style="color: red;">No Record Available</b></center></td>
</tr>
<?php
	endif;
	echo $this->ajax_pagination->create_links(); 
?>



