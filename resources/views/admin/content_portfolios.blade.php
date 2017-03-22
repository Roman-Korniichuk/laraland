<div style="margin: 0 50px">
    
    @if ($portfolios)
    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Filter</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($portfolios as $portfolio)
            
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td>{!! Html::link(route('portfoliosEdit', ['portfolio'=>$portfolio->id]), $portfolio->name, ['alt'=>$portfolio->name]) !!}</td>
                <td>{{ $portfolio->filter }}</td>
                <td>
                    
                    {!! Form::open(['url'=>route('portfoliosEdit', ['portfolio'=>$portfolio->id]), 'class'=>'form-horizontal', 'method'=>'POST'])  !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Delete!', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
                    
                </td>
                
            </tr>
            
            @endforeach
            
        </tbody>
        
        
    </table>
    
    @endif
    
    {!! Html::link(route('portfoliosAdd'), 'New portfolio!') !!}
    
</div>
