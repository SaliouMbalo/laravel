@extends('layouts.admin')
@section('content')
<div class="content">
    @can('compte_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.comptes.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.compte.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.compte.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Compte">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.compte.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.compte.fields.numero') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.compte.fields.cle_rib') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.compte.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.compte.fields.telephone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.compte.fields.type_compte') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comptes as $key => $compte)
                                    <tr data-entry-id="{{ $compte->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $compte->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $compte->numero ?? '' }}
                                        </td>
                                        <td>
                                            {{ $compte->cle_rib ?? '' }}
                                        </td>
                                        <td>
                                            {{ $compte->code->code ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($compte->telephones as $key => $item)
                                                <span class="label label-info label-many">{{ $item->telephone }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ App\Compte::TYPE_COMPTE_SELECT[$compte->type_compte] ?? '' }}
                                        </td>
                                        <td>
                                            @can('compte_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.comptes.show', $compte->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('compte_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.comptes.edit', $compte->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('compte_delete')
                                                <form action="{{ route('admin.comptes.destroy', $compte->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('compte_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.comptes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Compte:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection