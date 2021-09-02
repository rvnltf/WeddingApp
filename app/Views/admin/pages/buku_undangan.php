<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid">
    <a href="/admin/pesan" class="btn btn-primary mt-3">
        Tambah Pesan
    </a>
    <h1>Buku Undangan</h1>
    <form action="/admin/simpanBukuUndangan/<?=$buku_undangan_id?$buku_undangan_id['id']:old('id')?>" method="POST">
        <div class="row mb-2">
            <div class="col-sm-2">
                <select class="form-control <?=$validation->hasError('id_data')?'is-invalid':''?>" id="id_data"
                    name="id_data" placeholder="Pasangan" aria-label="Pasangan">
                    <option value="">- Pilih Pasangan -</option>
                    <?php foreach ($pasangan as $value_pasangan) : ?>
                    <option value="<?=$value_pasangan['id']?>"
                        <?=@$buku_undangan_id?($buku_undangan_id['id_data']==$value_pasangan['id']?'selected': ''):''?>>
                        <?=$value_pasangan['nick_pria'] ?> - <?= $value_pasangan['nick_wanita'] ?>
                    </option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback"><?=$validation->getError('id_data')?></div>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control <?=$validation->hasError('nama')?'is-invalid':''?>" id="nama"
                    name="nama" placeholder="Nama" aria-label="Nama"
                    value="<?=$buku_undangan_id?$buku_undangan_id['nama']:old('nama')?>">
                <div class="invalid-feedback"><?=$validation->getError('nama')?></div>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control <?=$validation->hasError('no_wa')?'is-invalid':''?>" id="no_wa"
                    name="no_wa" placeholder="WhatsApp" aria-label="WhatsApp"
                    value="<?=$buku_undangan_id?$buku_undangan_id['no_wa']:old('no_wa')?>">
                <div class="invalid-feedback"><?=$validation->getError('no_wa')?></div>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control <?=$validation->hasError('user_ig')?'is-invalid':''?>"
                    id="user_ig" name="user_ig" placeholder="Instagram" aria-label="Instagram"
                    value="<?=$buku_undangan_id?$buku_undangan_id['user_ig']:old('user_ig')?>">
                <div class="invalid-feedback"><?=$validation->getError('user_ig')?></div>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control <?=$validation->hasError('user_fb')?'is-invalid':''?>"
                    id="user_fb" name="user_fb" placeholder="Facebook" aria-label="Facebook"
                    value="<?=$buku_undangan_id?$buku_undangan_id['user_fb']:old('user_fb')?>">
                <div class="invalid-feedback"><?=$validation->getError('user_fb')?></div>
            </div>
            <div class="col-sm-2">
                <select class="form-control <?=$validation->hasError('pesan')?'is-invalid':''?>" id="pesan" name="pesan"
                    placeholder="Pesan" aria-label="Pesan">
                    <option value="">- Pilih Pesan -</option>
                    <?php foreach ($pesan as $value_pesan) : ?>
                    <option value="<?=$value_pesan['id']?>"
                        <?=@$buku_undangan_id?($buku_undangan_id['pesan']==$value_pesan['id']?'selected': ''):''?>>
                        <?=$value_pesan['judul'] ?>
                    </option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback"><?=$validation->getError('pesan')?></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Simpan data</button>
            </div>
        </div>
    </form>
    <form method="post" action="/admin/prosesExcel" enctype="multipart/form-data">
        <div class="form-group">
            <label>File Excel</label>
            <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Upload</button>
        </div>
    </form>
    <div class="row">
        <div class="col">
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
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Instagram</th>
                        <th scope="col">Facebook</th>
                        <th scope="col">Pesan</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku_undangan as $value_undangan) : ?>
                    <tr>
                        <td scope="row"><?=$i?></td>
                        <?php foreach ($pasangan as $value_pasangan) : ?>
                        <td>
                            <?=$value_undangan['id_data']==$value_pasangan['id']?$value_pasangan['nick_pria'].' & '.$value_pasangan['nick_wanita']: ''?>
                        </td>
                        <?php endforeach; ?>
                        <td>
                            <?=$value_undangan['nama']?>
                        </td>
                        <td>
                            <a href="https://wa.me/<?=$value_undangan['no_wa']?>" class="link-info">
                                <?=$value_undangan['no_wa']?>
                            </a>
                        </td>
                        <td>
                            <a href="https://instagram.com/<?=$value_undangan['user_ig']?>" class="link-info">
                                <?=$value_undangan['user_ig']?>
                            </a>
                        </td>
                        <td>
                            <a href="https://facebook.com/<?=$value_undangan['user_fb']?>" class="link-info">
                                <?=$value_undangan['user_fb']?>
                            </a>
                        </td>
                        <?php foreach ($pesan as $value_pesan) : ?>
                        <td>
                            <?=$value_undangan['pesan']==$value_pesan['id']?$value_pesan['pesan']: ''?>
                        </td>
                        <?php endforeach; ?>
                        <td>
                            <a href="/admin/dtbkndngn/<?=$value_undangan['id']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dltbkndngn/<?=$value_undangan['id']?>" method="POST" class="d-inline">
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
    </div>
</div>

<?=$this->endSection()?>