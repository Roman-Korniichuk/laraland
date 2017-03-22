<div style="margin: 0 50px">
    
    @if($humans)
    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Text</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($humans as $k=>$human)
            
            <tr>
                    <td>{{ $human->id }}</td>
                    <td>{!! Html::link(route('humansEdit', ['human'=>$human->id]), $human->name, ['alt'=>$human->name]) !!}</td>
                    <td>{{ $human->position }}</td>
                    <td>{{ $human->text }}</td>
                    <td>{{ $human->created_at }}</td>
                    <td>
                        {!! Form::open(['url'=>route('humansEdit', ['human'=>$human->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        
                            {{ method_field('DELETE') }}
                            {!! Form::button('Delete!', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                        
                        {!! Form::close()!!}
                    </td>
            </tr>
                    
            @endforeach
            
        </tbody>
        
    </table>
    
    {!! Html::link(route('humansAdd'), 'New human') !!}
    
    @endif
    
</div>
