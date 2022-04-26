<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('parent_trans.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('parent_trans.email') }}</th>
            <th>{{ trans('parent_trans.name_Father') }}</th>
            <th>{{ trans('parent_trans.national_ID_Father') }}</th>
            <th>{{ trans('parent_trans.passport_ID_Father') }}</th>
            <th>{{ trans('parent_trans.phone_Father') }}</th>
            <th>{{ trans('parent_trans.job_Father') }}</th>
            <th>{{ trans('main_trans.processes') }}</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach ($my_parents as $i =>$my_parent)
            <tr>
                
                <td>{{ $i+1 }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->name_Father }}</td>
                <td>{{ $my_parent->national_ID_Father }}</td>
                <td>{{ $my_parent->passport_ID_Father }}</td>
                <td>{{ $my_parent->phone_Father }}</td>
                <td>{{ $my_parent->job_Father }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('main_trans.edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>

                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>