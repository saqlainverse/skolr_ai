<ul class="d-flex gap-30 justify-content-end align-items-center">
    @if(hasPermission('category.edit'))
        <li>
            <a href="{{ route('category.edit',$category->id) }}"><i class="las la-edit"></i></a>
        </li>
    @endif
    @if(hasPermission('category.destroy'))
        <li>
            <a href="javascript:void(0)"
               onclick="delete_row('{{ route('category.destroy', $category->id) }}')"
               data-toggle="tooltip"
               data-original-title="{{ __('delete') }}"><i class="las la-trash-alt"></i></a>
        </li>
    @endif
</ul>


