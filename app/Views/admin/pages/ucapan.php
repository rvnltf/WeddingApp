<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid mt-3">
    <h1>Ucapan dan do'a</h1>
    <div class="row">
        <div class="col<?=@$ucapan_id?'-8':''?>">
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
                        <th scope="col">Nama</th>
                        <th scope="col">Ucapan</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ucapan as $value_ucapan) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$value_ucapan['nama']?></td>
                        <td><?=$value_ucapan['ucapan']?></td>
                        <td>
                            <a href="/admin/dtcpn/<?=$value_ucapan['id_ucapan']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dltcpn/<?=$value_ucapan['id_ucapan']?>" method="POST" class="d-inline">
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
        <?php if($ucapan_id):?>
        <div class="col-4">
            <form action="/admin/simpanUcapan/<?=@$ucapan_id['id']?>" method="POST">
                <?=csrf_field()?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?=$validation->hasError('nama')?'is-invalid':''?>"
                            id="nama" name="nama" placeholder="Nama" aria-label="Nama"
                            value="<?=$ucapan_id?$ucapan_id['nama']:old('nama')?>">
                        <div class="invalid-feedback"><?=$validation->getError('nama')?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ucapan" class="col-sm-2 col-form-label">Ucapan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control  <?=$validation->hasError('ucapan')?'is-invalid':''?>" id="ucapan"
                            name="Ucapan" rows="5" placeholder="Ucapan"
                            aria-label="ucapan"><?=$ucapan_id?$ucapan_id['ucapan']:old('ucapan')?></textarea>
                        <div class="invalid-feedback"><?=$validation->getError('ucapan')?></div>
                    </div>
                </div>
                <div class="float-right">
                    <?php if(@$ucapan_id): ?>
                    <a href="/admin/ucapan" class="btn btn-danger">Batal</a>
                    <?php endif ?>
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </div>
            </form>
        </div>
        <?php endif ?>
    </div>
</div>

<?=$this->endSection()?>