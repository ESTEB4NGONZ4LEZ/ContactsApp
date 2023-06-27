<?php

    session_start();

    if(empty($_SESSION['user'])){
        header('Location: ../../index.php');
    }

?>

<?php require_once __DIR__ . '/../../templates/header.php' ?>       
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Contact</div>
                        <div class="card-body">
                            <?php if($error): ?>
                                <p class="text-danger"><?= $error ?></p>
                            <?php endif ?>
                            <form action="../../controllers/addContact.php" method="POST">
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
                                    <div class="col-md-6">
                                        <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
                                    </div>
                                </div>
                
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require_once __DIR__ . '/../../templates/footer.php' ?>   