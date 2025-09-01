<div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="form-horizontal">
            @method('post')
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group row">
                        <div class="col-lg-8">
                                Apakah kamu yakin transaksi dibawah ini sudah lunas?
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-lg-4 col-lg-offset-1 control-label">Nama Pembeli</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama_piutang" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-lg-4 col-lg-offset-1 control-label">Total Piutang</label>
                        <div class="col-lg-6">
                            <input type="text" name="total_piutang" id="inputAngka" disabled >
                        </div>
                    </div>
                    <input type="hidden" name="id_penjualan">

                </div>
                

                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Setuju </button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

