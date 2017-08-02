@extends('home')

@section('content')

@if(isset($activity) && $activity->status == 4)
<h1 class="custom-table">Acesso restrito neste status</h1>
<a href="{{ route('activities.index') }}">
  <button type="button" class="btn btn-default">Voltar</button>
</a>
@else
@if(isset($activity))
<form class="form-horizontal custom-table" id="formactivity" method="post" action="{{ route('activities.update', $activity->id) }}">
  {{ method_field('PUT') }}
@else
<form class="form-horizontal custom-table" id="formactivity" method="post" action="{{ route('activities.store') }}">
@endif
  {{ csrf_field() }}
  <h1>{{ $title }}</h1>
@if($errors->get('name'))
  <div class="form-group has-error">
    <div class="row">
      <label class="col-sm-offset-2 col-sm-6" for="inputName"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
    </div>
    <label for="inputName" class="col-md-2 control-label">Nome:* </label>
    <div class="col-md-10">
@else
  <div class="form-group">
    <label for="inputName" class="col-md-2 control-label">Nome:* </label>
    <div class="col-md-10">
@endif
      <input type="text" class="form-control" id="inputName" name="name" placeholder="Nome" value="{{{ old('name', isset($activity->name) ? $activity->name : '') }}}" required>
    </div>
  </div>
@if($errors->get('description'))
  <div class="form-group has-error">
    <div class="row">
      <label class="col-sm-offset-2 col-sm-6" for="inputDescription"><i class="fa fa-times-circle-o"></i> {{ $errors->first('description') }}</label>
    </div>
    <label for="inputDescription" class="col-md-2 control-label">Descrição:* </label>
    <div class="col-md-10">
@else
  <div class="form-group">
    <label for="inputDescription" class="col-md-2 control-label">Descrição:* </label>
    <div class="col-md-10">
@endif
      <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Descrição" value="{{{ old('description', isset($activity->description) ? $activity->description : '') }}}" required>
    </div>
  </div>
@if($errors->get('start_date'))
  <div class="form-group has-error">
    <div class="row">
      <label class="col-sm-offset-2 col-sm-6" for="inputStartDate"><i class="fa fa-times-circle-o"></i> {{ $errors->first('start_date') }}</label>
    </div>
    <label for="inputStartDate" class="col-md-2 control-label">Data de Início:* </label>
    <div class="col-md-10 input-group date">
@else
  <div class="form-group">
    <label for="inputStartDate" class="col-md-2 control-label">Data de Início:* </label>
    <div class="col-md-10 input-group date">
@endif
      <input type="text" class="form-control" id="inputStartDate" name="start_date" placeholder="Data de Início" value="{{{ old('start_date', isset($activity->start_date) ? $activity->start_date : '') }}}" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
@if($errors->get('end_date'))
  <div class="form-group has-error">
    <div class="row">
      <label class="col-sm-offset-2 col-sm-6" for="inputEndDate"><i class="fa fa-times-circle-o"></i> {{ $errors->first('end_date') }}</label>
    </div>
    <label for="inputEndDate" class="col-md-2 control-label">Data de Fim:* </label>
    <div class="col-md-10 input-group date">
@else
  <div class="form-group">
    <label for="inputEndDate" class="col-md-2 control-label">Data de Fim:* </label>
    <div class="col-md-10 input-group date">
@endif
      <input type="text" class="form-control" id="inputEndDate" name="end_date" placeholder="Data de Fim" value="{{{ old('end_date', isset($activity->end_date) ? $activity->end_date : '') }}}"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
@if($errors->get('status'))
  <div class="form-group has-error">
    <div class="row">
      <label class="col-sm-offset-2 col-sm-6" for="inputEndDate"><i class="fa fa-times-circle-o"></i> {{ $errors->first('status') }}</label>
    </div>
    <label class="col-md-2 control-label">Status:* </label>
    <div class="col-md-10">
@else
  <div class="form-group">
    <label class="col-md-2 control-label">Status:* </label>
    <div class="col-md-10">
@endif
      <select class="form-control" name="status">
        @forelse($status as $st)
        <option value="{{ $st->id }}"
        @if(isset($activity) && $activity->status == $st->id)
        selected
        @endif
        >{{ $st->name }}</option>
        @empty
        <option>Nenhum Registro encontrado!</option>
        @endforelse
      </select>
    </div>
  </div>
@if($errors->get('situation'))
  <div class="form-group has-error">
    <div class="row">
      <label class="col-sm-offset-2 col-sm-6" for="inputEndDate"><i class="fa fa-times-circle-o"></i> {{ $errors->first('situation') }}</label>
    </div>
    <label class="col-md-2 control-label">Situação:* </label>
    <div class="col-md-10">
@else
  <div class="form-group">
    <label class="col-md-2 control-label">Situação:* </label>
    <div class="col-md-10">
@endif
      <select class="form-control" name="situation">
        <option value="1" {{ isset($activity) && $activity->situation == 1 ? "selected" : "" }}>Ativo</option>
        <option value="0" {{ isset($activity) && $activity->situation == 0 ? "selected" : "" }}>Inativo</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="{{ route('activities.index') }}">
        <button type="button" class="btn btn-default">Voltar</button>
      </a>
    </div>
  </div>
</form>
@endif

@endsection