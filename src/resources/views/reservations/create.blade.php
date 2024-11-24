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
                        <h4 class="card-title">New Reservation Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-user-info">
                        <form action="{{ route('reservations.store') }}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="fname">Full Name:</label>
                                 <input type="text" class="form-control" id="fname" placeholder="Full Name" name="name" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="add1">Number of people:</label>
                                 <input type="number" class="form-control" id="add1" placeholder="Number of people" name="num_person" required>
                              </div>
                              {{-- <div class="form-group col-md-6">
                                 <label class="form-label" for="time">Day:</label>
                                 <select class="selectpicker form-control" data-style="py-0" name="time" required>
                                    <option disabled selected>Day</option>
                                    <option>Monday</option>
                                    <option>Tuesday</option>
                                    <option>Wednesday</option>
                                    <option>Thursday</option>
                                    <option>Friday</option>
                                    <option>Saturday</option>
                                    <option>Sunday</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="mobno">Hour:</label>
                                 <input type="text" class="form-control" id="mobno" placeholder="Hour" name="hour" required>
                              </div> --}}
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="mobno">Timing:</label>
                                 <input type="datetime-local" class="form-control" id="mobno" name="time" min="{{ date('Y-m-d\TH:i') }}" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="mobno">Mobile Number:</label>
                                 <input type="text" class="form-control" id="mobno" placeholder="Mobile Number" name="phone" required>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary">Add New Reservation</button>
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