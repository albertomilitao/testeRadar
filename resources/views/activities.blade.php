@extends('home')

@section('content')

  	<div class="row">
		<div class="table-responsive custom-table">
			<table class="table table-bordered" id="teste">
				<caption>
					<div class="col-md-1">
						<span>Filtros: </span>
					</div>
					<div class="col-md-3">
						<select class="form-control" name="searchstatus">
							<option>Selecione o Status</option>
							<option value="all">Todos</option>
					        @forelse($status as $sts)
					        <option value="{{ $sts->id }}">{{ $sts->name }}</option>
					        @empty
					        <option>Nenhum Registro encontrado!</option>
					        @endforelse
						</select>
					</div>
					<div class="col-md-3">
						<select class="form-control" name="searchsituation">
							<option>Selecione a Situação</option>
							<option value="all">Todos</option>
					        <option value="1">Ativo</option>
					        <option value="0">Inativo</option>
						</select>
					</div>
					<div class="col-md-5"></div>
				</caption>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Data de Início</th>
						<th>Data de Fim</th>
						<th>Status</th>
						<th>Situação</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
			        @forelse($activities as $activity)
					<tr {{ $activity->status == 4 ? "class=success" : "" }}>
						<th scope="row">{{ $activity->id }}</th>
						<td>{{ $activity->name }}</td>
						<td>{{ $activity->description }}</td>
						<td>{{ date('d-m-Y', strtotime($activity->start_date)) }}</td>

						@if(empty($activity->end_date))
						<td></td>
						@else
						<td>{{ date('d-m-Y', strtotime($activity->end_date)) }}</td>
						@endif

						@foreach($status as $st)

						@if($activity->status == $st->id)
						<td>{{ $st->name }}</td>
						@endif

						@endforeach
						<td>{{ $activity->situation == 0 ? "Inativo" : "Ativo" }}</td>
						<td>
							@if($activity->status == 4)
			                <button type="button" class="btn btn-info btn-sm" title="Editar" alt="Editar" disabled="disabled"><i class="fa fa-edit fa-fw"></i></button> 
							@else
		                    <a href="{{ route('activities.edit', $activity->id) }}">
	                      		<button type="button" class="btn btn-info btn-sm" title="Editar" alt="Editar"><i class="fa fa-edit fa-fw"></i></button> 
		                    </a>
		                    @endif
						</td>
					</tr>
			        @empty
			        <tr>
			        	<td colspan="8">Nenhum Registro encontrado!</td>
			        </tr>
			        @endforelse
				</tbody>
			</table>
		</div>
  	</div>
  	<div class="row">
  		<a href="{{ route('activities.create') }}">
  			<button type="button" class="btn btn-primary">Nova Atividade</button>
  		</a>
  	</div>

@endsection