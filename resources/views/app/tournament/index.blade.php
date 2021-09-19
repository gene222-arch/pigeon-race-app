@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
      <div class="card-header bg-warning">
          <h5>Tournaments</h5>
      </div>
      <table class="table table-hover">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Action</th>
                  <th scope="col">Privacy</th>
                  <th scope="col">Club Name</th>
                  <th scope="col">Tournament Name</th>
                  <th scope="col">Remarks</th>
                  <th scope="col">Legs</th>
                  <th scope="col">Total Birds</th>
                  <th scope="col">Date Created</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td>
                    <i class="fas fa-globe-asia"></i>
                </td>
                <td>
                    TANAUAN CITY RACING PIGEON CLUB
                </td>
                <td>
                    SRPC 2LPAS BATTLE
                </td>
                <td>
                    SRPC
                </td>
                <td>
                    2
                </td>
                <td>
                    29
                </td>
                <td>
                    2021-09-16 12:00:24
                </td>
              </tr>
          
              <tr>
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td>
                    <i class="fas fa-globe-asia"></i>
                </td>
                <td>
                    TANAUAN CITY RACING PIGEON CLUB
                </td>
                <td>
                    2021 TCRP NDR FR1
                </td>
                <td>
                    LAP1,2,3    
                </td>
                <td>
                    2
                </td>
                <td>
                    75
                </td>
                <td>
                    2021-09-16 12:00:24
                </td>
              </tr>

              <tr>
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td>
                    <i class="fas fa-globe-asia"></i>
                </td>
                <td>
                    TANAUAN CITY RACING PIGEON CLUB
                </td>
                <td>
                    2021 CPR NDR FR1
                </td>
                <td>
                    LAP1,2,3
                </td>
                <td>
                    2
                </td>
                <td>
                    70	
                </td>
                <td>
                    2021-08-01 10:14:59
                </td>
              </tr>
            </tbody>
      </table>
  </div>
</div>
@endsection