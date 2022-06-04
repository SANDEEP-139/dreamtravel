<?php
 //print_r($user);
    $n=0;
    if(!empty($contact)):
		foreach($contact as $values):
		$n++;
	?>
    <tr id="<?=$values->id?>">
	<td><?=$n?></td>
	<td><?php echo ucwords($values->name)?></a></td>
    <td><?= $values->email ?></td>  

    <td><?= $values->phone ?></td> 
    <td><?= $values->subject ?></td> 
   <!-- <td><?= $values->message ?></td> -->
    <td><?= date('d-m-Y',strtotime($values->created_date)); ?></td> 
    <td style="text-align:center;">
		<div class="btn-group">
			<button type="button" class="btn btn-danger btn-xs maction dropdown-toggle" data-toggle="dropdown">Action</button>
			<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li>
					<a href="javascript:void(null);" onclick="return deleterow('<?=strrev(BOOKNOW)?>','id','<?=$values->id?>');"><i class="fa fa-trash" aria-hidden="true" class="btn"></i>Delete </a>
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
	<td colspan="10"><center><b style="color: red;">No Record Available</b></center></td>
</tr>
<?php
	endif;
	echo $this->ajax_pagination->create_links(); 
?>



