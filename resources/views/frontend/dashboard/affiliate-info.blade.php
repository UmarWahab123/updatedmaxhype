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
            <td>Referral Code</td>
            <td>{{$data['results']->referral_code}}</td>
         </tr>
      </tbody>
   </table>