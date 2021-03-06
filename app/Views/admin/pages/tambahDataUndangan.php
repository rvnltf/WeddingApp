<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<form action="/admin/simpanDataUndangan/<?=$data_undangan?$data_undangan['id']:old('id')?>" method="POST"
    enctype="multipart/form-data">
    <div class="container">
        <a href="/admin/data_undangan" class="btn btn-primary mt-3">Kembali</a>
        <h1>Tambah Data Undangan</h1>
        <input type="hidden" name="id" id="id" value="<?=$data_undangan?$data_undangan['id']:old('id')?>">
        <input type="hidden" name="foto-lama-pria" id="foto-lama-pria"
            value="<?=$data_undangan?$data_undangan['foto_pria']:old('foto-lama-pria')?>">
        <input type="hidden" name="foto-lama-wanita" id="foto-lama-wanita"
            value="<?=$data_undangan?$data_undangan['foto_wanita']:old('foto-lama-wanita')?>">
        <input type="hidden" name="musik-lama" id="musik-lama"
            value="<?=$data_undangan?$data_undangan['musik']:old('musik-lama')?>">
        <div class="row">
            <div class="col">
                <div class="row mb-3">
                    <label for="nickname" class="col-sm-3 col-form-label">Nickname</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?=$validation->hasError('nickname_p')?'is-invalid':''?>"
                            id="nickname_p" name="nickname_p" placeholder="Pria" aria-label="Pria"
                            value="<?=$data_undangan?$data_undangan['nick_pria']:old('nickname_p')?>">
                        <div class="invalid-feedback"><?=$validation->getError('nickname_p')?></div>
                    </div>
                    <div class="col-sm-1 text-center col-form-label">&</div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?=$validation->hasError('nickname_w')?'is-invalid':''?>"
                            id="nickname_w" name="nickname_w" placeholder="Wanita" aria-label="Wanita"
                            value="<?=$data_undangan?$data_undangan['nick_wanita']:old('nickname_w')?>">
                        <div class="invalid-feedback"><?=$validation->getError('nickname_w')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fullname_p" class="col-sm-3 col-form-label">Fullname Pria</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?=$validation->hasError('fullname_p')?'is-invalid':''?>"
                            id="fullname_p" name="fullname_p" placeholder="Fullname Pria" aria-label="Fullname Pria"
                            value="<?=$data_undangan?$data_undangan['fullname_pria']:old('fullname_p')?>">
                        <div class="invalid-feedback"><?=$validation->getError('fullname_p')?></div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="fullname_w" class="col-sm-3 col-form-label">Fullname Wanita</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?=$validation->hasError('fullname_w')?'is-invalid':''?>"
                            id="fullname_w" name="fullname_w" placeholder="Fullname Wanita" aria-label="Fullname Wanita"
                            value="<?=$data_undangan?$data_undangan['fullname_wanita']:old('fullname_w')?>">
                        <div class="invalid-feedback"><?=$validation->getError('fullname_w')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_akad" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control <?=$validation->hasError('tanggal_akad')?'is-invalid':''?>"
                            id="tanggal_akad" name="tanggal_akad" placeholder="Akad" aria-label="Akad"
                            value="<?=$data_undangan?date('m/d/Y', strtotime($data_undangan['tanggal_akad'])):old('tanggal_akad')?>" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <div class="invalid-feedback"><?=$validation->getError('tanggal_akad')?></div>
                    </div>
                    <div class="col-sm-1 text-center col-form-label">-</div>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control <?=$validation->hasError('tanggal_resepsi')?'is-invalid':''?>"
                            id="tanggal_resepsi" name="tanggal_resepsi" placeholder="Resepsi" aria-label="Resepsi"
                            value="<?=$data_undangan?date('m/d/Y', strtotime($data_undangan['tanggal_resepsi'])):old('tanggal_resepsi')?>" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <div class="invalid-feedback"><?=$validation->getError('tanggal_resepsi')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="akad_awal" class="col-sm-3 col-form-label">Waktu Akad</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?=$validation->hasError('akad_awal')?'is-invalid':''?>"
                            id="akad_awal" name="akad_awal" placeholder="Awal" aria-label="Awal"
                            value="<?=$data_undangan?date('h:i', strtotime($data_undangan['akad_awal'])):old('akad_awal')?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <div class="invalid-feedback"><?=$validation->getError('awal_akad')?></div>
                    </div>
                    <div class="col-sm-1 text-center col-form-label">-</div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?=$validation->hasError('akad_akhir')?'is-invalid':''?>"
                            id="akad_akhir" name="akad_akhir" placeholder="Akhir" aria-label="Akhir"
                            value="<?=$data_undangan?date('h:i', strtotime($data_undangan['akad_akhir'])):old('akad_akhir')?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <div class="invalid-feedback"><?=$validation->getError('akad_akhir')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="resepsi_awal" class="col-sm-3 col-form-label">Waktu Resepsi</label>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control <?=$validation->hasError('resepsi_awal')?'is-invalid':''?>"
                            id="resepsi_awal" name="resepsi_awal" placeholder="Awal" aria-label="Awal"
                            value="<?=$data_undangan?date('h:i', strtotime($data_undangan['resepsi_awal'])):old('resepsi_awal')?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <div class="invalid-feedback"><?=$validation->getError('resepsi_awal')?></div>
                    </div>
                    <div class="col-sm-1 text-center col-form-label">-</div>
                    <div class="col-sm-4">
                        <input type="text"
                            class="form-control <?=$validation->hasError('resepsi_akhir')?'is-invalid':''?>"
                            id="resepsi_akhir" name="resepsi_akhir" placeholder="Akhir" aria-label="Akhir"
                            value="<?=$data_undangan?date('h:i', strtotime($data_undangan['resepsi_akhir'])):old('resepsi_akhir')?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <div class="invalid-feedback"><?=$validation->getError('resepsi_akhir')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat_akad" class="col-sm-3 col-form-label">Alamat Akad</label>
                    <div class="col-sm-5">
                        <textarea class="form-control <?=$validation->hasError('alamat_akad')?'is-invalid':''?>"
                            id="alamat_akad" name="alamat_akad" rows="2" placeholder="Tempat"
                            aria-label="Tempat"><?=$data_undangan?$data_undangan['alamat_akad']:old('alamat_akad')?></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('alamat_akad')?></div>
                    </div>
                    <div class="col-sm-4">
                        <textarea class="form-control <?=$validation->hasError('link_akad')?'is-invalid':''?>"
                            id="link_akad" name="link_akad" rows="2" placeholder="Link" aria-label="Link"
                            value="<?=$data_undangan?$data_undangan['link_akad']:old('link_akad')?>"></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('link_akad')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat_resepsi" class="col-sm-3 col-form-label">Alamat
                        Resepsi</label>
                    <div class="col-sm-5">
                        <textarea class="form-control <?=$validation->hasError('alamat_resepsi')?'is-invalid':''?>"
                            id="alamat_resepsi" name="alamat_resepsi" rows="2" placeholder="Tempat"
                            aria-label="Tempat"><?=$data_undangan?$data_undangan['alamat_resepsi']:old('alamat_resepsi')?></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('alamat_resepsi')?></div>
                    </div>
                    <div class="col-sm-4">
                        <textarea class="form-control <?=$validation->hasError('link_resepsi')?'is-invalid':''?>"
                            id="link_resepsi" name="link_resepsi" rows="2" placeholder="Link" aria-label="Link"
                            value="<?=$data_undangan?$data_undangan['link_resepsi']:old('link_resepsi')?>"></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('link_resepsi')?></div>
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
                        <img src="/img/foto/<?=$data_undangan?$data_undangan['foto_pria']:'avatar.jpg'?>"
                            id="preview-pria" class="img-thumbnail">
                        <input type="file" name="file[]" class="file file-pria" accept="image/*" multiple>
                        <input type="hidden" disabled id="file-pria">
                        <div class="invalid-feedback"><?=$validation->getError('file.0')?></div>
                        <button type="button" class="browse-pria btn btn-primary">Upload Foto
                            Pria</button>
                    </div>
                    <div class="col-sm-6 text-center">
                        <img src="/img/foto/<?=$data_undangan?$data_undangan['foto_wanita']:'avatar.jpg'?>"
                            id="preview-wanita" class="img-thumbnail">
                        <input type="file" name="file[]" class="file file-wanita" accept="image/*" multiple>
                        <input type="hidden" disabled id="file-wanita">
                        <div class="invalid-feedback"><?=$validation->getError('file.1')?></div>
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
                            <input type="file"
                                class="custom-file-input <?=$validation->hasError('file.2')?'is-invalid':''?>" id="
                                file-musik" name="file[]" accept="audio/*" multiple>
                            <label class="custom-file-label" for="musik"><?=$data_undangan?$data_undangan['musik']:'Pilih
                                Musik'?></label>
                            <div class="invalid-feedback"><?=$validation->getError('file.2')?></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kalimat" class="col-sm-3 col-form-label">Kalimat Page Couple</label>
                    <div class="col-sm-9">
                        <textarea class="form-control <?=$validation->hasError('kalimat')?'is-invalid':''?>"
                            id="kalimat" name="kalimat"
                            rows="3"><?=@$data_undangan?$data_undangan['kalimat']:old('kalimat')?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-5">
                <button type="submit" class="btn btn-primary">Simpan data</button>
            </div>
        </div>
    </div>
</form>

<?=$this->endSection()?>