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

        <title><?= $this->config->item('nama_situs') ?> - Setel Ulang Sandi</title>
            <?php $this->load->view('template/autentikasi/_head.php') ?>
    </head>
    <body class="bg-primary">
        <?php $this->load->view('template/autentikasi/_header') ?>

            <div class="col-lg-7 pt-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Setel Ulang Sandi</h3></div>
                    <div class="card-body">
                        <form method="post"
                            action="">
                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <?= validation_errors('<p class="text-danger m-0">', '</p>') ?>
                            <div class="row mb-3 <?= validation_errors() == '' ? '' : 'mt-2' ?>">
                                <div class="col-12 my-1">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"
                                            id="inputPassword"
                                            type="password"
                                            placeholder="Create a password"
                                            name="kata_sandi" />
                                        <label for="inputPassword">Kata Sandi</label>
                                    </div>
                                </div>
                                <div class="col-12 my-1">
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
                                        Atur Ulang Sandi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php $this->load->view('template/autentikasi/_footer') ?>

        <?php $this->load->view('template/_script') ?>
        
    </body>
</html>