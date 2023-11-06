@extends('backend.layouts.layout')

@section('title','Accounting Management | Supply Chain')

@section('content')
<style type="text/css">
.invalid-feedback {
     font-size: 100%; 
}
.disabled:disabled{
  opacity:0.5;
  cursor: not-allowed; 
}

</style>

{{-- Content Start from here --}}
{{-- <div class="row mb-0">
  <div class="col-md-12 title-col">
    <div class="d-sm-flex justify-content-between">
      <h4 class="fontbold">ACCOUNTING</h4>
      <div class="mb-0">
        <a class="btn button-st" href data-toggle="modal" data-target="#addAccountingModal">
          Add Accounting
        </a>
      </div>
    </div>
  </div>
</div> --}}
<div class="row align-items-center mb-3">
  <div class="col-md-8 title-col">
      <h4 class="maintitle">ACCOUNTING</h4>
  </div>    
      <div class="col-md-4 text-right title-right-col">
       <a class="btn button-st" href data-toggle="modal" data-target="#addAccountingModal">
          Add Accounting
        </a>
  </div>
</div>

<div class="row entriestable-row mt-2">
  <div class="col-12">
    <div class="entriesbg bg-white custompadding customborder">

    <div class="table-responsive">
          <table class="table entriestable table-bordered table-accounting text-center">
              <thead>
                  <tr>
                      <th>Action</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th width="10%">Role</th>
                      <th width="15%">Status</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                  </tr>
              </thead>
               
          </table>
        </div>  
        </div>
    
  </div>
</div>

</div>
<!--  Content End Here -->

<!--  Purchasing Modal Start Here -->
<div class="modal fade" id="addAccountingModal">
    <div class="modal-dialog modal-dialog-centered parcelpop">
      <div class="modal-content">   
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div> 
        <div class="modal-body text-center">
          <h3 class="text-capitalize fontmed">Add Accounting</h3>
          <div class="mt-5">
          {!! Form::open(['method' => 'POST', 'class' => 'add-accounting-form']) !!}
            <div class="form-group">
              {!! Form::text('first_name', $value = null, ['class' => 'font-weight-bold form-control-lg form-control', 'placeholder' => 'First Name']) !!}
            </div>
            <div class="form-group">
              {!! Form::text('last_name', $value = null, ['class' => 'font-weight-bold form-control-lg form-control', 'placeholder' => 'Last Name']) !!}
            </div>
            
            <div class="form-group mb-4 pb-1">
              {!! Form::email('email', $value = null, ['class' => 'font-weight-bold form-control-lg form-control', 'placeholder' => 'Email']) !!}
            </div>
            <div class="form-submit">
              <input type="submit" value="add" class="btn btn-bg save-btn">
              <input type="reset" value="close" class="btn btn-danger close-btn">
            </div>
          {!! Form::close() !!}
         </div> 
        </div>
      </div>
    </div>
  </div>

<!-- Purchasing Modal End Here -->


@endsection

@section('javascript')
<script type="text/javascript">
  $(function(e){

    $(document).on("focus", ".datepicker", function(){
        $(this).datetimepicker({
            timepicker:false,
            format:'Y-m-d'});
    });
     $('.table-accounting').DataTable({
         processing: true,
        "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:#13436c;"></i><span class="sr-only">Loading...</span> '},
        ordering: false,
        serverSide: true,
        ajax: "{!! route('get-accounting') !!}",
        columns: [
            { data: 'action', name: 'action' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'roles.name', name: 'roles.name' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ],
         initComplete: function () {
            this.api().columns([1,2]).every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).addClass('form-control');
                $(input).attr('type', 'text');
                $(input).appendTo($(column.header()))
                .on('change', function () {
                    column.search($(this).val()).draw();
                });
            });

            this.api().columns([4]).every(function () {
                var column = this;
                var select = document.createElement("select");
                $(select).append('<option value="">All</option><option value="InActive">InActive</option><option value="Active">Active</option><option value="Suspended">Suspended</option>');
                $(select).addClass('form-control');
                $(select).appendTo($(column.header()))
                .on('change', function () {
                    column.search($(this).val()).draw();
                });
            });

            this.api().columns([5,6]).every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).attr('type', 'text');
                $(input).addClass('form-control');
                $(input).addClass('datepicker');
                $(input).appendTo($(column.header()))
                .on('change', function () {
                    column.search($(this).val()).draw();
                });
            });
        }
    });

    $(document).on('keyup', '.form-control', function(){
      $(this).removeClass('is-invalid');
      $(this).next().remove();
    });

    

    $(document).on('click', '.save-btn', function(e){
      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       $.ajax({
          url: "{{ route('add-accounting') }}",
          method: 'post',
          data: $('.add-accounting-form').serialize(),
          beforeSend: function(){
            $('.save-btn').val('Please wait...');
            $('.save-btn').addClass('disabled');
            $('.save-btn').attr('disabled', true);
          },
          success: function(result){
            $('.save-btn').val('add');
            $('.save-btn').attr('disabled', true);
            $('.save-btn').removeAttr('disabled');
            if(result.success === true){
              $('.modal').modal('hide');
              toastr.success('Success!', 'Accounting added successfully',{"positionClass": "toast-bottom-right"});
              $('.add-accounting-form')[0].reset();
              setTimeout(function(){
                window.location.reload();
              }, 2000);
              
            }
            
            
          },
          error: function (request, status, error) {
                $('.save-btn').val('add');
                $('.save-btn').removeClass('disabled');
                $('.save-btn').removeAttr('disabled');
                $('.form-control').removeClass('is-invalid');
                $('.form-control').next().remove();
                json = $.parseJSON(request.responseText);
                $.each(json.errors, function(key, value){
                    $('input[name="'+key+'"]').after('<span class="invalid-feedback" role="alert"><strong>'+value+'</strong>');
                     $('input[name="'+key+'"]').addClass('is-invalid');
                });
            }
        });
    });
  });
</script>
@stop

