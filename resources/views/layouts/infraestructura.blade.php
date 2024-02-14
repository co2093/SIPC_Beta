@extends('layouts.default')
@section('content')
<div class="container">
    
    <form>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <select class="custom-select">
          <option selected>Seleccione un tipo de infraestructura</option>
          <option value="1">Campo experimental</option>
          <option value="2">Laboratorio</option>
          <option value="3">Taller</option>
          <option value="4">Sala</option>
        </select>
      </div>
    </div>

  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-9">
        <label for="area_construida">Area Construida</label>
        <input type="number" class="form-control" id="area_construida">
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3">
      <button type="reset" class="btn btn-secondary">Cancelar</button>
    </div>
    <div class="col-md-3">
    <button type="button" class="btn btn-primary">Anterior</button>
    </div>

    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
  <div class="row">
    <div class="col-md-10">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>infraestructura</th>
            <th>Proyecto</th>
            <th>Area construida</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</form>

</div>

@endsection