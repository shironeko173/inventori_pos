@extends('layouts.master')

@section('title')
    Daftar Refund Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Refund Produk</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('pengeluaran.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Total Nominal</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('pengeluaran.form')
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
                url: '{{ route('pengeluaran.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'created_at'},
                {data: 'nama_produk'},
                {data: 'jumlah_produk'},
                {data: 'nominal'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Pengeluaran');
    }

    function editForm(url) {
        $('#modal-form-edit').modal('show');
        $('#modal-form-edit .modal-title').text('Edit Pengeluaran');

        $('#modal-form-edit form')[0].reset();
        $('#modal-form-edit form').attr('action', url);
        $('#modal-form-edit [name=_method]').val('put');
        $('#modal-form-edit [name=nama_produk]').focus();
 
        $.get(url)
            .done((response) => {
                $('#modal-form-edit [name=nama_produk]').val(response.nama_produk);
                $('#modal-form-edit [name=jumlah_produk]').val(response.jumlah_produk);
                $('#modal-form-edit [name=id_produk]').val(response.id_produk);
                $('#modal-form-edit [name=id_pengeluaran]').val(response.id_pengeluaran);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data ini?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    }) 
</script>
@endpush