
  @foreach($all_detail as $info)
  <tr class="updatedRow_{{$info->id}}"> 
      <td>{{$loop->iteration}}</td>
      <td>{{$info->vat_from_usd}}</td>
      <td>{{$info->vat_to_usd}}</td>
      <td>{{$info->multiplier_usd}}</td>
      <td>
      <button class="btn btn-success" id="editRow" onclick="editRow({{$info->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
      <button class="btn btn-danger" id="deleteRow" onclick="deleteRow({{$info->id}})"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
      </td>
    </tr>
    <tr class="editrowdisplay editedRow_{{$info->id}}">
			 <td> 
       <input type="text" readonly class="form-control" id="loop_id_{{$loop->iteration}}" value="{{$loop->iteration}}" />
       <input type="hidden"class="form-control edittemp_id_{{$info->id}}"  id="edittemp_id_{{$info->id}}" value="{{$info->id}}" />
       <input type="hidden" class="form-control editParenttemp_id_{{$info->id}}"  id="editParenttemp_id_{{$info->id}}" value="{{$info->temp_id}}" />
       </td>
			  <td><input type="text" value="{{$info->vat_from_usd}}" class="form-control editvat_from_usd_{{$info->id}}" id="editvat_from_usd_{{$info->id}}" /></td>
			  <td><input type="text" value="{{$info->vat_to_usd}}" class="form-control editvat_to_usd_{{$info->id}}" id="editvat_to_usd_{{$info->id}}" /></td>
			  <td><input type="text" value="{{$info->multiplier_usd}}" class="form-control editmultiplier_usd_{{$info->id}}" id="editmultiplier_usd_{{$info->id}}" /></td>
			  <td>
			  <button id="updateRow" class="btn btn-primary" onclick="updateRow({{$info->id}})"> <i class="fa fa-pencil" aria-hidden="true"></i>  UPDATE</button>
			  </td>
			</tr>
  @endforeach
  </tbody>