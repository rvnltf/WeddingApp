<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid mt-3">
    <h1>Timeline</h1>
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
                        <th scope="col">Nama Pasangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Rincian</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($timeline as $value_timeline) : ?>
                    <?php foreach ($pasangan as $value_pasangan) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$value_timeline['id_data']==$value_pasangan['id']?$value_pasangan['nick_pria'].' & '.$value_pasangan['nick_wanita']: ''?>
                        </td>
                        <td><?=date('d-m-Y', strtotime($value_timeline['tanggal']));?></td>
                        <td><?=$value_timeline['judul']?></td>
                        <td><?=$value_timeline['rincian']?></td>
                        <td>
                            <a href="/admin/dttmln/<?=$value_timeline['id']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dlttmln/<?=$value_timeline['id']?>" method="POST" class="d-inline">
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
            <form action="/admin/simpantimeline<?=@$timeline_id?'/'.$timeline_id['id']:''?>" method="POST"
                enctype="multipart/form-data">
                <?=csrf_field()?>
                <input type="hidden" name="id" id="id" value="<?=@$timeline_id?$timeline_id['id']:''?>">
                <div class="row mb-3">
                    <label for="id_data" class="col-sm-3 col-form-label">Nama Pasangan</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('id_data')?'is-invalid':''?>" id="id_data"
                            name="id_data" placeholder="Pasangan" aria-label="Pasangan">
                            <option value="">- Pilih Pasangan -</option>
                            <?php foreach ($pasangan as $value_pasangan) : ?>
                            <option value="<?=$value_pasangan['id']?>"
                                <?=@$timeline_id?($timeline_id['id_data']==$value_pasangan['id']?'selected': ''):''?>>
                                <?=$value_pasangan['nick_pria'] ?> - <?= $value_pasangan['nick_wanita'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('id_data')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_timeline" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control <?=$validation->hasError('tanggal_timeline')?'is-invalid':''?>"
                            id="tanggal_timeline" name="tanggal_timeline" placeholder="Akad" aria-label="Akad"
                            value="<?=$timeline_id?date('m/d/Y', strtotime($timeline_id['tanggal'])):old('tanggal_timeline')?>" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <div class="invalid-feedback"><?=$validation->getError('tanggal_timeline')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?=$validation->hasError('judul')?'is-invalid':''?>"
                            id="judul" name="judul" placeholder="Judul" aria-label="Judul"
                            value="<?=$timeline_id?$timeline_id['judul']:old('judul')?>">
                        <div class="invalid-feedback"><?=$validation->getError('judul')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="rincian" class="col-sm-3 col-form-label">Rincian</label>
                    <div class="col-sm-9">
                        <textarea class="form-control <?=$validation->hasError('rincian')?'is-invalid':''?>"
                            id="rincian" name="rincian" rows="5" placeholder="Tempat"
                            aria-label="Tempat"><?=$timeline_id?$timeline_id['rincian']:old('rincian')?></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('rincian')?></div>
                    </div>
                </div>
                <div class="float-right">
                    <?php if(@$timeline_id): ?>
                    <a href="/admin/timeline" class="btn btn-danger">Batal</a>
                    <?php endif ?>
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>