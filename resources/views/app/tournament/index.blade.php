@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    @hasrole('Admin')
        <div class="card my-3 p-3">
            <div class="row align-items-center">
                <div class="col-5 col-sm-3">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-plus fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    @endhasrole
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
                <td class="text-center">
                    <button type="button" class="btn btn-info btn-block">
                        <i class="fas fa-eye"></i>
                    </button>
                    @hasrole('Admin')
                        <button type="button" class="btn btn-warning btn-block">
                            <i class="fas fa-edit"></i>
                        </button>
                    @endhasrole
                </td>
                <td class='text-center'>
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
                <td class="text-center">
                    2
                </td>
                <td class="text-center">
                    29
                </td>
                <td>
                    2021-09-16 12:00:24
                </td>
              </tr>
          
              <tr>
                <td class="text-center">
                    <button type="button" class="btn btn-info btn-block">
                        <i class="fas fa-eye"></i>
                    </button>
                    @hasrole('Admin')
                        <button type="button" class="btn btn-warning btn-block">
                            <i class="fas fa-edit"></i>
                        </button>
                    @endhasrole
                </td>
                <td class='text-center'>
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
                <td class="text-center">
                    2
                </td>
                <td class="text-center">
                    75
                </td>
                <td>
                    2021-09-16 12:00:24
                </td>
              </tr>

              <tr>
                <td class="text-center">
                    <button type="button" class="btn btn-info btn-block">
                        <i class="fas fa-eye"></i>
                    </button>
                    @hasrole('Admin')
                        <button type="button" class="btn btn-warning btn-block">
                            <i class="fas fa-edit"></i>
                        </button>
                    @endhasrole
                </td>
                <td class='text-center'>
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
                <td class="text-center">
                    2
                </td>
                <td class="text-center">
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