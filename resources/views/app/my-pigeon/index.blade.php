@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
      <div class="card-header bg-warning">
          <h5>My Pigeons</h5>
      </div>
      <table class="table table-hover">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Action</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Ring Band#</th>
                  <th scope="col">Color or Gender</th>
                  <th scope="col">Remarks</th>
                  <th scope="col">Blood Line</th>
                  <th scope="col">Status</th>
                  <th scope="col">Date Created</th>
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
              </tr>
          </tbody>
      </table>
  </div>
</div>
@endsection