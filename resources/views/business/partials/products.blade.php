      <table class="table dynamic_table font-weight-bold">
         <thead>
            <tr role="row">
               <th>Sr No</th>
               <th>Title</th>
               <th>Price</th>
               <th>Fee</th>
               <th>Total Tickets</th>
               <th>Refundable</th>
               <th>Image</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
         @foreach($data['products'] as $key=>$value)
            <tr>
               <td>{{$key+1}}</td>
               <td>{{$value->title}}</td>
               <td>{{$value->price}}</td>
               <td>{{$value->fee}}</td>
               <td>{{$value->total_tickets}}</td>
               <td>{{$value->refundable}}</td>
               <td><img src="{{url('/')}}/{{$value->product_dp}}" width="60" height="60"></td>
               <td>
               <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
               </button>
               <div class="dropdown-menu">
               <a class="dropdown-item add-product" data-id="{{$value->id}}" data-user="{{$value->business_id}}">
               <i data-feather="edit-2" class="mr-50"></i>
               <span>Edit</span>
               </a>
               <a data-id="{{$value->id}}" data-user="{{$value->business_id}}" class="dropdown-item del-product">
               <i data-feather="trash" class="mr-50"></i>
               <span>Delete</span>
               </a>
               </div>
               </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
