	
	{!! Form::open(['url'=>route('serviceAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
	
		<div class="form-group">
			{!! Form::label('name', 'Название:', ['class'=>'col-xs-2 control-label']) !!}
				<div class="col-xs-8">
<!--				<input type="text" /> значения из ссесии-->
					{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Введите Название']) !!}
				</div>
		</div>
	
		<div class="form-group">
			{!! Form::label('text', 'Текст:', ['class'=>'col-xs-2 control-label']) !!}
				<div class="col-xs-8">
<!--				<input type="text" /> значения из ссесии-->
					{!! Form::textarea('text', old('text'), ['id'=>'text','class'=>'form-control', 'placeholder'=>'Введите Текст']) !!}
				</div>
		</div>
		
		
		<div class="form-group">
			{!! Form::label('icon', 'Изображение:', ['class'=>'col-xs-2 control-label']) !!}
				<div class="col-xs-8">
<!--				<input type="file" />   -->
					{!! Form::file('icon', ['class'=>'filestyle',  'data-btnClass'=>'btn-primary', 'data-text'=>'Выбрать Изображение', 'data-buttonBefore'=>'true' ,'data-placeholder'=>'Файла нет']) !!}
				</div>
		</div>
		
		<div class="form-group">
				<div class="col-xs-offset-2 col-xs-10">
<!--					{!! Form::button('Сохранить', ['class'=>'btn btn-primary','type'=>'submit']) !!}-->
					<button type="submit" class="btn btn-success">Сохранить</button>
				</div>
		</div>
	{!! Form::close() !!}

</div>
<!--	Добавление специального редактора в поле текстареа по его id='editor'-->
 	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'text' );
    </script>