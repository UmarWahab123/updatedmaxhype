   <table class="table dynamic_table font-weight-bold table-bordered">
      <tbody>
         <tr>
           <td>Position Name</td>
           <td>{{isset($data['career']->position->position_name) ? $data['career']->position->position_name : ''}}</td>
         </tr>
         <tr>
           <td>Job Title</td>
           <td>{{$data['career']->title}}</td>
         </tr>
         <tr>
           <td>Country</td>
           <td>{{$data['career']->country}}</td>
         </tr>
         <tr>
           <td>City</td>
           <td>{{$data['career']->city}}</td>
         </tr>
          <tr>
           <td>Education</td>
           <td>{{$data['career']->education}}</td>
         </tr>
          <tr>
           <td>Total Positions</td>
           <td>{{$data['career']->total_position}}</td>
         </tr>
          <tr>
           <td>Salary Range</td>
           <td>{{$data['career']->salary}}</td>
         </tr>
         <tr>
           <td>Apply Last Date</td>
           <td>{{$data['career']->date}}</td>
         </tr>
           <tr>
           <td>Posted Date & Time</td>
           <td>{{$data['career']->created_at}}</td>
         </tr>
      </tbody>
   </table>
   <h5><u>Job Description</u></h5>
   <p>{{Str::words(strip_tags($data['career']->description), 15) }}</p>
  