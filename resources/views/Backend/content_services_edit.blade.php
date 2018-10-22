<div class="wrapper container-fluid">
	{!! Form::open(['url'=>route('serviceEdit', array('service'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
	
	<div class="form-group">
		{!! Form::hidden('id', $data['id']) !!}
		{!! Form::label('name', 'Название:', ['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			<!--				<input type="text" /> -->
			{!! Form::text('name', $data['name'], ['class'=>'form-control', 'placeholder'=>'Введите Название']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('text', 'Текст:', ['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			<!--				 -->
			{!! Form::textarea('text', $data['text'], ['class'=>'form-control', 'id'=>'text',  'placeholder'=>'Введите Текст']) !!}
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('old_icon', 'Редактируемое Изображение:', ['class'=>'col-xs-2 control-label']) !!}
		<div class="col-xs-offset-2 col-xs-10">
			{!! Html::image('assets/img/'.$data['icon'],'',['class'=>'img-circle img-responcive', 'width'=>'100 px']) !!}
			{!! Form::hidden('old_icon', $data['icon']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('icon', 'Новое Изображение:', ['class'=>'col-xs-2 control-label']) !!}	
		<div class="col-xs-offset-2 col-xs-10">
			{!! Form::file('icon', ['class'=>'filestyle', 'data-btnClass'=>'btn-primary', 'data-text'=>'Выбрать Изображение', 'data-buttonBefore'=>'true' ,'data-placeholder'=>'Файла нет']) !!}
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10">
				{!! Form::button('Сохранить Изменения', ['class'=>'btn btn-success','type'=>'submit']) !!}
		</div>
	</div>
		
	
	{!! Form::close() !!}
</div>

<!--	Добавление специального редактора в поле текстареа по его id='editor'-->
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('text');
</script><br/><br/><br/>