@can('edit_'.$entity)
    <a href="{{ route('permissions.'.$entity.'.edit', [str_singular($entity) => $id])  }}" class="btn btn-sm btn-info">
        <i class="fa fa-edit"></i> Edit</a>
@endcan

@can('delete_'.$entity)
    {!! Form::open( ['method' => 'delete', 'url' => route('permissions.'.$entity.'.destroy', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
        <button type="submit" class="btn-delete btn btn-sm btn-danger">
            <i class="fa fa-trash"></i>
        </button>
    {!! Form::close() !!}
@endcan
