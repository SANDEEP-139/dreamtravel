<?php
 //print_r($phase);die;
    $n=0;
    if(!empty($project_image)):
		foreach($project_image as $values):
		$n++;
		
		?>
    <tr id="<?=$values->id?>">
	<td><?=$n?></td>
    
	<td><img src="<?php echo base_url($values->image)?>" width="50px" height="60px"></td>
   <!--  <td><?= $values->price?></td> -->
    <!-- <td><?php  

    //echo getUnitname($values->unit_name); ?>
    	
    </td> -->
	<td style="width:100px; text-align:center;">		
	   <button onclick="return rowstatus('<?=PROJECTIMAGE?>','id','<?=$values->id?>','status','<?=$values->status?>');"  title="Change Status" <?php if($values->status == '1'){ ?> class="btn btn-success btn-xs"> <?php echo "Approved "; } else { ?> class="btn btn-primary btn-xs"><?php  echo "Unapproved"; } ?>
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
				<a href="javascript:void(null);" onclick="return deleterowAll('<?=strrev(PROJECTIMAGE)?>','id','<?=$values->id?>');"><i class="fa fa-trash" aria-hidden="true" class="btn"></i>Delete</a>
				</li>
				
			   <li><a href="javascript:void(0)" onClick="show_post('<?php echo $values->id ?>','<?php echo $values->image_type ?>')" data-toggle="modal" data-target="#editModal" data-image="<?php echo $values->image ?>" id="editid<?php echo $values->id ?>"><i class="fa fa-edit" aria-hidden="true" class="btn"></i>Edit</a>
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
	//echo $this->ajax_pagination->create_links(); 
?>

<div class="modal fade" id="editModal">
    <div class="modal-dialog modalstyle">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Package Image Edit</h4>
        </div>
        <form action="<?php echo base_url('admin/project/editimage')?>" enctype="multipart/form-data" method="post">
        <div class="modal-body form-group">
        	 <div class="row">
          	<div class="col-md-12">
          		<input type="file" name="imgname">
          	</div>
          </div>
         
          <br>
          <img src="" class="img-responsive postimg" style="max-height:250px;" id="image"><br>
          <input type="hidden" name="img" id="oldpic">
          <input type="hidden" id="projimageid" name="cat_id">
          <input type="hidden" name="projectids" value="<?php echo $projetct_id;?>">
           <div class="row">
            <div class="col-md-12">
              <select name="imgtype" id="imgtype" class="form-control" required="required">
              
         
                <option value="2">Optional</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer ">
          <button type="submit" class=" btn btn-success col-sm-3 pull-right">Update</button></span>
        </div>
    </form>
      </div>      
    </div>
  </div>  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  function show_post(id,imgtype)
  {
    var image=$('#editid'+id).data('image');
    $('#oldpic').val(image);
    $('#projimageid').val(id);
    $("#imgtype option[value=" + imgtype+"]").attr("selected","selected") ;
    $("#image").attr('src','<?php echo base_url()?>/'+image);
  }
</script>

