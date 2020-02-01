@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Change Password</h1>
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Chnage Password</div>
            
                    <div class="panel-body">
                    
               @if(session()->has('message')  )
                   <span class="alert alert-success custom-info-message">
                       {{ session()->get('message') }}
                   </span>
               @endif
               @if(session()->has('emessage')  )
                   <span class="alert alert-danger custom-info-message">
                       {{ session()->get('emessage') }}
                   </span>
               @endif
                <form action="" method="post" style="width: 50%;margin: 0 auto;" >
                    @csrf
                    <div class="form-group">
                        <label>Current Password*</label>
                        <input type="text" class="form-control" id="cur_Password"  name="current_password" placeholder="Current Password">
                        @if($errors->has('current_password'))
                                <span  class="error" >{{$errors->first('current_password')}}</span>  <br>   
                        @endif
                    </div>
                    <div class="form-group">
                        <label>New Password*</label>
                        <input type="text" class="form-control" id="Password" placeholder="New Password" name="new_password">
                        @if($errors->has('new_password'))
                                <span  class="error" >{{$errors->first('new_password')}}</span>  <br>   
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Confirm Password*</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="confirm_password">
                    @if($errors->has('confirm_password'))
                            <span  class="error" >{{$errors->first('confirm_password')}}</span>  <br>   
                    @endif
                    </div>

                    <div class="form-group align-center">
                      <button type="submit"   class="btn btn-success ">Change Password</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
  </section>                  	
@endsection