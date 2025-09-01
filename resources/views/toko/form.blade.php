<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('toko.store') }}" method="post" class="form-horizontal">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group row">
                        <label for="nominal" class="col-lg-2 col-lg-offset-1 control-label">Nama Produk</label>
                        <div class="col-lg-6">
                            <div class="form-control" style="padding: 0%">
                                <select class="form-control select2" name="id_produk" style="width: 100%;" required autofocus>
                                    <option selected="selected"></option>
                                    @forelse ($produk as $item)
                                        <option value="{{ $item->id_produk }}">[{{ $item->kode_produk }}]-{{ $item->nama_produk }}</option>
                                    @empty
                                        <option>Tidak ada data</option>
                                    @endforelse
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-lg-2 col-lg-offset-1 control-label">Jumlah Stock</label>
                        <div class="col-lg-6">
                            <input type="number" name="stok" id="deskripsi" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                

                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- edit form --}}
<div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div> 
                <div class="modal-body">
                    
                    <div class="form-group row">
                        <label for="nominal" class="col-lg-2 col-lg-offset-1 control-label">Nama Produk</label>
                        <div class="col-lg-6">
                            <div class="form-control" style="padding: 0%">
                                <input type="text" name="nama_produk" id="deskripsi" class="form-control" disabled autofocus>
                            <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-lg-2 col-lg-offset-1 control-label">Jumlah Stok</label>
                        <div class="col-lg-6">
                            <input type="number" name="stok" id="deskripsi" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_produk" id="">
                <input type="hidden" name="id_toko" id="">

                <div class="modal-footer">
                    
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
