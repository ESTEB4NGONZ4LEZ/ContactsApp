<?php $error = $_GET['error']; ?>

<?php require_once __DIR__ . '/../../templates/header.php' ?>    
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                        <div class="card-body">
                            <?php if($error): ?>
                                <p class="text-danger"><?= $error ?></p>
                            <?php endif ?>
                            <form action="../../controllers/login.php" method="POST">
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="password" autofocus>
                                    </div>
                                </div>
                
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Clear</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__ . '/../../templates/footer.php' ?>