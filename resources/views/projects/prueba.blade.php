@extends('layouts.default')
@section('content')

<div class="container mt-5">
<h4>Registro del proyecto de investigacion<span class="badge badge-secondary"></span></h4>
</div>

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
    <ul class="nav nav-pills nav-justified flex-column flex-md-row" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Paso 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Paso 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">Paso 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">Paso 4</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step5-tab" data-toggle="tab" href="#step5" role="tab" aria-controls="step5" aria-selected="false">Paso 5</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step6-tab" data-toggle="tab" href="#step6" role="tab" aria-controls="step6" aria-selected="false">Paso 6</a>
        </li>
    </ul>
    
   
</div>

<div class="container mt-5">

     <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Presupuesto actual del proyecto</h6>
                    </div>

                    <div class="card-body">



                </div>
            </div>
        </div>                    
    </div>

</div>


@endsection
