<?php

    require_once '../../app.php';
    use Models\Contact;

    session_start();

    if(empty($_SESSION['user'])){
        header('Location: ../../index.php');
    }

    $contactObj = new Contact();
    $user_id = $_SESSION['user']['id'];

    $contacts = $contactObj -> getContacts($user_id);

?>

<?php require_once __DIR__ . '/../../templates/header.php' ?>    
    <div class="container pt-4 p-3">
        <div class="row">
            <?php if (count($contacts) == 0): ?>
                <div class="col-md-4 mx-auto">
                    <div class="card card-body text-center">
                        <p>No contacts saved yet</p>
                        <a href="/contacts_app_poo/view/pages/addContact.php">Add One!</a>
                    </div>
                </div>
            <?php endif ?>
            <?php foreach( $contacts as $contact):?>
                <div class="col-md-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="card-title text-capitalize"><?= $contact['name'] ?></h3>
                            <p class="m-2"><?= $contact['phone_number'] ?></p>
                            <a href="/contacts_app_poo/controllers/edit.php?id=<?= $contact['id'] ?>" class="btn btn-secondary mb-2">Edit Contact</a>
                            <a href="/contacts_app_poo/controllers/delete.php?id=<?= $contact['id'] ?>" class="btn btn-danger mb-2">Delete Contact</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php require_once __DIR__ . '/../../templates/footer.php' ?>
