@extends('layouts.auth')

@section('content')
<!-- loader END -->
  
<main class="main-content">
@include('partials.navBar')
      <div class="content-inner mt-5 py-0">
      <div>
         <div class="row d-flex justify-content-center">
            <div class="col-xl-9 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">New User Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-user-info">
                        <form action="{{ route('users.store') }}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="fname">First Name:</label>
                                 <input type="text" class="form-control" id="fname" placeholder="Full Name" name="name" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="fname">Last Name:</label>
                                 <input type="text" class="form-control" id="fname" placeholder="Full Name" name="name" required>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="mail">Email:</label>
                                 <input type="email" class="form-control" id="mail" placeholder="Email" name="email" required>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="time">Role:</label>
                                 <select class="selectpicker form-control" data-style="py-0" name="time" required>
                                    <option value="" disabled selected>Role</option>
                                    {{-- <option value="admin">Admin</option> --}}
                                    <option value="employee">Employee</option>
                                    <option value="user">User</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="mobno">Mobile Number:</label>
                                 <input type="text" class="form-control" id="mobno" placeholder="Mobile Number" name="phone" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="psw">Password:</label>
                                 <input type="text" class="form-control" id="psw" placeholder="Password" name="password" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="pswc">Confirm Password:</label>
                                 <input type="text" class="form-control" id="pswc" placeholder="Confirm Password" name="password_confirmation" required>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary">Add New User</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
    </main>
    @endsection