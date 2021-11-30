<div class="card d-none card-form">
    <div class="card-body px-4">
        <div class="row rounded-1 mb-3">
            <div class="col-12 p-0">
                <h5 class="px-2 m-0 bg-light p-1 border">
                    Input PIN
                </h5>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 border-top border-bottom border-dark mt-4">
                        <div class="row align-items-center my-2">
                            <div class="col-md-5 col-lg-4 col-xl-3">
                                <label>
                                    Username/Email
                                </label>
                            </div>
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <?= $this->session->calon_mahasiswa->email ?>
                            </div>
                        </div>
                        <div class="row align-items-center my-2">
                            <div class="col-md-5 col-lg-4 col-xl-3">
                                <label>
                                    Nama
                                </label>
                            </div>
                            <div class="col-md-7 col-lg-8 col-xl-9"
                                id="nama-di-cetak-kartu-ujian">
                                <?= !empty($biodata) ? $biodata->nama : '' ?>
                            </div>
                        </div>
                        <div class="row align-items-center my-2">
                            <div class="col-md-5 col-lg-4 col-xl-3">
                                <label for="pin-pembayaran-pmb">
                                    PIN
                                </label>
                            </div>
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <input type="text"
                                    class="form-control"
                                    id="pin-pembayaran-pmb">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        Sebelum Mencetak Kartu Ujian atau Lainnya, Silahkan terlebih dahulu masukkan PIN yang anda dapatkan dari pembayaran Biaya Pendaftaran PMB.
                    </div>
                    <div class="col-12 text-center">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button class="btn btn-primary" id="tombol-sebelumnya-cetak-kartu-ujian">
                                    Kembali
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-secondary"
                                    id="tombol-cetak-kartu-ujian">
                                    Cetak Kartu Ujian
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>