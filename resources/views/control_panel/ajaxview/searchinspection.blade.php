<?php $role = Auth::guard('control_panels')->user()->role;  ?>
      

   
  
                   @forelse($vehicles as $rat)
				   
				  
				   
               <tr>
                     <td><?php echo $rat->stock_id; ?></td>
                     <td><?php echo $rat->Userid->name; ?></td>
					  <td><?php echo $rat->inspection_date; ?></td>
                     <td><?php echo $rat->status; ?></td>
			        
                    
                  
                  <td class="text-center">
				  
				  <?php 
				  if($role == 1)
				  {
				  
				  ?>
				  <a href="<?php echo url('control_panel/inspection/view/'.$rat->id);?>" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
				  <?php } ?>
				  
				  
				  <a href="inspection/{{$rat->id}}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                  
				  <a href="inspection/{{$rat->id}}/delete" onclick="javascript: return confirm('Are You Sure To Delete ?');" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                  
				  
				 
				  </td>
				  
				  
                </tr>
				
				@empty
				
				<tr>
				<p>No Record Found</p>
				
				</tr>
				
				
				
                 @endforelse
               
				 
                