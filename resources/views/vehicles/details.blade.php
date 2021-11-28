 <div>
   <h4>{{$data['vehicle']->name}} details</h4>
   <div>
      <p><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">&nbsp;{{Str::words(strip_tags($data['vehicle']->details), 15) }} &nbsp;</span><br></p>
   </div>
</div>