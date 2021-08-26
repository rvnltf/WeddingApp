<?=$this->extend('admin/layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid">
    <a href="/admin/tambahDataUndangan" class="btn btn-primary mt-3">
        Tambah Data Undangan
    </a>
    <h1>Data Undangan</h1>
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
                        <th scope="col">Nama Pasangan</th>
                        <th scope="col">Waktu Akad</th>
                        <th scope="col">Waktu Resepsi</th>
                        <th scope="col">Foto Pasangan</th>
                        <th scope="col" width="22%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data_undangan as $value_undangan) : ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$value_undangan['nick_pria']?> & <?=$value_undangan['nick_wanita']?></td>
                        <td>
                            <?=date('d-m-Y H:i:s', strtotime($value_undangan['tanggal_akad'].' '.$value_undangan['akad_awal']))?>
                        </td>
                        <td>
                            <?=date('d-m-Y H:i:s', strtotime($value_undangan['tanggal_resepsi'].' '.$value_undangan['resepsi_awal']))?>
                        </td>
                        <td>
                            <img src="/img/foto/<?=$value_undangan['foto_pria']?>" alt="Foto Pria" width="80">
                            <img src="/img/foto/<?=$value_undangan['foto_wanita']?>" alt="Foto Wanita" width="80">
                        </td>
                        <td>
                            <a href="/admin/dtdtndngn/<?=$value_undangan['id']?>" class=" btn btn-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                            </a>
                            <form action="/admin/dltdtndngn/<?=$value_undangan['id']?>" method="POST" class="d-inline">
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