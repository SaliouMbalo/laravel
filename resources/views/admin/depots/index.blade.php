@extends('layouts.admin')
@section('content')
<div class="content">
    @can('depot_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.depots.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.depot.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.depot.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Depot">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.depot.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.depot.fields.telephone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.depot.fields.numero_compte') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.depot.fields.montant') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($depots as $key => $depot)
                                    <tr data-entry-id="{{ $depot->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $depot->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($depot->telephones as $key => $item)
                                                <span class="label label-info label-many">{{ $item->telephone }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($depot->numero_comptes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->numero }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $depot->montant ?? '' }}
                                        </td>
                                        <td>
                                            @can('depot_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.depots.show', $depot->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('depot_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.depots.edit', $depot->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('depot_delete')
                                                <form action="{{ route('admin.depots.destroy', $depot->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('depot_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.depots.massDestroy') }}",
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
  $('.datatable-Depot:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection