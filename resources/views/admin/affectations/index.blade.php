@extends('layouts.admin')
@section('content')
<div class="content">
    @can('affectation_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.affectations.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.affectation.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.affectation.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Affectation">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.affectation.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affectation.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affectation.fields.agences') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affectation.fields.date_affectation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.affectation.fields.date_depart') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($affectations as $key => $affectation)
                                    <tr data-entry-id="{{ $affectation->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $affectation->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($affectation->users as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($affectation->agences as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nom }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $affectation->date_affectation ?? '' }}
                                        </td>
                                        <td>
                                            {{ $affectation->date_depart ?? '' }}
                                        </td>
                                        <td>
                                            @can('affectation_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.affectations.show', $affectation->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('affectation_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.affectations.edit', $affectation->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('affectation_delete')
                                                <form action="{{ route('admin.affectations.destroy', $affectation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('affectation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.affectations.massDestroy') }}",
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
  $('.datatable-Affectation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection