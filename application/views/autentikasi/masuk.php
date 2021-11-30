<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description"
            content="Masuk calon mahasiswa situs. <?= $this->config->item('nama_situs') ?>" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />
        <meta name="url" content="<?= base_url('') ?>" />
        
        <?php $this->load->view('template/_favicon.php') ?>

        <?php $this->load->view('template/_style') ?>

        <title><?= $this->config->item('nama_situs') ?> - Masuk</title>
        
    </head>
    <body class="bg-primary">
        <?php $this->load->view('template/autentikasi/_header') ?>
            <div class="col-lg-5 pt-5">
                <div class="card shadow-lg border-0 rounded-lg mt-md-5 mt-lg-4 <?= validation_errors() == '' ? 'mt-xl-2' : 'mt-xl-0' ?>">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">
                            Masuk
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                        <?= validation_errors('<p class="text-danger m-0">', '</p>') ?>
                            <div class="form-floating mb-3<?= validation_errors() == '' ? '' : ' mt-2' ?>">
                                <input class="form-control"
                                    id="inputEmail"
                                    type="email"
                                    placeholder="name@example.com"
                                    name="email"
                                    value="<?= set_value('email') ?>" />
                                <label for="inputEmail">Alamat Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control"
                                    id="inputPassword"
                                    type="password"
                                    placeholder="Password"
                                    name="kata_sandi" />
                                <label for="inputPassword">Kata Sandi</label>
                            </div>
                            <div class="mb-3">
                                <img src="<?= base_url('captcha/') . $berkas_captcha ?>"
                                    alt="captcha"
                                    id="captcha-img"
                                    width="225">
                                <button class="btn p-0 ms-2 text-black-50"
                                    type="button"
                                    id="refresh-captcha-btn">
                                    <i class="fas fa-sync"></i>
                                </button>
                                <input type="text" class="form-control mt-2"
                                    name="captcha"
                                    placeholder="Masukkan 4 Angka">
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="<?= base_url('lupa-kata-sandi') ?>">Lupa Kata Sandi ?</a>
                                <button type="submit"
                                    class="btn btn-primary">
                                    Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <a href="<?= base_url('daftar') ?>">
                                Butuh akun ? Daftar disini.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php $this->load->view('template/autentikasi/_footer') ?>
        <?php $this->load->view('template/_script') ?>
        <script src="<?= base_url('assets/scripts/pages/masuk.js') ?>"
            defer></script>
    </body>
</html>
