<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description"
            content="Pendaftaran akun calon mahasiswa di situs <?= $this->config->item('nama_situs') ?>" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />
        
        <?php $this->load->view('template/_favicon.php') ?>

        <?php $this->load->view('template/_style') ?>

        <title><?= $this->config->item('nama_situs') ?> - Daftar</title>
            <?php $this->load->view('template/autentikasi/_head.php') ?>
    </head>
    <body class="bg-primary">
        <?php $this->load->view('template/autentikasi/_header') ?>

            <div class="col-lg-7 pt-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Buat Akun</h3></div>
                    <div class="card-body">
                        <form method="post"
                            action="">
                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <?= validation_errors('<p class="text-danger m-0">', '</p>') ?>
                            <div class="form-floating mb-3 <?= validation_errors() == '' ? '' : 'mt-2' ?>">
                                <input class="form-control"
                                    id="inputEmail"
                                    type="email"
                                    placeholder="name@example.com"
                                    name="email"
                                    value="<?= set_value('email') ?>" />
                                <label for="inputEmail">Alamat Email</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"
                                            id="inputPassword"
                                            type="password"
                                            placeholder="Create a password"
                                            name="kata_sandi" />
                                        <label for="inputPassword">Kata Sandi</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"
                                            id="inputPasswordConfirm"
                                            type="password"
                                            placeholder="Confirm password"
                                            name="konfirmasi_kata_sandi" />
                                        <label for="inputPasswordConfirm">Konfirmasi Kata Sandi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit"
                                        class="btn btn-primary btn-block">
                                        Buat Akun
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="<?= base_url('') ?>">Telah punya akun ? Ayo masuk.</a></div>
                    </div>
                </div>
            </div>

        <?php $this->load->view('template/autentikasi/_footer') ?>

        <?php $this->load->view('template/_script') ?>
        
    </body>
</html>
