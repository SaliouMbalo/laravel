@extends('layouts.admin')
@section('content')
<div class="content">
    @can('client_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.clients.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.client.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.client.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Client">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.prenoms') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.nom') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.adresse') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.telephone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.salaire_actuel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.profession') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.employeur') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.numero_identification') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $key => $client)
                                    <tr data-entry-id="{{ $client->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $client->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->prenoms ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->nom ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->adresse ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->telephone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->salaire_actuel ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->profession ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->employeur ?? '' }}
                                        </td>
                                        <td>
                                            {{ $client->numero_identification ?? '' }}
                                        </td>
                                        <td>
                                            @can('client_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', $client->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('client_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $client->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('client_delete')
                                                <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('client_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clients.massDestroy') }}",
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
  $('.datatable-Client:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection