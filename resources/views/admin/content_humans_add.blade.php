<div class="wrapper container-fluid">
    
    {!! Form::open(['url'=>route('humansAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Name']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('position', 'Position', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('position', old('position'), ['class'=>'form-control', 'placeholder'=>'Position']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('text', 'Text:', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=>'editor','class'=>'form-control']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('image', 'Image', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('image', ['class'=>'filestyle', 'datatbuttonText'=>'Select an image', 'data-buttonName'=>'btn-primary', 'data-placeholder'=>'No file']) !!}
        </div>
    </div>
    
    <div class="form-group">
         <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save!', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
        </div>
    </div>
    
    {!! Form::close() !!}
    
   <!-- <script>
        CKEDITOR.replace('editor');
    </script> -->
    
</div>
