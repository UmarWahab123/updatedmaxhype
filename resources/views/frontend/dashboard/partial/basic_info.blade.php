<div id="home" class="tab-pane active">
@if(Auth::user()->id==$data['results']->id)
@if($data['type'] =='business')
<button class="btn-blue btn-red reserve text-white mr-4 edit-info">Edit Info</button><br><br>
@endif
@endif
<div class="row">
   <div class="col-lg-12 col-md-12 col-xs-12 traffic">
      <div class="dashboard-list-box">
         <!-- Edit form-->
         <form class="info-edit d-none" enctype="multipart/form-data">
             {{ csrf_field() }}
              <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
             <input class="form-control" name="role_id" type="hidden" value="3">
             <div class="mb-3">    
                <button type="submit" class="btn-blue btn-red mb-1 mb-sm-0 mr-0 mr-sm-1 save-info">Save Changes</button>
                <a class="btn btn-secondary text-white back-rev">Back</a>
             </div>
             <div class="card mr-5">
                <div class="card-body">
                   <div class="col-md-12">
                      <div class="row">
                         <div class="col-md-6">
                         <div class="form-group m-form__group">
                           <label>Owner First Name</label>
                           <input type="text" name="first_name" class="form-control" value="{{(isset($data['results']->first_name) ? $data['results']->first_name : '')}}">
                            </div>
                         </div>
                          <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Owner Last Name</label>
                               <input type="text" name="last_name" class="form-control" value="{{(isset($data['results']->last_name) ? $data['results']->last_name : '')}}">
                            </div>
                         </div>
                        </div>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Business Name</label>
                               <input type="text" name="name" class="form-control" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Business Website</label>
                               <input type="text" name="site_link" class="form-control" value="{{(isset($data['results']->site_link) ? $data['results']->site_link : '')}}">
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Business Type</label>
                               <select name="type" class="form-control" data-option-id="{{(isset($data['results']->type) ? $data['results']->type : '')}}">
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
                         <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Business Country</label>
                               <select name="country" class="form-control country" data-option-id="{{(isset($data['results']->country) ? $data['results']->country : '')}}">
                                  <option value="">Select</option>
                                  @foreach($data['country'] as $key=>$value)
                                  <option class="test" value="{{$value->id}}">{{$value->location_country_name}}</option>
                                  @endforeach
                               </select>
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Business Email</label>
                               <input type="email" name="email" class="form-control" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
                            </div>
                         </div>
                          <div class="col-md-6">
                            <div class="form-group m-form__group">
                             <label>Business City</label>
                            <select name="city" class="form-control city" data-option-id="{{(isset($data['results']->city) ? $data['results']->city : '')}}">
                               </select>
                            </div>
                         </div>
                      </div>
                        <div class="row">
                           <div class="col-md-6 otherinput d-none">
                            <div class="form-group m-form__group">
                                   <label>Other City</label>
                             <input type="text" name="other_city" class="form-control ">
                            </div>
                        </div>
                     </div>
                      <div class="row">
                         <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Business Phone#</label>
                               <input type="tel" name="phone" class="form-control" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Zip Code</label>
                               <input type="text" name="postal_code" class="form-control zipcode" value="{{(isset($data['results']->postal_code) ? $data['results']->postal_code : '')}}">
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
                               <input type="text" name="discount_code" class="form-control" value="{{(isset($data['results']->discount_code) ? $data['results']->discount_code : '')}}">                          
                            </div>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Business Address</label>
                               <input type="text" name="address" class="form-control zipcode" value="{{(isset($data['results']->address) ? $data['results']->address : '')}}">
                            </div>
                         </div>
                          <div class="col-md-6">
                            <div class="form-group m-form__group">
                               <label>Features</label>
                               <select name="feature" class="form-control" data-option-id="{{(isset($data['results']->feature) ? $data['results']->feature : '')}}">
                                  <option value="">Select</option>
                                  <option>Reservation</option>
                                  <option>Purchase</option>
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
                               <textarea type="text" name="details" rows="10" class="form-control" required>{{(isset($data['results']->details) ? $data['results']->details : '')}}</textarea>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </form>
    <!-- End form -->
   <div class="info-table">
      <h4 class="gray">Basic Business Information</h4>
      <div class="table-box business-info">
     @include('frontend.dashboard.business-info')
   </div>
</div>
</div>
</div>
</div>
</div>
