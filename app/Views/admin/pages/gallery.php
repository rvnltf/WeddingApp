<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid mt-3">
    <h1>Gallery</h1>
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
                        <th scope="col">Foto</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($gallery as $value_gallery) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$value_gallery['jenis']?></td>
                        <td>
                            <img src="/img/<?=$value_gallery['jenis']=='gallery'?'gallery':'bg'?>/<?=$value_gallery['foto']?>"
                                alt="Foto" width="200">
                        </td>
                        <td>
                            <a href="/admin/dtgllry/<?=$value_gallery['id_gallery']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dltgllry/<?=$value_gallery['id_gallery']?>" method="POST"
                                class="d-inline">
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
            <form action="/admin/simpanGallery/<?=@$gallery_id?$gallery_id['id_gallery']:''?>" method="POST"
                enctype="multipart/form-data">
                <?=csrf_field()?>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control <?=$validation->hasError('jenis')?'is-invalid':''?>" id="jenis"
                            name="jenis" placeholder="Jenis" aria-label="Jenis">
                            <option value="" <?=old('jenis')==''?'selected':''?>>- Pilih Jenis Foto -</option>
                            <option value="bg1" <?=old('jenis')=='bg1'?'selected':''?>>Background 1</option>
                            <option value="bg2" <?=old('jenis')=='bg2'?'selected':''?>>Background 2</option>
                            <option value="gallery" <?=old('jenis')=='gallery'?'selected':''?>>Gallery</option>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('jenis')?></div>
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <div class="col">
                        <img id="preview-gallery" class="img-thumbnail">
                        <input type="file" name="foto"
                            class="file file-gallery <?=$validation->hasError('foto')?'is-invalid':''?>"
                            accept="image/*">
                        <input type="hidden" disabled id="file-gallery">
                        <button type="button" class="browse-gallery btn btn-primary">Upload Foto</button>
                        <div class="invalid-feedback"><?=$validation->getError('foto')?></div>
                    </div>
                </div>
                <div class="float-right">
                    <?php if(@$gallery_id): ?>
                    <a href="/admin/gallery" class="btn btn-danger">Batal</a>
                    <?php endif ?>
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>