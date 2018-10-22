<div style="margin:0px 50px 0px 50px">

@if($services)
	<table class="table table-hover table-striped">
		<thead >
			<tr>
				<th>№</th>
				<th>Имя</th>
				<th>Текст</th>
				<th>Дата Создания</th>
				<th style="color: green;">Редактировать</th>
				<th style="color: #DF0031;">Удалить</th>
			</tr>
		</thead>
		<tbody>
			@foreach($services as $key=>$service)
				<tr>
					<td>{{ $service->id }}</td>					
					<td>{{ $service->name }}</td>					
					<td>{{ $service->text }}</td>					
					<td>{{ $service->created_at }}</td>	
					<td>{!! Html::link(route('serviceEdit', ['service'=>$service->id]), $service->name, ['alt'=>$service->name]) !!}</td>				
					<td>
						{!! Form::open(['url'=>route('serviceEdit', ['service'=>$service->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
					
<!--					<input type="hidden" name="_method" value="DELETE" >-->
						{!! Form::hidden('_method', 'delete') !!}
<!--						{{ method_field('DELETE') }}-->
						
						{!! Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit']) !!}
						
					
					
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif	
<!--		Создание ссылки на маршрут addPages-->
	<div class="col-md-12">
        <a href="{{ route('serviceAdd') }}" class="btn btn-success">Добавить Новый Сервис</a>
    </div>
			
</div><br/><br/><br/><br/><br/>