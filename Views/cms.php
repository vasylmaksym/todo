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
                                    <?php if (!empty($data)): ?>
                                        <form class="editForm" action="/update" method="post" hidden>
                                            <input class="idInput" type="hidden" name="id" value="">
                                            <input class="textInput" type="hidden" name="text" value="">
                                            <input class="statusInput" type="hidden" name="status" value="">
                                        </form>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">name</th>
                                                <th scope="col">email</th>
                                                <th scope="col">text</th>
                                                <th scope="col">closed</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data as $item): ?>
                                                <tr data-id="<?= $item->id ?>">
                                                    <th scope="row"><?= $item->id ?></th>
                                                    <td><?= $item->name ?></td>
                                                    <td><?= $item->email ?></td>
                                                    <td data-val="<?= $item->text ?>"
                                                        class="textField"><?= $item->text ?></td>
                                                    <td>
                                                        <input class="statusField"
                                                               type="checkbox" <?= $item->status === 'closed' ? 'checked' : '' ?>>
                                                    </td>
                                                    <td>
                                                        <button class="editBtn">Edit</button>
                                                        <div class="saveCancelBlock" hidden>
                                                            <button class="saveBtn">Save</button>
                                                            <button class="cancelBtn">Cancel</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($page_count) && $page_count > 1): ?>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <?php for ($i = 1; $i <= $page_count; $i++): ?>
                                                <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                                                    <?php $url = !empty($sort) ? "?sort={$sort}&page={$i}" : "?page={$i}"; ?>
                                                    <a class="page-link" href="<?= $url; ?>"><?= $i; ?></a>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </nav>
                                <?php endif; ?>

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
