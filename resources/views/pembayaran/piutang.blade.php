@extends('layouts.master')

@section('title')
    Daftar Piutang Pembelian
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Piutang Pembelian</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Total Harga</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
 
@includeIf('pembayaran.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('piutang.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'created_at'},
                {data: 'nama_piutang'},
                {data: 'total_harga'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
    });  

    function editForm(url) {
        $('#modal-form-edit').modal('show');
        $('#modal-form-edit .modal-title').text('Edit Data Piutang');

        $('#modal-form-edit form')[0].reset();
        $('#modal-form-edit form').attr('action', url);
        $('#modal-form-edit [name=_method]').val('put');
        $('#modal-form-edit [name=nama_piutang]').focus();
 
        $.get(url)
            .done((response) => {
                $('#modal-form-edit [name=nama_piutang]').val(response.nama_piutang);
                $('#modal-form-edit [name=total_piutang]').val(response.total_harga);
                $('#modal-form-edit [name=id_penjualan]').val(response.id_penjualan);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

</script>


@endpush