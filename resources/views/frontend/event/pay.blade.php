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
                        <h3 class="col-12 mb-0">{{__('New') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form >
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div id="tutor_div">
                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Summary information') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Member Name">{{__('Member Name') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control " value="{{$user->phyTest[0]->first_name}}" placeholder="{{__('Member Name') }}" readonly />
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Event Name">{{__('Event Name') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control " value="{{$event->name}}" placeholder="{{__('Event Name') }}" readonly />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="Registration date">{{__('Registration date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control " value="{{$user->acceptance_date}}" placeholder="{{__('Registration date') }}"readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="Installments paid until">{{__('Installments paid until') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control " value="" placeholder="{{__('Installments paid until') }}" readonly />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div><hr>

                                           
                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Additional Information') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Weekly payment">{{__('Weekly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <select id="week_payment" class="form-control payment_types" >
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Monthly payment">{{__('Monthly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <select id="month_payment" class="form-control payment_types" >
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Bimonthly payment">{{__('Bimonthly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                 <select id="bimonth_payment" class="form-control payment_types" >
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Quartely payment">{{__('Quartely payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                 <select id="quarter_payment" class="form-control payment_types" >
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Six month payment">{{__('Six month payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                 <select id="six_month" class="form-control payment_types" >
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Annual payment">{{__('Annual payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                 <select id="annual_payment" class="form-control payment_types" >
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="only">{{__('Only') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                 <select id="only" class="form-control payment_types" >
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="exemption" name="exemption"  type="checkbox">
                                                            <label class="custom-control-label" for="exemption">{{__('Exemption') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Discount %">{{__('Discount %') }}</label>
                                                            <div  class="form-group custom-control-inline" style="width:100%">
                                                                <input id="discount" type="text" class="form-control "  placeholder="{{__('Discount %') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Total">{{__('Total') }}</label>
                                                            <div  class="form-group custom-control-inline" style="width:100%">
                                                                <input id="total" type="text" class="form-control " value="" placeholder="{{__('Total') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                 <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Payment Method">{{__('Payment Method') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                 <select id="payment_method" class="form-control" >
                                                                    <option value="cash">Cash</option>
                                                                    <option value="check">Check</option>
                                                                    <option value="transfer">Transfer</option>
                                                                    <option value="postal order">Postal Order</option>
                                                                    <option value="postal">Postal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Coverage date">{{__('Coverage date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" id="coverage_date" class="form-control " value="" placeholder="{{__('Coverage date') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Note">{{__('Note') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control " value="" placeholder="{{__('Note') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><hr>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="text-center">
                    <button type="submit" id="confirmation" class="btn btn-success mt-4">Confirmation</button>
                    <input  class="btn btn-success mt-4" value="Reset"/>
                </div>
                </div>
                
            </div>
        </div>
    </div>
    <link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
    <script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
<script>
$(document).ready(function(){
    var coverage_date ='';
  
    $('body').on('change','.payment_types',function(){
        input_change($(this).val(),$(this).attr('id'));
    })
   function input_change(val,attri){
       var cont;
       if((attri != 'only') &&($('#only').val() == '1')){
           $('#'+attri).val(0);
           return false;
       }
       if(attri == 'week_payment'){
         cont = val*7;  
       }
       if(attri == 'month_payment'){
         cont = val*30;  
       }
       if(attri == 'bimonth_payment'){
         cont = val*60;  
       }
       
       if(attri == 'quarter_payment'){
         cont = val*90;  
       }
       if(attri == 'six_month'){
         cont = val*183;  
       }
       if((attri == 'annual_payment') || (attri == 'only')){
         cont = val*365;  
       }
        
        var first = new Date();
        var next = new Date(first.getTime() + cont * 24 * 60 * 60 * 1000);
        var todate=new Date(next).getDate();
        var tomonth=new Date(next).getMonth()+1;
        var toyear=new Date(next).getFullYear();
        var coverage = todate+'/'+tomonth+'/'+toyear;
        if((coverage_date !='')&&(coverage_date > coverage)){
            $('#coverage_date').val(coverage_date);
        }else{
            $('#coverage_date').val(coverage);
        }
        
        if(attri == 'only'){
            $('#week_payment').val('');
            $('#month_payment').val('');
            $('#bimonth_payment').val('');
            $('#quarter_payment').val('');
            $('#six_month').val('');
            $('#annual_payment').val('');
            $('#total').val(parseInt(val));
        }else{
            var total = parseInt($('#week_payment').val())+ parseInt($('#month_payment').val())+ parseInt($('#bimonth_payment').val())+ parseInt($('#quarter_payment').val())+ parseInt($('#six_month').val())+ parseInt($('#annual_payment').val())+ parseInt($('#only').val());
            $('#total').val(total);
        }
   } 
   var ttl;
   $('body').on('keyup','#discount',function(){
        if($(this).val()){
            var ts_vl = $(this).val();
            if(ts_vl){
                if(!ttl){
                   ttl = $('#total').val();
                }
               var nw_vl = ttl-[(ts_vl*ttl)/100];
               $('#total').val(nw_vl);
           }
        }
        if((!$(this).val()) && (ttl)){
            $('#total').val(ttl);
        }
   });
   var pr_t;
   $('#exemption').on('click',function(){
        if(!pr_t){
            pr_t = $('#total').val();console.log(pr_t);
        }
        if ($('#exemption').is(':checked')) {
            $('#total').val(''); 
        }else{
         $('#total').val(pr_t);  
       }
   });
});
 $('body').on('click', '#confirmation', function () {
                var accept_date = "{{$user->acceptance_date}}"
                var accept_user_id = "{{$user->phyTest[0]->user_id}}"
                var mail_receipt = ''
                if(accept_user_id){
                    $.ajax({
                        type: 'post',
                        url: "{{ route('user.useraccept') }}",
                        data: {"_token": "{{ csrf_token() }}", accept_date: accept_date, accept_user_id: accept_user_id, mail_receipt: mail_receipt},
                        success: function (data) {
                            if (data) {
                                var route = "{{route('user.user_pdf',$user->phyTest[0]->user_id)}}"
                                window.open(route, '_blank');
                                window.location = "{{route('user.view',$user->phyTest[0]->user_id)}}"
                            }
                        }
                    });
                }
            }); 
       
</script>
    @endsection