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
    .red{
        color:red;
    }
</style>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-12" style="display:flex">
                            <h3 class="col-4 mb-0">{{__('New') }}  </h3>
                            <!--@if(isset($data->phy->cf))
                            <div class="col-4">
                                <span>{{__('Select other Options') }}</span>
                                <select id="others" class="form-control">
                                    <option>--Select--</option>
                                    <option value="free_receipt">Free Receipt</option>
                                    <option value="receipt_report">Receipt Report</option>
                                    <option value="frequency_history">Frequency History</option>
                                    <option value="plays">Stat.when it plays</option>
                                    <option value="communication">Send Communication</option>
                                </select>
                            </div>
                            @endif -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Registry') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Personal Data') }}</label><br>
                                                        <input type="text" class="form-control" readonly   value="{{$data->created_at}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('First Name') }}</label><br>
                                                        <input type="text" class="form-control"  readonly  value="{{$data->phy->first_name}}">
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Last Name') }}</label><br>
                                                        <input type="text"  class="form-control"  readonly value="{{$data->phy->last_name}}"/>
                                                        
                                                    </div>
                                                </div>
                                                @if($data->phy->cf)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="cf" placeholder="{{__('CF') }}" readonly value='{{$data->phy->cf}}'>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label >{{__('Gender') }}</label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" @if($data->sex == 1) checked="checked" @endif>
                                                        <label class="custom-control-label" for="customRadioInline1">{{__('Male') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" @if($data->sex == 0) checked="checked" @endif>
                                                        <label class="custom-control-label" for="customRadioInline2">{{__('Female') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @if($data->initial_role == 1)
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlFile1">{{__('Registered relatives') }}</label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio"  class="custom-control-input" readonly @if($data->register_relative == 1) checked="checked" @endif>
                                                        <label class="custom-control-label" for="registered_relative">{{__('Yes') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio"  class="custom-control-input" @if($data->register_relative == 0) checked="checked" @endif>
                                                        <label class="custom-control-label" for="registered_relative1">{{__('No') }}</label>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div><hr>
                                        
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Place and date of birth') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('City of Birth') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->city_of_birth}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Country of Birth') }}</label><br>
                                                        <input type="text"  class="form-control" readonly value="{{$data->country_of_birth}}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Country') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->country}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label >{{__('Date of Birth') }}</label><br>
                                                            <input class="form-control"  type="text" readonly value="{{$data->date_of_birth}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Residence') }}</h3>
                                            </div><br>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency City') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->residence_city}}"/>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency Province') }}</label><br>
                                                        <input type="text"  class="form-control" readonly value="{{$data->residence_province}}"/>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency Postal Code') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->residence_postal}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency Street') }}</label><br>
                                                        <input type="text"  class="form-control" readonly value="{{$data->residence_street}}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency Country') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->residence_country}}">
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Home') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home City') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->home_city}}">
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Province') }}</label><br>
                                                        <input type="text"  class="form-control" readonly value="{{$data->home_province}}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Postal') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->home_postal}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Street') }}</label><br>
                                                        <input type="text"  class="form-control" readonly value="{{$data->home_street}}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Country') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->home_country}}">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-header bg-white border-0" id="fa-fa-contain">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Delivery') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                @php $delivery_phone = explode(', ',$data->delivery_phone);@endphp
                                                @foreach($delivery_phone as $d)
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <label >{{__('Delivery Phone') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$d}}">
<!--                                                        <div class="add-f" id="plus_icn_phone">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                @endforeach
                                                @php $delivery_cellphone = explode(', ',$data->delivery_cellphone);@endphp
                                                @foreach($delivery_cellphone as $dc)
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <label >{{__('Delivery Cell Phone') }}</label><br>
                                                        <input type="text"  class="form-control" readonly value="{{$dc}}" />
<!--                                                        <div class="add-f" id="plus_icn_cell_phone">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            <div class="row">
                                                @php $delivery_mail = explode(', ',$data->delivery_mail);@endphp
                                                @foreach($delivery_mail as $dm)
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <label >{{__('Delivery Mail') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$dm}}">
<!--                                                        <div class="add-f" id="plus_icn_mail">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                @endforeach
                                                @php $delivery_pec = explode(', ',$data->delivery_pec);@endphp
                                                @foreach($delivery_pec as $dp)
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <label >{{__('Delivery PEC') }}</label><br>
                                                        <input type="text"  class="form-control" readonly value="{{$dp}}"/>
<!--                                                        <div class="add-f" id="plus_icn_pec">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                @php $delivery_fax = explode(', ',$data->delivery_fax);@endphp
                                                @foreach($delivery_fax as $df)
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <label >{{__('Delivery ') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$df}}">
<!--                                                        <div class="add-f" id="plus_icn_fax">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Note') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Note') }}</label><br>
                                                        <input type="text" class="form-control" readonly value="{{$data->delivery_note}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(isset($cm[0]))
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Last CM') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Delivery date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="delivery_date" class="form-control datepicker" value="{{$cm[0]->delivery_date}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Date of issue') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="date_of_issue" class="form-control datepicker" value="{{$cm[0]->date_of_issue}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Expiry date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="expiration_date" class="form-control datepicker" value="{{$cm[0]->expiration_date}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Note') }}</label><br>
                                                        <input type="text" class="form-control" name="cm_note" placeholder="{{__('Note') }}" value="{{$cm[0]->note}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="text-center">
                                            
                                                <a href="{{route('user.edit',$data->user_id)}}" class="btn btn-success mt-4">Edit</a>
                                           
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
<script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
<script>
$(document).ready(function () {
    var glob_count= 0;
    var glob_user =[];
    $('#reset').on('click', function () {
        $("#role").val($("#role option:first").val());
    })
    $('.language').css('display', 'none');
    $('#tutor_div').css('display', 'none');
    $('.import').css('display', 'none');
    $('#tutor').on('click', function () {
        if($(this).is(':checked')){
            $('#tutor_div').css('display', 'block');
            $('.import').css('display', 'block');
        }else{
           $('#tutor_div').css('display', 'none'); 
           $('.import').css('display', 'none'); 
        }
    });
    
    $('#plus_icn_phone').on('click',function(){
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_phone[]' class='form-control'  placeholder='{{__('Phone') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
        $('#fa-fa-contain').append(apnd);
    });
    $('#plus_icn_cell_phone').on('click',function(){
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_cell_phone[]' class='form-control' placeholder='{{__('Cell Phone') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
        $('#fa-fa-contain').append(apnd);
    });
    $('#plus_icn_mail').on('click',function(){
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_mail[]' class='form-control' placeholder='{{__('Mail') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
        $('#fa-fa-contain').append(apnd);
    });
    $('#plus_icn_pec').on('click',function(){
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_pec[]' class='form-control' ' placeholder='{{__('PEC') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
        $('#fa-fa-contain').append(apnd);
    });
    $('#plus_icn_fax').on('click',function(){
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_fax[]' class='form-control'  placeholder='{{__('Fax') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
        $('#fa-fa-contain').append(apnd);
    });
   $('#plus_tutor_input').on('click',function(){
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='tutor[]' list='items' class='form-control tutor_input'  placeholder='{{__('Tutor') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div><datalist class='items'></datalist></div></div></div>";
        $('#fa-fa-contain_tutor').append(apnd);
    });
    $('body').on('click','.remove-fa-fa',function(){
        $(this).parent().parent().parent().remove();
    });
    $('body').on('keyup','.tutor_input',function(){
        if($(this).val().length>1){
            var restriction = $('#restriction').val();
            var tutor = $(this).val();
            var options;
            $.ajax({
                type:'POST',
                url:"{{ route('user.tutor') }}",
                data:{"_token": "{{ csrf_token() }}",restriction:restriction,tutor:tutor},
                success:function(data){
                    if(data.length>0){
                        for(var i=0;i < data.length;i++){
                            options += '<option data-hi-d="'+data[i].id+'">'+data[i].first_name +' '+data[i].last_name+' ('+ data[i].date_of_birth+')'+'</option>';
                        }
                        $('#items').empty();
                        $('#items').append(options);
                    }
                }
             });
        }
    });
    var gb_ar = [];
    $("body").on('input','.tutor_input', function () {
        var val = this.value;
        var userText = $(this).val();
        var ths = $(this);
       
        $("#items").find("option").each(function() {
            if ($(this).val() == userText) {
                if(!gb_ar.includes(userText)){console.log('if');
                    $('#hidden_user_id').val($(this).attr('data-hi-d'));
                    gb_ar.push(userText);
                }else{
                   ths.val(''); 
                    
                }
            }
        });
    });
    
    $('#city_of_birth').on('keyup',function(){
        if($(this).val().length>2){
            var key = $(this).val();
            var options;
            
            $.ajax({
                type:'POST',
                url:"{{ route('user.place') }}",
                data:{"_token": "{{ csrf_token() }}",key:key},
                success:function(data){
                    if(data){
                        for(var i=0;i < data.length;i++){
                            options += '<option data-p="'+data[i].provinces.name+'">'+data[i].name +' ('+ data[i].provinces.name+')'+'</option>';
                        }
                        $('#places_of_birth').empty();
                        $('#places_of_birth').append(options);
                    }
                }
             });
        }
    });
    $("#city_of_birth").on('input', function () {
        var val = this.value;
        var userText = $(this).val();

        $("#places_of_birth").find("option").each(function() {
            if ($(this).val() == userText) {
                  $('input[name=country_of_birth]').empty();
                  $('input[name=country]').empty();
                  $('input[name=country_of_birth]').val($(this).attr('data-p'));
                  $('input[name=country]').val('ITALIA');
            }
        });
    });
    
    $('#residence_city').on('keyup',function(){
        var id = $('#hidden_user_id').val();
        if(!id){
            var key = $(this).val();
            var options ='';
            $.ajax({
                type:'POST',
                url:"{{ route('user.place') }}",
                data:{"_token": "{{ csrf_token() }}",key:key},
                success:function(data){
                    if(data){
                        for(var i=0;i < data.length;i++){
                            options += '<option data-p="'+data[i].provinces.name+'" data-pc="'+data[i].postal_code+'">'+data[i].name +' ('+ data[i].provinces.name+')'+'</option>';
                        }
                        $('#residence_list').empty();
                        $('#residence_list').append(options);
                    }
                }
             });
        }
    });
    $("#residence_city").on('input', function () {
        var val = this.value;
        var userText = $(this).val();

        $("#residence_list").find("option").each(function() {
            if ($(this).val() == userText) {
                  $('input[name=residence_province]').empty();
                  $('input[name=residence_country]').empty();
                  $('input[name=residence_postal_code]').empty();
                  $('input[name=residence_province]').val($(this).attr('data-p'));
                  $('input[name=residence_postal_code]').val($(this).attr('data-pc'));
                  $('input[name=residence_country]').val('ITALIA');
            }
        });
    });
    
    $('#domicile_city').on('keyup',function(){
        if($(this).val().length>2){
            var key = $(this).val();
            var options;
            
            $.ajax({
                type:'POST',
                url:"{{ route('user.place') }}",
                data:{"_token": "{{ csrf_token() }}",key:key},
                success:function(data){
                    if(data){
                        for(var i=0;i < data.length;i++){
                            options += '<option data-p="'+data[i].provinces.name+'" data-pc="'+data[i].postal_code+'">'+data[i].name +' ('+ data[i].provinces.name+')'+'</option>';
                        }
                        $('#domicile_list').empty();
                        $('#domicile_list').append(options);
                    }
                }
             });
        }
    });
    $("#domicile_city").on('input', function () {
        var val = this.value;
        var userText = $(this).val();

        $("#domicile_list").find("option").each(function() {
            if ($(this).val() == userText) {
                  $('input[name=domicile_province]').empty();
                  $('input[name=domicile_country]').empty();
                  $('input[name=domicile_postal_code]').empty();
                  $('input[name=domicile_province]').val($(this).attr('data-p'));
                  $('input[name=domicile_postal_code]').val($(this).attr('data-pc'));
                  $('input[name=domicile_country]').val('ITALIA');
            }
        });
    });
});

$("#import_tutor_check").on('click',function() {
    if($("#import_tutor_check").is(':checked')) {
        var id = $('#hidden_user_id').val();
        if(id){
        $.ajax({
                type:'post',
                url:"{{ route('user.getuser') }}",
                data:{"_token": "{{ csrf_token() }}",id:id},
                success:function(data){
                    if(data){
                        $('#residence_city').val(data.residence_city);
                        $('#residence_province').val(data.residence_province);
                        $('#residence_postal_code').val(data.residence_postal);
                        $('#residence_street').val(data.residence_street);
                        $('#residence_country').val(data.residence_country);
                        
                    }
                }
             });
         }
    }else{
        $('#residence_city').val('');
                        $('#residence_province').val('');
                        $('#residence_postal_code').val('');
                        $('#residence_street').val('');
                        $('#residence_country').val('');
    }
   
});
 $('#others').on('change',function(){
        var other_option = $(this).val();
        var id = "{{Request::segment(3)}}"
        if(other_option =='free_receipt'){
           window.location = "{{route('recepit.index',Request::segment(3))}}" 
        }
    });
</script>
@endsection