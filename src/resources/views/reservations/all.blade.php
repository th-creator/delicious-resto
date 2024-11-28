@extends('layouts.auth')

@section('content')
<!-- loader END -->
  
<main class="main-content">
  @include('partials.navBar')
      <div class="content-inner mt-5 py-0">
<div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Reservation List</h4>
               </div>
               <div>
                  <a href="{{ route('reservations.create') }}" class="btn btn-primary rounded-pill">Make a reservation</a>
               </div>
            </div>
            <div class="card-body px-0">
               <div class="table-responsive">
                  <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                     <thead>
                        <tr class="ligth">
                           <th>Name</th>
                           <th>Contact</th>
                           <th>Number of people</th>
                           <th>Status</th>
                           <th>Timging</th>
                           <th>Created at</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($reservations as $reservation)
                        <tr>
                           <td>{{ $reservation->name }}</td>
                           <td>{{ $reservation->phone }}</td>
                           <td>{{ $reservation->num_person }}</td>
                           <td>
                               @if($reservation->state == 1)
                                   <span class="badge bg-success">Active</span>
                               @elseif($reservation->state == 0)
                                   <span class="badge bg-warning">Pending</span>
                               @else
                                   <span class="badge bg-danger">Inactive</span>
                               @endif
                           </td>
                           <td>{{ substr($reservation->time, 0, -3) }}</td>
                           <td>{{ substr($reservation->created_at, 0, -3) }}</td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <form action="{{'/toggle/reservations/'.$reservation->id}}" method="POST" style="display:inline-block;">
                                 @csrf
                                 <input type="hidden" name="state" value="1">
                                 <button type="submit" class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                    <span class="btn-inner">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                          <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                                       </svg>
                                    </span>
                                 </button>
                                 </form>
                                 <form action="{{'/toggle/reservations/'.$reservation->id}}" method="POST" style="display:inline-block;">
                                 @csrf
                                 <input type="hidden" name="state" value="-1">
                                 <button type="submit" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                    <span class="btn-inner">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                    </span>
                                 </button>
                                 </form>
                                 <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline-block;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                    <span class="btn-inner">
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                          <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>
                                    </span>
                                 </button>
                                 </form>
                              </div>
                           </td>
                        </tr>
                        @empty
                           <tr>
                              <td colspan="7" class="text-center">No Reservations found.</td>
                           </tr>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
      </div>
    </main>
    @endsection