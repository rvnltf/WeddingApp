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
                        <th scope="col">Jenis</th>
                        <th scope="col">Rincian</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($wedding_gift as $value_wg) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
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
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <form action="/admin/simpanWeddingGift/" method="POST">
                <?=csrf_field()?>
                <?php print($wedding_gift_id['id'])?>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?=$validation->hasError('jenis')?'is-invalid':''?>"
                            id="jenis" name="jenis" placeholder="Jenis Wedding Gift" aria-label="Jenis Wedding Gift"
                            value="<?=$wedding_gift_id?$wedding_gift_id['jenis']:old('jenis')?>">
                        <div class="invalid-feedback"><?=$validation->getError('jenis')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="rincian" class="col-sm-2 col-form-label">Rincian</label>
                    <div class="col-sm-10">
                        <textarea class="form-control  <?=$validation->hasError('rincian')?'is-invalid':''?>"
                            id="rincian" name="rincian" rows="5" placeholder="Rincian"
                            aria-label="Rincian"><?=$wedding_gift_id?$wedding_gift_id['rincian']:old('rincian')?></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('rincian')?></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Simpan data</button>
            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>