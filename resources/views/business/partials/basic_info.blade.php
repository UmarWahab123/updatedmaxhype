        <div class="row">
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Owner First Name</label>
                     <input type="text" name="first_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->first_name) ? $data['results']->first_name : '')}}" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Owner Last Name</label>
                     <input type="text" name="last_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->last_name) ? $data['results']->last_name : '')}}" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Name</label>
                     <input type="text" name="name" class="form-control m-input m-input--square" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Email</label>
                     <input type="email" name="email" class="form-control m-input m-input--square" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Website</label>
                     <input type="text" name="site_link" class="form-control m-input m-input--square" value="{{(isset($data['results']->site_link) ? $data['results']->site_link : '')}}">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Type</label>
                     <select name="type" class="form-control" data-option-id="{{(isset($data['results']->type) ? $data['results']->type : '')}}" required>
                        <option value="">Select</option>
                        <option>Restaurants</option>
                        <option>Bar & Stores</option>
                        <option>Vehicles-ATV-Bikes-Boats-JetSkis</option>
                        <option>Adult Entertainment</option>
                        <option>Medical Marijuana & CBD</option>
                        <option>Adventure</option>
                        <option>Afrobeats</option>
                        <option>Sky Diving</option>
                        <option>Movie Theaters & Hotels</option>
                        <option>Clubs</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Country</label>
                     <select name="country" class="form-control country" data-option-id="{{(isset($data['results']->country) ? $data['results']->country : '')}}" required>
                        <option value="">Select</option>
                        @foreach($data['country'] as $key=>$value)
                        <option class="test" value="{{$value->id}}">{{$value->location_country_name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
                 <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business City</label>
                     <select name="city" class="form-control city" data-option-id="{{(isset($data['results']->city) ? $data['results']->city : '')}}" required>
                        <option value="">Select</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Zip Code</label>
                     <input type="text" name="postal_code" class="form-control m-input m-input--square zipcode" value="{{(isset($data['results']->postal_code) ? $data['results']->postal_code : '')}}">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Phone#</label>
                     <input type="tel" name="phone" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}" required>
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Address</label>
                     <input type="text" name="address" class="form-control m-input m-input--square" value="{{(isset($data['results']->address) ? $data['results']->address : '')}}" required>
                  </div>
               </div>
              <div class="col-md-6">
              <div class="form-group m-form__group">
                 <label>Password</label>
               <input type="password" placeholder="{{(isset($data['results']->id) ? 'Type in to update password' : '')}}" name="password" class="form-control password m-input m-input--square" value="">
             </div>
              </div>
           </div>
              <div class="row">
               <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Discount</label>
                     <select name="discount" class="form-control" data-option-id="{{(isset($data['results']->discount) ? $data['results']->discount : '')}}">
                        <option value="">Select</option>
                        <option>1%</option>
                        <option>2%</option>
                        <option>5%</option>
                        <option>6%</option>
                     </select>
                  </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Discount Code</label>
                     <input type="text" name="discount_code" class="form-control m-input m-input--square" value="{{(isset($data['results']->discount_code) ? $data['results']->discount_code : '')}}">                          
                  </div>
               </div>
            </div>
            <div class="row">
              
               <div class="col-md-4">
                  <div class="form-group m-form__group">
                     <label>Status</label>
                     <select name="status" class="form-control" data-option-id="{{(isset($data['results']->status) ? $data['results']->status : '')}}" required>
                        <option value="">Select</option>
                        <option>Accepted</option>
                        <option>Rejected</option>
                        <option>Pending</option>
                     </select>
                  </div>
               </div>
                <div class="col-md-4">
                  <div class="form-group m-form__group">
                     <label>Features</label>
                     <select name="feature" class="form-control" data-option-id="{{(isset($data['results']->feature) ? $data['results']->feature : '')}}">
                        <option value="">Select</option>
                        <option>Reservation</option>
                        <option>Purchase</option>
                     </select>
                  </div>
               </div>
                <div class="col-md-4">
                  <div class="form-group m-form__group">
                     <label>Affiliate</label>
                     <select name="affiliate_id" class="form-control" data-option-id="{{(isset($data['results']->affiliate_id) ? $data['results']->affiliate_id : '')}}">
                        <option value="">Select</option>
                        @foreach($data['affiliate'] as $key=>$value)
                        <option class="test" value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group m-form__group">
                     <label>Map Iframe</label>
                     <textarea type="text" name="map" rows="5" class="form-control m-input m-input--square">{{(isset($data['results']->map) ? $data['results']->map : '')}}</textarea>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group m-form__group">
                     <label>Business More Details</label>
                     <textarea type="text" name="details" rows="10" class="form-control m-input m-input--square">{{(isset($data['results']->details) ? $data['results']->details : '')}}</textarea>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="form-group" >
                     <label>
                     Upload Single File
                     </label>
                     <div  action="{{url('admin/upload_file?url=-public-uploads-business') }}" class="dropzone" id="dropzoneupload">
                        <div class="dz-message">Drop files here or click to upload.</div>
                     </div>
                  </div>
               </div>
               <input type="hidden" name="dp" class="form-control m-input m-input--square" value="{{(isset($data['results']->dp) ? $data['results']->dp : '')}}">
            </div>
            <img src="{{isset($data['results']->dp) ?url('/').''. $data['results']->dp:''}}" width="90" height="80">
              
              <div class="row">
               <div class="col-lg-12">
                  <div class="form-group" >
                     <br>
                     <label>
                     Upload Multiple Files
                     </label>
                     <div action="{{url('/admin/uploadImage')}}" class="dropzone " id="dpzremovethumb">
                    <div class="dz-message">Drop files here or click to upload.</div>
                   </div>
                  </div>
               </div>
              <input type="hidden" name="images" class="form-control m-input m-input--square" value="">

            <input class="form-control" name="old_images" type="hidden" value="{{(isset($data['results']->images) ? $data['results']->images : '')}}">  
            </div>
            <div class="row">
             @if(isset($data['results']->images)&& !empty($data['results']->images))
               @foreach(json_decode($data['results']->images) as $row)
               <div class="col-md-2">
                  <img src="{{url('/')}}/{{$row}}" alt="" class="pimg" width="100px" height="150px">
               </div>
               @endforeach
               </div>
               @endif