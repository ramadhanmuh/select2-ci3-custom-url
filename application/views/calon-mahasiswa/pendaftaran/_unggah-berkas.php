<div class="card card-form card-form d-none">
    <div class="card-body px-4">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php if (!empty($berkas_pendaftaran)) : foreach($berkas_pendaftaran as $key => $value) : ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-<?= $key ?>" type="button">
                        <?= $value->berkas->nama ?>
                    </button>
                </li>
            <?php endforeach; endif ?>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <?php if (!empty($berkas_pendaftaran)) : foreach($berkas_pendaftaran as $key => $value) : ?>
                <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="tab-<?= $key ?>">
                    <h6 class="m-0">Unggah <?= $value->berkas->nama ?></h6>
                    <hr>
                    <p class="m-0">Spesifikasi berkas:</p>
                    <p class="m-0">- Ukuran berkas maksimal 5MB.</p>
                    <p class="m-0">- Ekstensi berkas adalah
                        <?php  
                            foreach ($value->berkas->tipe_berkas as $key2 => $value2) {
                                if ($key2 > 0) {
                                    echo '|' . $value2->nama;
                                } else {
                                    echo $value2->nama;
                                }
                            }
                        ?>.
                    </p>
                    <div class="row align-items-center g-0">
                        <div class="col-12 col-md pe-0">
                            <input type="file"
                                class="form-control mt-2 unggah-berkas-input"
                                data-id="<?= $value->id ?>">
                        </div>
                        <div class="col-12 col-md-auto mt-1 mt-md-0">
                            <a href="" class="lihat-berkas text-decoration-none btn btn-outline-primary mt-md-2 ms-md-1"
                                data-id="<?= $value->id ?>"
                                target="_blank">
                                Lihat Berkas
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif ?>
        </div>

        <div class="row justify-content-end mt-3">
            <div class="col-auto p-0 me-2">
                <button class="btn btn-primary"
                    type="button"
                    id="tombol-berkas-kembali">
                    Kembali
                </button>
            </div>
            <div class="col-auto p-0">
                <button class="btn btn-primary"
                    type="button"
                    id="tombol-berkas-selanjutnya">
                        Selanjutnya
                </button>
            </div>
        </div>
    </div>
</div>