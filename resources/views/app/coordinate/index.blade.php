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
          <h5>View Coordinates</h5>
      </div>
      <table class="table table-hover">
          <thead class="thead-dark">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Name</th>
                <th scope="col">Coordinates</th>
                <th scope="col">Distance in KM</th>
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
                  <td>
                      STA. FE
                  </td>
                  <td>
                    STA. FE, N.V / 16:09:44 N - 120:56:19 E / 218.268733 KM
                  </td>
                  <td class="text-center">
                    43km
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
                <td>
                    STA. FE
                </td>
                <td>
                    CARRANGLAN NUEVA ECIJA / 15:57:05.8 N - 120:58:56.6 E / 194.424641 KM
                </td>
                <td class="text-center">
                  23km
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
                <td>
                    CARRANGLAN
                </td>
                <td>
                    CARRANGLAN NUEVA ECIJA / 15:57:05.8 N - 120:58:56.6 E / 194.424641 KM
                </td>
                <td class="text-center">
                  98km
                </td>
            </tr>
          </tbody>
      </table>
  </div>
</div>
@endsection