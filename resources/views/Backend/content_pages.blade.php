<div style="margin:0px 50px 0px 50px">

@if($pages)
	<table class="table table-hover table-striped">
		<thead >
			<tr>
				<th>№</th>
				<th>Имя</th>
				<th>Псевдоним</th>
				<th>Текст</th>
				<th>Дата Создания</th>
				<th style="color: green;">Редактировать</th>
				<th style="color: #DF0031;">Удалить</th>
			</tr>
		</thead>
		<tbody>
		
			@foreach($pages as $key=>$page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->name }}</td>
					<td>{{ $page->alias }}</td>
					<td>{{ $page->text }}</td>
					<td>{{ $page->created_at }}</td>
					<td>{!! Html::link(route('pagesEdit',['page'=>$page->id]), $page->name, ['alt'=>$page->name]) !!}</td>
					
<!--					Генерируем форму delete-->
					<td>
						{!! Form::open(['url'=>route('pagesEdit', ['page'=>$page->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
					
<!--					<input type="hidden" name="_method" value="DELETE" >-->
						{!! Form::hidden('_method', 'delete') !!}
<!--						{{ method_field('DELETE') }}-->
						
						{!! Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit']) !!}
						
					
					
						{!! Form::close() !!}
					<td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif	
<!--		Создание ссылки на маршрут addPages-->
	<div class="col-md-12">
        <a href="{{ route('pagesAdd') }}" class="btn btn-success">Добавить Новую Страницу</a>
    </div>
			
</div><br/><br/><br/><br/><br/>