      <table class="basic-table table-hover">
         <thead>
            <tr role="row">
               <th>Sr No</th>
               <th>Title</th>
               <th>Description</th>
               <th>Price</th>
               <th>Fee</th>
               <th>Total</th>
               <th>File</th>
               @if($data['type'] =='business') 
               <th>Action</th>
               @endif
            </tr>
         </thead>
         <tbody>
            @foreach($data['products'] as $key=>$value)
            <tr class="current-row">
               <td>{{$key+1}}</td>
               <td>{{$value->title}}</td>
               <td>{{Str::words(strip_tags($value->description), 5) }}</td>
               <td>{{$value->price}}</td>
               <td>{{$value->fee}}</td>
               <td>{{$value->total_tickets}}</td>
              <td><img src="{{url('/')}}/{{$value->product_dp}}" style="width:60px !important;height:60px !important"></td>
               @if(Auth::user()->id==$value->business_id)
               @if($data['type'] =='business') 
               <td class="dsdsdsdsad mt-2" style="display: flex;">
                 <a href="javascript:void(0)" class="button bg-primary add-product mr-1" data-id="{{$value->id}}" data-user="{{$value->business_id}}">Edit</a>
                 <a href="javascript:void(0)" data-id="{{$value->id}}" data-user="{{$value->business_id}}" class="button bg-danger del-product">Delete</a>
             </td>
             @endif
             @endif
            </tr>
            @endforeach
        </tbody>
      </table>


   