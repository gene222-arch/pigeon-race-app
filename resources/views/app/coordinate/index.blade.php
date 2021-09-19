@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
      <div class="card-header bg-warning">
          <h5>View Coordinates</h5>
      </div>
      <table class="table table-hover">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Coordinates</th>
                  <th scope="col">Distance</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>
                      STA. FE
                  </td>
                  <td>
                    STA. FE, N.V / 16:09:44 N - 120:56:19 E / 218.268733 KM
                  </td>
                  <td>
                    43km
                  </td>
              </tr>
              <tr>
                <td>
                    STA. FE
                </td>
                <td>
                    CARRANGLAN NUEVA ECIJA / 15:57:05.8 N - 120:58:56.6 E / 194.424641 KM
                </td>
                <td>
                  23km
                </td>
            </tr>
            <tr>
                <td>
                    CARRANGLAN
                </td>
                <td>
                    CARRANGLAN NUEVA ECIJA / 15:57:05.8 N - 120:58:56.6 E / 194.424641 KM
                </td>
                <td>
                  98km
                </td>
            </tr>
          </tbody>
      </table>
  </div>
</div>
@endsection