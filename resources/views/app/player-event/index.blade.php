@extends('layouts.admin')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
       <div class="col-12 col-sm-12 col-md-7 col-lg-7">
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sticker Code</label>
                            <input 
                                type="email" 
                                class="form-control bg-secondary" id="exampleInputEmail1" 
                                aria-describedby="emailHelp" 
                                placeholder="Code"
                            >
                        </div>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-outline-primary btn-block">Quick Clock In</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="card">
      <div class="card-header bg-warning">
          <h5>Player Events</h5>
      </div>
      <table class="table table-hover">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Actions</th>
                  <th scope="col">Privacy</th>
                  <th scope="col">Event ID</th>
                  <th scope="col">Club Name</th>
                  <th scope="col">Event Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Location</th>
                  <th scope="col">Release Data</th>
                  <th scope="col">Registration Deadline</th>
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
                <td>5999</td>
                <td>
                    PIGEON SPORTS UNLIMITED
                </td>
                <td>
                    2021 NORTH RACE STA FE NV
                </td>
                <td>
                    2021 NORTH FUNRACE 4LAPS LAP 1 STA FE NV BRACKET 1 AND 2 PSU BACK UP 0927 433 1359
                </td>
                <td>
                    STA. FE, N.V / 16:09:44 N - 120:56:19 E / 218.268733 KM
                </td>
                <td>
                    2021-09-19 07:30:00
                </td>
                <td>
                    2021-09-18 11:00:00
                </td>
            </tr>

            <!-- 2 -->
            <tr>
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td>
                    <i class="fas fa-globe-asia"></i>
                </td>
                <td>5966</td>
                <td>
                    TANAUAN CITY RACING PIGEON CLUB
                </td>
                <td>
                    2021 TCRP NR FR2 2LAPS BATTLE OF MID DISTANCE LAP1
                </td>
                <td>
                    TCRP NR FR2 2LAPS BATTLE OF MID DISTANCE LAP1
                </td>
                <td>
                    CARRANGLAN NUEVA ECIJA / 15:57:05.8 N - 120:58:56.6 E / 194.424641 KM
                </td>
                <td>
                    2021-09-19 07:00:00
                </td>
                <td>
                    2021-09-18 23:00:00
                </td>
            </tr>
            <!-- 3 -->
            <tr>
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td>
                    <i class="fas fa-globe-asia"></i>
                </td>
                <td>5966</td>
                <td>
                    TANAUAN CITY RACING PIGEON CLUB
                </td>
                <td>
                    SRPC 2LAPS BATTLE OF NUEVA ECIJA LAP2 SPRINT RACE
                </td>
                <td>
                    SRPC CARRANGLAN NUEVA ECIJA LAP2
                </td>
                <td>
                    CARRANGLAN NUEVA ECIJA / 15:57:05.8 N - 120:58:56.6 E / 194.424641 KM
                </td>
                <td>
                    2021-09-19 07:00:00
                </td>
                <td>
                    2021-09-18 23:00:00
                </td>
            </tr>
          </tbody>
      </table>
  </div>
</div>
@endsection