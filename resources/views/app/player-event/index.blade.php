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
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
          </tbody>
      </table>
  </div>
</div>
@endsection