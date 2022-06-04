<?php
 //print_r($user);
    $n=0;
    if(!empty($blog)):
		foreach($blog as $values):
		$n++;
	
		?>
    <tr id="<?=$values->id?>">
	<td><?=$n?></td>
	
    <td><?php echo $values->blog_title;?></td>
	<td><?= date('d-m-Y',strtotime($values->blog_date))?></td>
	<td>
	    <?php if($values->image){?>
	  <a href="<?= base_url($values->image) ?>" target="_blank"><img src="<?php echo base_url('/').$values->image ?> " height="50" width="50"></a>
	    <?php } else{?>
	     <img src="<?= base_url('assets/default_img.jpeg')?>" height="50" width="50" style="border-radius:25px" title="No Image">
	    <?php } ?>
	    </td>
	    <td><?= date('d-m-Y',strtotime($values->created_date))?></td>
	<td style="width:100px; text-align:center;">		
	  <button onclick="return rowstatus('<?=BLOG?>','id','<?=$values->id?>','status','<?=$values->status?>');"  title="Change Status" <?php if($values->status == '1' ){ ?> class="btn btn-success btn-xs"> <?php echo "Active "; } else { ?> class="btn btn-primary btn-xs"><?php  echo "Inactive"; } ?>
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
					<a href="<?= base_url('admin/blog/edit/'.$values->id) ?>"><i class="fa fa-edit" aria-hidden="true" class="btn"></i>Edit </a>
				</li>
				<li>
					<a href="javascript:void(null);" onclick="return deleterow('<?=strrev(BLOG)?>','id','<?=$values->id?>');"><i class="fa fa-trash" aria-hidden="true" class="btn"></i>Delete </a>
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
	<td colspan="7"><center><b style="color: red;">No Record Available</b></center></td>
</tr>
<?php
	endif;
	echo $this->ajax_pagination->create_links(); 
?>



