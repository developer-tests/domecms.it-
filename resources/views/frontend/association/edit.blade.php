@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')
<style>
    .add-f{
        font-family: inherit;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.25;
        display: inline-block;
        /*width: 100%;*/
        /*margin: 0;*/
        margin: 0.5rem 0;
        /*padding: 1.5rem;*/
        cursor: pointer;
        text-align: left;
        vertical-align: middle;
        text-decoration: none;
        color: #32325d;
        border: 0;
        border-radius: 0.375rem;
        /*background-color: #f6f9fc;*/
    }
    .add-f i{
        font-size: 1.5rem;
        box-sizing: content-box;
        vertical-align: middle;
        color: #5e72e4;
    }
</style>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{__('Edit data:') }} {{$assoc->user->name}}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('association.save')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
<!--                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Council members') }}</h3>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('president') }}:</label>
                                                        <input class='form-control' type="text">{{$assoc->user->name }}
                                                </div>
                                            </div>
                                        </div><hr>-->

                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Basic Information') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Abbreviation Association') }}:</label>
                                                        <input type="text" class='form-control' name="name_asso_rid" style='float:right' value="{{$assoc->name_asso_rid }}"/>
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Association name') }}:</label>
                                                        <input class='form-control' name="name" type="text" value="{{$assoc->name }}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('CF') }}:</label>
                                                        <input class='form-control' type="text" name="cf" value="{{$assoc->cf}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('VAT P.') }}:</label>
                                                        <input class='form-control' type="text" name="vat_number" value="{{$assoc->vat_number}}">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Governing Council') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type='hidden' name='edit_id' id='edit_id' value='{{$assoc->id}}'/>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">{{__('Add Member')}}
                                                        </button>
                                                </div>
                                                <div class='append'>
                                                    @foreach($users as $vl)
                                                    <div class="col-md-4" style="max-width:100% !important">
                                                        <div class="alert alert-info alert-dismissible fade show " role="alert">
                                                        <div class="p-3 mb-2 text-white users" data-i="{{$vl->id}}" data-o="{{$vl->member_option}}">
                                                            {{$vl->name.' '.$vl->last_name.'('.date('Y-m-d', strtotime($vl->date_of_birth)).')'}}<br> 
                                                            {{$vl->member_option}}
                                                        </div>
                                                            <button type='button' class='btn close'data-dismiss='alert' id='remove_user' aria-label='Close'>
                                                            <span aria-hidden='true'>×</span>
                                                        </button>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div><hr>
                                        
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Texts') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Privacy Disclaimer Text') }}:</label>
                                                        <input class='form-control' type="text" name="text_privacy" value="{{$assoc->text_privacy}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Deduction text') }}:</label>
                                                        <input class='form-control' type="text" name="text_deduction" value="{{$assoc->text_deduction}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Free receipt text') }}:</label>
                                                        <input class='form-control' type="text" name="text_received_fee" value="{{$assoc->text_received_fee}}">
                                                </div>
                                                
                                            </div>
                                        </div><hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Contact details') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Via') }}:</label>
                                                        <input class='form-control' type="text" name="vat" value="{{$assoc->vat}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__("Citta'") }}:</label>
                                                        <input class='form-control' type="text" name="city" value="{{$assoc->city}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('CAP') }}:</label>
                                                        <input class='form-control' type="text" name="cap" value="{{$assoc->cap}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Country') }}:</label>
                                                        <input class='form-control' type="text" name="country" value="{{$assoc->country}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__("Province") }}:</label>
                                                        <input class='form-control' type="text" name="province" value="{{$assoc->province}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('E-Mail') }}:</label>
                                                        <input class='form-control' type="text" name="mail" value="{{$assoc->assoc_data->mail}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Cell phone') }}:</label>
                                                        <input class='form-control' type="text" name="cel" value="{{$assoc->assoc_data->cel}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__("Fax") }}:</label>
                                                        <input class='form-control' type="text" name="fax" value="{{$assoc->assoc_data->fax}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('PEC') }}:</label>
                                                        <input class='form-control' type="text" name="pec" value="{{$assoc->assoc_data->pec}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Page Web') }}:</label>
                                                        <input class='form-control' type="text" name="web" value="{{$assoc->assoc_data->web }}">
                                                </div>
                                            </div>
                                        </div><hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Additional Information') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Membership Fee €') }}:</label>
                                                        <input class='form-control' type="text" name="membership_fee" value="{{$assoc->assoc_data->membership_fee}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Start date YY') }}:</label>
                                                        <input class='form-control' type="text" name="start_year" value="{{$assoc->assoc_data->start_year}}">
                                                </div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Number of tickets available') }}:</label>
                                                        <input class='form-control' type="text" name="ticket" value="{{$assoc->assoc_data->ticket }}">
                                                </div>
                                                
                                            </div>
                                        </div><hr>
                                    </div>
                                    <div class="text-center">
                                        <input type="hidden" name="where_id" value="{{$assoc->id}}">
                                        <input type="submit" class="btn btn-success mt-4" value="Save"/>
                                        <input type="button" id="reset" class="btn btn-primary mt-4" value="Reset"/>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{__('Add Member')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <select class='form-control' name='member_option' id='member_option'>
              <option>{{__('Responsible for data processing')}}</option>
              <option>{{__('Secretary')}}</option>
              <option>{{__('Treasurer')}}</option>
              <option>{{__('Executive member')}}</option>
          </select>
        <input type='text' id='member_search' class='form-control' list='items'/>
        <datalist id="items"></datalist>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id='ok' class="btn btn-primary">{{__('ok')}}</button>
      </div>
    </div>
  </div>
</div>
<link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
<script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
<script>
$(document).ready(function () {
    var form = [];
    var users;
    var data_v;
    var member_option;
   $('input[type=text]').each(function(i,v){
       var node_name = v.name;
       var d = v.value;
       form.push({[node_name]:d});
   });
   
   $('#reset').on('click',function(){
        for (var key in form) {
            if (form.hasOwnProperty(key)) {
               if(form[key]){
                   for(var k in form[key]){
                       if(k){
                            $('input[name='+k+']').val(form[key][k]);  
                       }
                   }
               }
            }
        }
        
   });
   $('#member_search').on('change',function(){
       var search = $(this).val();
       if(search.length>2){
           $.ajax({
            url: "{{route('association.search')}}",
            method:'post',
            data:{_token:'{{csrf_token()}}',search:search},
            success: function(res){
              if(res.length>0){
                  var options;
                    for(var i=0;i < res.length;i++){
                        var dd = res[i].date_of_birth.split(' ')[0];
                        options += '<option data-hi-d="'+res[i].id+'" data-v="'+res[i].name +' '+res[i].last_name+' ('+ dd+')'+'">'+res[i].name +' '+res[i].last_name+' ('+ dd+')'+'</option>';
                    }
                    $('#items').empty();
                    $('#items').append(options);
              }
            }
          });
       }
   });
    $("body").on('input','#member_search', function () {
        var val = this.value;
        var userText = $(this).val();

        $("#items").find("option").each(function() {
            if ($(this).val() == userText) {
                users = $(this).attr('data-hi-d');
                data_v = $(this).attr('data-v');
                member_option = $('#member_option').val();
            }
        });
    });
    $('body').on('click','#ok',function(){
        $('#exampleModalCenter').modal('hide');
        $('#items').empty();
        $('#member_search').val('');
        var exist;
        $('.users').each(function(){
           if(($(this).attr('data-i') == users) && (member_option == $(this).attr('data-o'))){
               exist = true;
           }
        });
        if(!exist){
            $.ajax({
            url: "{{route('association.council_member')}}",
            method:'post',
            data:{_token:'{{csrf_token()}}',id:users,edit_id:$('#edit_id').val(),member_option:member_option},
            success: function(res){
                
            }
            });
            var append = "<div class='col-md-4' style='max-width:100% !important'><div class='alert alert-info alert-dismissible fade show ' role='alert'><div class='p-3 mb-2 text-white users' data-i="+users+" data-o="+member_option+">"+data_v+"<br>"+member_option+"</div><button type='button' class='btn close'data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div></div>"; 
            $('.append').append(append);
        }
    });
    $('body').on('click','#remove_user',function(){
    var usr = $(this).parent().children(0).attr('data-i');
        $.ajax({
            url: "{{route('association.council_member_remove')}}",
            method:'post',
            data:{_token:'{{csrf_token()}}',id:usr,edit_id:$('#edit_id').val()},
            success: function(res){
                
            }
            });
    })
});

</script>
@endsection