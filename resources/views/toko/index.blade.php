@extends('layouts.master')

@section('title')
    Daftar Stok Toko
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Stok Toko</li>
@endsection

@section('content')

@if (session()->has('error'))
    <script>
    alert("Maaf Stok produk saat ini kurang dari jumlah stok yang diminta.");
  </script>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('toko.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah Stock</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="10%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('toko.form')
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
                url: '{{ route('toko.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'nama_kategori'},
                {data: 'merk'},
                {data: 'harga_jual'},
                {data: 'stok'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Stock Toko');
    }

    function editForm(url) {
        $('#modal-form-edit').modal('show');
        $('#modal-form-edit .modal-title').text('Edit  Stock Toko');

        $('#modal-form-edit form')[0].reset();
        $('#modal-form-edit form').attr('action', url);
        $('#modal-form-edit [name=_method]').val('put');
        $('#modal-form-edit [name=nama_produk]').focus();
 
        $.get(url)
            .done((response) => {
                $('#modal-form-edit [name=nama_produk]').val(response.nama_produk);
                $('#modal-form-edit [name=stok]').val(response.stok);
                $('#modal-form-edit [name=id_produk]').val(response.id_produk);
                $('#modal-form-edit [name=id_toko]').val(response.id);
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