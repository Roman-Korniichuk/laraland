<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('pagesEdit', ['pages'=>$data['id']]), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    
        {!! Form::hidden('id', $data['id']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name', ['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name', $data['name'], ['class'=>'form-control', 'placeholder'=>'Name']) !!}
            </div>
        </div>
    
        <div class="form-group">
            {!! Form::label('alias', 'Alias', ['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('alias', $data['alias'], ['class'=>'form-control', 'placeholder'=>'Alias']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Text:', ['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::textarea('text', $data['text'], ['id'=>'editor','class'=>'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/img/' . $data['image'], '', ['class'=>'img-responsive', 'width'=>'300px']) !!}
            {!! Form::hidden('image_old', $data['image']) !!}
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
    
    
    <script>
        CKEDITOR.replace('editor');
    </script>
    
    
</div>
