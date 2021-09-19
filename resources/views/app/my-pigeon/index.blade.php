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
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td></td>
                <td>
                    LRPA 1906
                </td>
                <td>-</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>Active</td>
                <td>2021-08-01 02:53:58</td>
              </tr>

              <tr>
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td></td>
                <td>
                    PSU 51428
                </td>
                <td>-</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>Active</td>
                <td>2021-05-16 01:45:02</td>
              </tr>

              <tr>
                <td>
                    <i class="fas fa-eye text-center"></i>
                </td>
                <td></td>
                <td>
                    MSPA 1269
                </td>
                <td>-</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>Active</td>
                <td>2021-05-01 23:21:37</td>
              </tr>
          </tbody>
      </table>
  </div>
</div>
@endsection