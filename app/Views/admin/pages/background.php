<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid mt-3">
    <h1>Background</h1>
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
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($background as $value_bg) : ?>
                    <?php foreach ($pasangan as $value_pasangan) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td>
                            <?=$value_bg['id_data']==$value_pasangan['id']?$value_pasangan['nick_pria'].' & '.$value_pasangan['nick_wanita']: ''?>
                        </td>
                        <td>
                            <img src="/img/bg/<?=$value_bg['foto']?>" alt="Foto" width="200">
                        </td>
                        <td>
                            <a href="/admin/dtgllry/<?=$value_bg['id']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dltgllry/<?=$value_bg['id']?>" method="POST" class="d-inline">
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
            <form action="/admin/simpanBackground/<?=@$background_id?$background_id['id']:old('id')?>" method="POST"
                enctype="multipart/form-data">
                <?=csrf_field()?>
                <input type="hidden" name="id" id="id" value="<?=@$background_id?$background_id['id']:''?>">
                <input type="hidden" name="foto-lama" id="foto-lama"
                    value="<?=@$background_id?$background_id['foto']:''?>">
                <div class="row mb-3">
                    <label for="id_data" class="col-sm-3 col-form-label">Nama Pasangan</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('id_data')?'is-invalid':''?>" id="id_data"
                            name="id_data" placeholder="Pasangan" aria-label="Pasangan">
                            <option value="">- Pilih Pasangan -</option>
                            <?php foreach ($pasangan as $value_pasangan) : ?>
                            <option value="<?=$value_pasangan['id']?>"
                                <?=@$background_id?($background_id['id_data']==$value_pasangan['id']?'selected': ''):''?>>
                                <?=$value_pasangan['nick_pria'] ?> - <?= $value_pasangan['nick_wanita'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('id_data')?></div>
                    </div>
                </div>
                <?php
                    $bg1='';
                    $bg2='';
                    $disable='';
                    if($background_id){
                        if($background_id['jenis']=='bg1'){
                            $bg1 = 'selected=true';
                        }
                        if($background_id['jenis']=='bg2'){
                            $bg2 = 'selected=true';
                        }
                    }
                    if(old('jenis')=='bg1'){
                        $bg1 = 'selected';
                    }elseif(old('jenis')=='bg2'){
                        $bg2 = 'selected';
                    }
                ?>
                <div class="row mb-3">
                    <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                    <div class="col-sm-9">
                        <select class="form-control <?=$validation->hasError('jenis')?'is-invalid':''?>" id="jenis"
                            name="jenis" placeholder="jenis" aria-label="jenis">
                            <option value="">- Pilih
                                Jenis Foto -</option>
                            <option value="bg1" <?=$bg1?>>
                                Background 1</option>
                            <option value="bg2" <?=$bg2?>>
                                Background 2</option>
                        </select>
                        <div class="invalid-feedback"><?=$validation->getError('id_data')?></div>
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <div class="col">
                        <img src="/img/<?=@$background_id?'bg/'.$background_id['foto']:'gallery/default.jpg'?>"
                            id="preview-background" class="img-thumbnail">
                        <input type="file" name="foto"
                            class="file file-background <?=$validation->hasError('foto')?'is-invalid':''?>"
                            accept="image/*">
                        <input type="hidden" disabled id="file-background">
                        <button type="button" class="browse-background btn btn-primary">Upload Foto</button>
                        <div class="invalid-feedback"><?=$validation->getError('foto')?></div>
                    </div>
                </div>
                <div class="float-right">
                    <?php if(@$background_id): ?>
                    <a href="/admin/background" class="btn btn-danger">Batal</a>
                    <?php endif ?>
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=$this->endSection()?>