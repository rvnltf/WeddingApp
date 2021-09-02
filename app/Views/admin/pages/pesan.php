<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid">
    <a href="/admin/buku_undangan" class="btn btn-primary mt-3">Kembali</a>
    <div class="row mt-3">
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
                        <th scope="col">Judul</th>
                        <th scope="col">Pesan</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pesan as $value_pesan) : ?>
                    <?php foreach ($pasangan as $value_pasangan) : ?>
                    <tr>
                        <td scope="row"><?=$i?></td>
                        <td><?=$value_pesan['id_data']==$value_pasangan['id']?$value_pasangan['nick_pria'].' & '.$value_pasangan['nick_wanita']: ''?>
                        </td>
                        <td>
                            <?=$value_pesan['judul']?>
                        </td>
                        <td>
                            <?=$value_pesan['pesan']?>
                        </td>
                        <td>
                            <a href="/admin/dtpsn/<?=$value_pesan['id']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <?php if($buku_undangan):?>
                            <form action="/admin/dltpsn/<?=$value_pesan['id']?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                    <span class="glyphicon glyphicon-delete" aria-hidden="true">Hapus</span>
                                </button>
                            </form>
                            <?php else : ?>
                            -
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <form action="/admin/simpanPesan/<?=$pesan_id?$pesan_id['id']:old('id')?>" method="POST">
                <div class="row mb-3">
                    <input type="hidden" name="id" id="id" value="<?=$pesan_id?$pesan_id['id']:old('id')?>">
                    <label for="id_data" class="col-sm-3 col-form-label">Nama Pasangan</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('id_data')?'is-invalid':''?>" id="id_data"
                            name="id_data" placeholder="Pasangan" aria-label="Pasangan">
                            <option value="">- Pilih Pasangan -</option>
                            <?php foreach ($pasangan as $value_pasangan) : ?>
                            <option value="<?=$value_pasangan['id']?>"
                                <?=@$pesan_id?($pesan_id['id_data']==$value_pasangan['id']?'selected': ''):''?>>
                                <?=$value_pasangan['nick_pria'] ?> - <?= $value_pasangan['nick_wanita'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('id_data')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?=$validation->hasError('judul')?'is-invalid':''?>"
                            id="judul" name="judul" placeholder="Judul" aria-label="Judul"
                            value="<?=$pesan_id?$pesan_id['judul']:old('judul')?>">
                        <div class="invalid-feedback"><?=$validation->getError('judul')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pesan" class="col-sm-3 col-form-label">Pesan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control <?=$validation->hasError('pesan')?'is-invalid':''?>" id="pesan"
                            name="pesan" rows="5" placeholder="Tempat"
                            aria-label="Tempat"><?=$pesan_id?$pesan_id['pesan']:old('pesan')?></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('pesan')?></div>
                    </div>
                    <p class="text-danger">
                        * gunakan <b>@penerima</b> untuk nama penerima dan <b>@link</b> untuk mencantumkan link undangan
                    </p>
                </div>
                <div class="col align-right">
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>