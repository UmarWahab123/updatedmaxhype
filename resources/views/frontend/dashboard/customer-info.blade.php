<table class="basic-table table-hover">
   <tbody>
      <tr>
         <td>First Name</td>
         <td>{{$data['results']->first_name}}</td>
      </tr>
      <tr>
         <td>Last Name</td>
         <td>{{$data['results']->last_name}}</td>
      </tr>
      <tr>
         <td>Email</td>
         <td>{{$data['results']->email}}</td>
      </tr>
      <tr>
         <td>Contact Number</td>
         <td>{{$data['results']->phone}}</td>
      </tr>
      <tr>
         <td>Address</td>
         <td>{{$data['results']->address}}</td>
      </tr>
      <tr>
         <td>Postal Code</td>
         <td>{{$data['results']->postal_code}}</td>
      </tr>
      <tr>
         <td>Status</td>
         <td>{{$data['results']->status}}</td>
      </tr>
   </tbody>
</table>