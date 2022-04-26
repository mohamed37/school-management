

@foreach ($class as $i=>$c )
    

<tr>                                 
    <td><input type="checkbox"  value="{{ $c->id }}" class="box1" ></td> 
    <td>{{ $i+1 }}</td>    
    <td>{{ $c->name }}</td>
    <td>{{ $c->grades->name }}</td>
    
    <td>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
            data-target="#edit{{ $c->id }}"
            title="{{ trans('classrooms_trans.edit') }}"><i class="fa fa-edit"></i></button>

        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
            data-target="#delete{{ $c->id }}"
            title="{{ trans('classrooms_trans.delete') }}"><i
                class="fa fa-trash"></i></button>
    </td>
</tr>
@endforeach

