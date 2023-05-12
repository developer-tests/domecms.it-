@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8"><h3 class="mb-0">{{__('Ticket') }}</h3></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="col-12">

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="px-0 pb-4">
                    <div class="row flex-row">
                        <div class="col-lg-3 mb-4">
                            <div class="card draggable max-height-vh-70 h-100 overflow-auto overflow-x-hidden mb-5 mb-lg-0" draggable="true" style="max-height: 70vh;">
                                <form class="card-header">
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control" id="search_text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-body p-2" id="users_div">
                                    @foreach($users as $k=>$user)
                                    <a href="javascript:;" class="d-block p-2 users @if($k ==0) active_user @endif" data="{{$user->from_user}}"  style="@if($k ==0) background-color:#6b6be4; @endif">
                                        <div class="d-flex p-2">
                                            <img alt="Image" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cG9ydHJhaXR8ZW58MHwyfDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" class="avatar">
                                            <div class="ml-2">
                                                <div class="justify-content-between align-items-center">
                                                    <h4 class="mb-0 mt-1">{{$user->user->name.' '.$user->user->last_name}}
                                                        <span class="badge badge-success"></span>
                                                    </h4>
                                                    <!--<p class="mb-0 text-xs font-weight-normal text-muted">Job: Senior UX Designer</p>-->
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card draggable max-height-vh-70" draggable="true" style="max-height: 70vh; overflow-y: auto;">
                                <div class="card-header shadow-xl">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <h3 class="mb-0 d-block">@if(isset($users[0]->user))
                                                        {{$users[0]->user->name.''.$users[0]->user->last_name}}@endif</h3>
                                                    <!--<span class="text-sm text-muted"><span class="font-weight-bold">Job: Senior UX Designer</span> | Design Team</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body overflow-auto overflow-x-hidden" id="msg_div">
                                    @foreach($msgs as $msg)
                                    @if($msg->from_user !=Auth::id())
                                    <div class="row justify-content-start mb-4">
                                        <div class="col-auto">
                                            <div class="card ">
                                                <div class="card-body p-2">
                                                    <p class="mb-1">
                                                        {{$msg->getTranslation('msg', (\Session::get('locale_mod') == 'en')? 'en' :'nl' ,false)}} 
                                                    </p>
<!--                                                    <div class="d-flex align-items-center text-sm opacity-6">
                                                        <i class="far fa-clock mr-1" aria-hidden="true"></i>
                                                        <small>3:14am</small>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row justify-content-end text-right mb-4">
                                        <div class="col-auto">
                                            <div class="card bg-gradient-primary text-white">
                                                <div class="card-body p-2">
                                                    <p class="mb-1">
                                                        {{$msg->getTranslation('msg', (\Session::get('locale_mod') == 'en')? 'en' :'nl' ,false)}} <br>
                                                    </p>
<!--                                                    <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                        <i class="fa fa-check-double mr-1 text-xs" aria-hidden="true"></i>
                                                        <small>4:42pm</small>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach                   
                                </div>
                                
                                <div class="card-footer d-block">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id='send_text'>
                                            <div class="input-group-append" id='send'>
                                                <span class="input-group-text">
                                                    <i class="fa fa-paper-plane"></i>
                                                </span>
                                            </div>
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@push('backend_css')
<link href="{{asset('argon/css/jquery.dataTables.min.css')}}" >
<link href="{{asset('argon/css/dataTables.bootstrap4.min.css')}}" >

@endpush
@push('backend_script')
<script>
$(document).ready(function(){
    //view message by user click
    $('body').on('click','.users',function(){
        var user = $(this).attr('data');
        $('#users_div a').css('background-color','');
        $('#users_div a').removeClass('active_user');
        $(this).css('background-color','#6b6be4');
        $(this).addClass('active_user');
        $('#msg_div').empty();
       $.ajax({
            url: "{{route('ticket.msg')}}",
            method:'post',
            data:{_token:'{{csrf_token()}}',user:user},
            success: function(res){
                if(res.length>0){
                    var anchor = '';
                    var auth = '{{Auth::id()}}';
                    for(var i=0;i<res.length;i++){
                        if(auth !=res[i].from_user){
                           anchor += "<div class='row justify-content-start mb-4'><div class='col-auto'><div class='card '><div class='card-body p-2'><p class='mb-1'>"+res[i].msg.en+"</p></div></div></div></div>";
                        }else{
                           anchor += "<div class='row justify-content-end text-right mb-4'><div class='col-auto'><div class='card bg-gradient-primary text-white'><div class='card-body p-2'><p class='mb-1'>"+res[i].msg.en+"<br></p></div></div></div></div>"; 
                        }
                    }
                    $('#msg_div').append(anchor);
                }
            } 
    });
    });
    // send message by enter key
    $("#send_text").keypress(function(event) {
        if (event.keyCode === 13) {
            $("#send").click();
        }
    });
    //send message
    $('#send').on('click',function(){
        var send = $('#send_text').val();
        var to_user = $('.active_user').attr('data');
        if(to_user){
             $.ajax({
             url: "{{route('ticket.send')}}",
             method:'post',
             data:{_token:'{{csrf_token()}}',send:send,to_user:to_user},
             success: function(res){
                 if(res){
                 var apd = "<div class='row justify-content-end text-right mb-4'><div class='col-auto'><div class='card bg-gradient-primary text-white'><div class='card-body p-2'><p class='mb-1'>"+send+"<br></p></div></div></div></div>";
                 $('#msg_div').append(apd);
                 $('#send_text').val('');
                 }
             }
         });
         }
    });
      //search  
    $('#search_text').on('keyup',function(){
       var search = $('#search_text').val();
       if(search.length>2){
            $.ajax({
            url: "{{route('ticket.search')}}",
            method:'post',
            data:{_token:'{{csrf_token()}}',search:search},
            success: function(res){
                if(res){
                var apd = "";
                $('#users_div').empty();
                for(var i=0;i<res.length;i++){
                    apd +="<a href='javascript:;' data='"+res[i].id+"' class='d-block p-2 users ><div class='d-flex p-2'><img alt='Image' src='https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cG9ydHJhaXR8ZW58MHwyfDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60' class='avatar'><div class='ml-2'><div class='justify-content-between align-items-center'><h4 class='mb-0 mt-1'>"+res[i].name+' '+res[i].last_name+"<span class='badge badge-success'></span></h4></div></div></div></a>";
                }
                $('#users_div').append(apd);
                }
            }
        });
        }
    });
    
    
    
});

</script>
<script src="{{asset('argon/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('argon/js/dataTables.bootstrap4.min.js')}}"></script>

@endpush
