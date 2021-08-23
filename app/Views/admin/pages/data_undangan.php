<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid">
    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambahDataModal">
        Tambah Data Undangan
    </button>
</div>

<div class="modal fade bd-example-modal-xl" id="tambahDataModal" tabindex="-1" role="dialog"
    aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="/admin/simpanDataUndangan" method="POST" enctype="multipart/form-data">
            <?=csrf_field();?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Undangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h1 class="mt-4">Data Undangan</h1>
                        <div class="row">
                            <div class="col">
                                <div class="row mb-3">
                                    <label for="nickname" class="col-sm-3 col-form-label">Nickname</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nickname_p" name="nickname_p"
                                            placeholder="Pria" aria-label="Pria">
                                        <div class="invalid-feedback"><?=$validation->getError('nama')?></div>
                                    </div>
                                    <div class="col-sm-1 text-center col-form-label">&</div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nickname_w" name="nickname_w"
                                            placeholder="Wanita" aria-label="Wanita">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fullname" class="col-sm-3 col-form-label">Fullname Pria</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fullname_p" name="fullname_p"
                                            placeholder="Fullname Pria" aria-label="Fullname Pria">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fullname" class="col-sm-3 col-form-label">Fullname Wanita</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fullname_w" name="fullname_w"
                                            placeholder="Fullname Wanita" aria-label="Fullname Wanita">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_akad" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tanggal_akad" name="tanggal_akad"
                                            placeholder="Akad" aria-label="Akad" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    <div class="col-sm-1 text-center col-form-label">-</div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tanggal_resepsi"
                                            name="tanggal_resepsi" placeholder="Resepsi" aria-label="Resepsi" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="awal_akad" class="col-sm-3 col-form-label">Waktu Akad</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="awal_akad" name="awal_akad"
                                            placeholder="Awal" aria-label="Awal">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                    <div class="col-sm-1 text-center col-form-label">-</div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="akhir_akad" name="akhir_akad"
                                            placeholder="Akhir" aria-label="Akhir">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="awal_resepsi" class="col-sm-3 col-form-label">Waktu Resepsi</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="awal_resepsi" name="awal_resepsi"
                                            placeholder="Awal" aria-label="Awal">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                    <div class="col-sm-1 text-center col-form-label">-</div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="akhir_resepsi" name="akhir_resepsi"
                                            placeholder="Akhir" aria-label="Akhir">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat_akad" class="col-sm-3 col-form-label">Alamat Akad</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="alamat_akad" name="alamat_akad" rows="2"
                                            placeholder="Tempat" aria-label="Tempat"></textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" id="link_akad" name="link_akad" rows="2"
                                            placeholder="Link" aria-label="Link"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat_resepsi" class="col-sm-3 col-form-label">Alamat
                                        Resepsi</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="alamat_resepsi" name="alamat_resepsi"
                                            rows="2" placeholder="Tempat" aria-label="Tempat"></textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" id="link_resepsi" name="link_resepsi" rows="2"
                                            placeholder="Link" aria-label="Link"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h3>Pas Foto</h1>
                                    </div>
                                </div>
                                <div class="row mb-3 text-center">
                                    <div class="col-sm-6">
                                        <img id="preview-pria" class="img-thumbnail">
                                        <input type="file" name="foto_pria" class="file file-pria" accept="image/*">
                                        <input type="hidden" disabled id="file-pria">
                                        <button type="button" class="browse-pria btn btn-primary">Upload Foto
                                            Pria</button>
                                    </div>
                                    <div class="col-sm-6 text-center">
                                        <img id="preview-wanita" class="img-thumbnail">
                                        <input type="file" name="foto_wanita" class="file file-wanita" accept="image/*">
                                        <input type="hidden" disabled id="file-wanita">
                                        <button type="button" class="browse-wanita btn btn-primary">Upload Foto
                                            Wanita</button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <h3>Musik Background</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="musik" name="musik"
                                                accept="audio/*">
                                            <label class="custom-file-label" for="musik">Pilih Musik</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="kalimat" class="col-sm-3 col-form-label">Kalimat Page Couple</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="kalimat" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?=$this->endSection()?>