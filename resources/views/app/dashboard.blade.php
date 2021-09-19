@extends('layouts.admin')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" target="_self">Dashboard</a></li>
        </ol>
    </nav>
    <div class="alert alert-info" role="alert">
        <div class="row">
            <div class="col-12 col-sm-1 col-md-1 col-lg-1">
                <div class="info-icon text-center">
                    <i class="fas fa-question-circle"></i>
                </div>
            </div>
            <div class="col-12 col-sm-11 col-md-11 col-lg-11">
                <div class="info-text-containe">
                    <p>
                        *Pindutin lamang ang "Quick Clock in" upang makapag tala ng oras sa ating karera.
                    </p>
                    <p>
                        *Para sa SMS Clock-in laging mag text sa tamang access number kung smart or globe wagding kakalimutan na mag text sa backup number provided ng inyong club.
                    </p>
                </div>
            </div>
        </div>
    </div>
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
                    <li class="list-group-item">
                        <button type="button" class="btn btn-info btn-block">View Result</button>
                    </li>
                    <li class="list-group-item">
                        <button type="button" class="btn btn-info btn-block"><i class="fas fa-qrcode mr-3 text-dark"></i>Scan</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
          <div class="card">
            <div class="card-header bg-warning">
                <h5><i class="fas fa-users fa-1x mr-3"></i>Club List</h5>
            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Current Balance </th>
                        <th scope="col">Entry Fee Reversal </th>
                        <th scope="col">Club Coordinates</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>PIGEON SPORTS UNLIMITED (PSU)</td>
                        <td>0.00</td>
                        <td class="text-danger">No</td>
                        <td>14:35:22.74 N - 121:00:9.54 E</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>TANAUAN CITY RACING PIGEON CLUB</td>
                        <td>0.00</td>
                        <td class="text-danger">No</td>
                        <td>14:35:22.74 N - 121:00:9.54 E</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
