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
                        <h3 class="col-12 mb-0">{{__('Entrance: Free receipt') }} </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">

                            @if(Session::has('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    <form method="post"  action="{{route('recepit.save')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Base') }}</h3>
                                            </div><br>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">{{__('Accountholder') }}</label>
                                                        <input type="text" class="form-control" id="accountholder" name="accountholder" placeholder="{{__('Accountholder') }}" list='items'/>
                                                        <datalist id="items"></datalist>
                                                        <input type="hidden" name="accountholder_id" id="accountholder_id" >
                                                        @if ($errors->has('accountholder'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('accountholder') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">{{__('Amount') }}</label>
                                                        <input class="form-control" name="amount" placeholder="{{__('Amount') }}" type="text" value="{{old('amount')}}" >
                                                        @if ($errors->has('amount'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('amount') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">{{__('Payment Method') }}</label>
                                                        <select name="payment_method" id="payment_method" class="form-control form-control-alternative{{ $errors->has('payment_method') ? ' is-invalid' : '' }}">
                                                            @foreach($methods as $method)
                                                            <option value="{{$method->id}}">{{$method->getTranslation('description', (\Session::get('locale_mod') == 'en')? 'en' :'nl' ,false)}}</option>
                                                            @endforeach
                                                        </select> 
                                                        @if ($errors->has('payment_method'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('payment_method') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">{{__('Note') }}</label>
                                                        <textarea class="form-control" name="note" value="{{old('note')}}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><hr>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4 confirmation">{{__('Confirmation') }}</button>
                                        <input type="button" id="reset" class="btn btn-success mt-4" value="{{__('Reset') }}">
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
<script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
<script>
$(document).ready(function () {
    $('#reset').on('click',function(){
        $('input:not([id=reset])').val('');
        $("#payment_method").val($("#payment_method option:first").val());
        $('textarea').val('');
    });
   $('#accountholder').on('keyup',function(){
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
    $("body").on('input','#accountholder', function () {
        var val = this.value;
        var userText = $(this).val();

        $("#items").find("option").each(function() {
            if ($(this).val() == userText) {
                $('#accountholder_id').val($(this).attr('data-hi-d'));
            }
        });
    });
    
     
    $('form').on('submit',function(){
        var accept_user_id = $('#accountholder_id').val();
        if(accept_user_id){
            $.ajax({
                type: 'post',
                url: "{{ route('user.useraccept') }}",
                data: {"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    if (data) {
                        var route = "{{route('recepit.pdf',1)}}";
                        window.open(route, '_blank');                      
                        return false;
                    }
                    return false;
                }
            });
        }
    })
});

</script>
@endsection