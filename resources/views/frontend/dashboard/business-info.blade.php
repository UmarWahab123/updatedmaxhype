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
         <td>{{isset($data['results']->countries) ? $data['results']->countries->location_country_name :''}}</td>
      </tr>
      <tr>
         <td>Business City</td>
         <td>{{isset($data['results']->cities) ? $data['results']->cities->location_city_name :''}}</td>
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
        <td>Business Address</td>
         <td>{{$data['results']->address}}</td>
      </tr>
      <tr>
         <td>Discount Code</td>
         <td>{{$data['results']->discount_code}}</td>
      </tr>
   </tbody>
</table>
 <div class="row">
    <div class="col-lg-12">
        <div class="section-title text-center">
            <h2>Business More Description</h2>
            <div class="section-icon section-icon-white">
                <i class="flaticon-diamond"></i>
            </div>       
        </div>
    </div>
<p>{{Str::words(strip_tags($data['results']->details), 200) }}</p>
</div>