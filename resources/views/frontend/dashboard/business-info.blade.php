  <table class="basic-table table-hover">
   <tbody>
      <tr>
         <td>Owner Name</td>
         <td>{{$data['results']->owner_name}}</td>
      </tr>
      <tr>
         <td>Business Name</td>
         <td>{{$data['results']->name}}</td>
      </tr>
      <tr>
         <td>Business Website Link</td>
         <td>{{$data['results']->site_link}}</td>
      </tr>
      <tr>
         <td>Business Type</td>
         <td>{{$data['results']->type}}</td>
      </tr>
      <tr>
         <td>Business Email</td>
         <td>{{$data['results']->email}}</td>
      </tr>
      <tr>
         <td>Business Phone</td>
         <td>{{$data['results']->phone}}</td>
      </tr>
      <tr>
         <td>Business Country</td>
         <td>{{$data['results']->country}}</td>
      </tr>
      <tr>
         <td>Business City</td>
         <td>{{$data['results']->city}}</td>
      </tr>
      <tr>
         <td>Available ZipCode</td>
         <td>{{$data['results']->postal_code}}</td>
      </tr>
      </tr>
      <tr>
         <td>Discount</td>
         <td>{{$data['results']->discount}}</td>
      </tr>
      <tr>
         <td>Discount Code</td>
         <td>{{$data['results']->discount_code}}</td>
      </tr>
      <tr>
         <td>Status</td>
         <td>{{$data['results']->status}}</td>
      </tr>
   </tbody>
</table>