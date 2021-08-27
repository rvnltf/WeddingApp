<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid mt-3">
    <h1>Orangtua Pasangan</h1>
    <div class="row">
        <div class="col-8">
            <?php if(session()->getFlashdata('pesan')):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?=session()->getFlashdata('pesan')?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pasangan</th>
                        <th scope="col">Orangtua Pria</th>
                        <th scope="col">Orangtua Wanita</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($orangtua as $value_orangtua) : ?>
                    <?php foreach ($pasangan as $value_pasangan) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td>
                            <?=@$value_orangtua['id_data']==$value_pasangan['id']?$value_pasangan['nick_pria'].' & '.$value_pasangan['nick_wanita']: ''?>
                        </td>
                        <td>
                            Anak <?=urutan_anak($value_orangtua['anak_pria'])?>
                            dari
                            <?=$value_orangtua['orangtua_pria']?>
                        </td>
                        <td>
                            Anak <?=urutan_anak($value_orangtua['anak_wanita'])?>
                            dari
                            <?=$value_orangtua['orangtua_wanita']?>
                        </td>
                        <td>
                            <a href="/admin/dtrngt/<?=$value_orangtua['id']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dltrngt/<?=$value_orangtua['id']?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                    <span class="glyphicon glyphicon-delete" aria-hidden="true">Hapus</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <form action="/admin/simpanOrangtua/<?=@$orangtua_id?$orangtua_id['id']:old('id')?>" method="POST">
                <?=csrf_field()?>
                <input type="hidden" name="id" id="id" value="<?=@$orangtua_id?$orangtua_id['id']:old('id')?>">
                <div class="row mb-3">
                    <label for="id_data" class="col-sm-3 col-form-label">Nama Pasangan</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('id_data')?'is-invalid':''?>" id="id_data"
                            name="id_data" placeholder="Pasangan" aria-label="Pasangan">
                            <option value="">- Pilih Pasangan -</option>
                            <?php foreach ($pasangan as $value_pasangan) : ?>
                            <option value="<?=$value_pasangan['id']?>"
                                <?=@$orangtua_id?($orangtua_id['id_data']==$value_pasangan['id']?'selected':''): ''?>>
                                <?=$value_pasangan['nick_pria'] ?> - <?= $value_pasangan['nick_wanita'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('id_data')?></div>
                    </div>
                </div>
                <div class="row">
                    <label for="orangtua_wanita" class="col-sm-3 col-form-label">Orangtua Wanita</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control <?=$validation->hasError('orangtua_wanita')?'is-invalid':''?>"
                            id="orangtua_wanita" name="orangtua_wanita" placeholder="Bapak & Ibu"
                            aria-label="Bapak & Ibu"
                            value="<?=$orangtua_id?$orangtua_id['orangtua_wanita']:old('orangtua_wanita')?>">
                        <div class="invalid-feedback"><?=$validation->getError('orangtua_wanita')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="anak_wanita" class="col-sm-3 col-form-label">Anak ke-</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('anak_wanita')?'is-invalid':''?>"
                            id="anak_wanita" name="anak_wanita">
                            <option value="">- Urutan anak -</option>
                            <?php foreach (urutan_anak() as $id => $value) : ?>
                            <option value="<?=$id?>"
                                <?=@$orangtua_id?($orangtua_id['anak_wanita']==$id?'selected':''): ''?>>
                                <?=$value?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('anak_wanita')?></div>
                    </div>
                </div>
                <div class="row">
                    <label for="orangtua_pria" class="col-sm-3 col-form-label">Orangtua Pria</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control <?=$validation->hasError('orangtua_pria')?'is-invalid':''?>"
                            id="orangtua_pria" name="orangtua_pria" placeholder="Bapak & Ibu" aria-label="Bapak & Ibu"
                            value="<?=$orangtua_id?$orangtua_id['orangtua_pria']:old('orangtua_pria')?>">
                        <div class="invalid-feedback"><?=$validation->getError('orangtua_pria')?></div>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="anak_pria" class="col-sm-3 col-form-label">Anak ke-</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('anak_pria')?'is-invalid':''?>"
                            id="anak_pria" name="anak_pria">
                            <option value="">- Urutan anak -</option>
                            <?php foreach (urutan_anak() as $id => $value) : ?>
                            <option value="<?=$id?>"
                                <?=@$orangtua_id?($orangtua_id['anak_pria']==$id?'selected':''): ''?>>
                                <?=$value?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('anak_pria')?></div>
                    </div>
                </div>
                <div class="float-right">
                    <?php if(@$orangtua_id): ?>
                    <a href="/admin/orangtua" class="btn btn-danger">Batal</a>
                    <?php endif ?>
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>