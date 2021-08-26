<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid mt-3">
    <h1>Wedding Gift</h1>
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
                        <th scope="col">Jenis</th>
                        <th scope="col">Rincian</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($wedding_gift as $value_wg) : ?>
                    <?php foreach ($pasangan as $value_pasangan) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td>
                            <?=@$value_wg['id_data']==$value_pasangan['id']?$value_pasangan['nick_pria'].' & '.$value_pasangan['nick_wanita']: ''?>
                        </td>
                        <td><?=$value_wg['jenis']?></td>
                        <td><?=$value_wg['rincian']?></td>
                        <td>
                            <a href="/admin/dtwg/<?=$value_wg['id']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dltwg/<?=$value_wg['id']?>" method="POST" class="d-inline">
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
            <form action="/admin/simpanWeddingGift/<?=@$wedding_gift_id?$wedding_gift_id['id']:old('id')?>"
                method="POST">
                <?=csrf_field()?>
                <div class="row mb-3">
                    <label for="id_data" class="col-sm-3 col-form-label">Nama Pasangan</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('id_data')?'is-invalid':''?>" id="id_data"
                            name="id_data" placeholder="Pasangan" aria-label="Pasangan">
                            <option value="">- Pilih Pasangan -</option>
                            <?php foreach ($pasangan as $value_pasangan) : ?>
                            <option value="<?=$value_pasangan['id']?>"
                                <?=@$wedding_gift_id['id_data']==$value_pasangan['id']?'selected': ''?>>
                                <?=$value_pasangan['nick_pria'] ?> - <?= $value_pasangan['nick_wanita'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('id_data')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?=$validation->hasError('jenis')?'is-invalid':''?>"
                            id="jenis" name="jenis" placeholder="Jenis Wedding Gift" aria-label="Jenis Wedding Gift"
                            value="<?=$wedding_gift_id?$wedding_gift_id['jenis']:old('jenis')?>">
                        <div class="invalid-feedback"><?=$validation->getError('jenis')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="rincian" class="col-sm-3 col-form-label">Rincian</label>
                    <div class="col-sm-9">
                        <textarea class="form-control  <?=$validation->hasError('rincian')?'is-invalid':''?>"
                            id="rincian" name="rincian" rows="5" placeholder="Rincian"
                            aria-label="Rincian"><?=$wedding_gift_id?$wedding_gift_id['rincian']:old('rincian')?></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('rincian')?></div>
                    </div>
                </div>
                <div class="float-right">
                    <?php if(@$wedding_gift_id): ?>
                    <a href="/admin/wedding_gift" class="btn btn-danger">Batal</a>
                    <?php endif ?>
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>