<?=$this->extend('layout_frontend/template')?>
<?=$this->section('content')?>

<div class="col-9 border-right">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/kontent">Kontent</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Materi <?=$materi[0]['judul_materi'];?></li>
        </ol>
    </nav>
    <div class="mb-5 card">
        <div class="row">
            <div class="col-sm-12">
                <div class="p-5 card">
                    <img src="<?=base_url('file/gambar/' . $materi[0]['gambar']);?>" class="card-img-top" style="height: 650px;">
                    <div class="card-body">
                        <?php
                            $db = \Config\Database::connect();
                            $dataKategori = $db->table('kategori');
                            $dataKelas = $db->table('kelas');
                            $kategori = $dataKategori->where('id', $materi[0]['kategori_id'])->get()->getRowArray();
                            $kelas = $dataKelas->where('id', $materi[0]['kelas_id'])->get()->getRowArray();
                        ?>
                        <h5 class="float-right card-title"> <i class="mdi mdi-school"></i> <?=$kategori['kategori'];?> | <?=$kelas['kelas'];?></h5>
                        <h3 class="card-title text-uppercase"><?=$materi[0]['judul_materi'];?></h3>
                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div>
                                <small class="mr-3 text-muted">
                                    <i class="fa fa-clock-o"></i> Di publish pada
                                    <?php $date = date_create($materi[0]['created_at']);
                                        echo date_format($date, "d M Y ");
                                    ?>
                                </small>

                                <small class="text-muted">
                                    <i class="fa fa-edit"></i> Di perbarui pada
                                    <?php $date = date_create($materi[0]['created_at']);
                                        echo date_format($date, "d M Y ");
                                    ?>
                                </small>
                            </div>

                            <div>
                            <?php if ($materi[0]['file'] != 'default.pdf'): ?>
                                <!-- <a href="<?=base_url('file/modul/' . $materi[0]['file']);?>" class="float-right btn btn-primary"> <i class="fa fa-download"></i> Download Materi</a> -->
                                <button type="button" class="float-right btn btn-primary" onClick="download('<?=$materi[0]['file']?>')"> <i class="fa fa-download"></i> Download Materi</button>
                            <?php endif;?>
                            </div>
                        </div>

                        <hr class="mt-0">
                        <p class="card-text"><?=$materi[0]['artikel_materi'];?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
function download(file) {

    window.location.href= `/file/modul/${file}`;
}
</script>

<?=$this->endSection()?>
