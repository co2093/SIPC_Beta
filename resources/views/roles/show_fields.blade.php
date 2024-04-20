<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Permissions Field -->
<div class="form-group">
    {!! Form::label('permissions', 'Permissions:') !!}
    <p>{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</p>
</div>

