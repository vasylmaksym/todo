<?php include 'includes/header.php'; ?>

<?php if (!empty($user)): ?>
    <main id="app">
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card px-3">
                            <div class="card-body">
                                <h4 class="card-title">LIST</h4>
                                <div class="list-wrapper">
                                    <ul class="d-flex flex-column-reverse todo-list">
                                        <?php foreach ($data as $item): ?>
                                            <li class="<?= $item['done'] ? 'completed' : ''; ?> todoItem"
                                                data-id="<?= $item['id'] ?>">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="checkbox"
                                                               type="checkbox" <?= $item['done'] ? 'checked' : ''; ?>>
                                                        For what reason would it be advisable.
                                                        <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                                <i class="remove mdi mdi-close-circle-outline"></i>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php else: ?>
    <form action="/login" method="post" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="login" class="form-control" placeholder="login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
<?php endif;
include 'includes/footer.php'; ?>
