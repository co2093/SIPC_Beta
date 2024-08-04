@extends('layouts.default')
@section('content')

@if (session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
@endif




    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Proyectos</a></li>
        <li class="breadcrumb-item"><a href="#">Registro</a></li>
        <li class="breadcrumb-item active" aria-current="page">Título</li>
      </ol>
    </nav>

     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">


                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Registrar proyecto de investigacion archivados</h6>
                    </div>
        <div class="card-body">


            <div class="container mt-5">
                <!-- Progress Bar -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 16.6%" aria-valuenow="16.6" aria-valuemin="0" aria-valuemax="100">20%</div>
                </div>

                <!-- Tabs Navigation -->
                <ul class="nav nav-pills nav-justified flex-column flex-md-row" id="myTab" role="tablist">

                </ul>

            </div>




            <div class="container mt-5">



            </div>

</div>
</div>
</div>
</div>





     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Proyecto actual</h6>
                    </div>

                    <div class="card-body">

                          <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Convocatoria</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">AE2024</th>
                                    <td>Proyecto</td>
                                    <td>Ejemplo</td>

                                </tr>

                                <!-- More rows as needed -->
                            </tbody>
                        </table>

                </div>
            </div>
        </div>                    
    </div>





@endsection
