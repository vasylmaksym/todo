<?php include 'includes/header.php'; ?>

    <main id="app">

        <?php include 'includes/nav.php'; ?>

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card px-3">
                            <div class="card-body">
                                <h4 class="card-title">LIST</h4>
                                <div class="list-wrapper">
                                    <?php if (!empty($data)): ?>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">name</th>
                                                <th scope="col">email</th>
                                                <th scope="col">text</th>
                                                <th scope="col">status</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data as $item): ?>
                                                <tr data-id="<?= $item->id ?>">
                                                    <th scope="row"><?= $item->id ?></th>
                                                    <td><?= $item->name ?></td>
                                                    <td><?= $item->email ?></td>
                                                    <td>
                                                        <input style="border: none" class="textField" readonly
                                                               value="<?= $item->text ?>">
                                                    </td>
                                                    <td><input style="border: none" class="statusField" readonly
                                                               value="<?= $item->status; ?>"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-lg editBtn"
                                                                data-toggle="modal" data-target="#myModal">
                                                            Edit
                                                        </button>
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
                                                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </nav>
                                <?php endif; ?>

                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <form action="/update" method="post" class="modal-content jsForm">
                                            <input type="hidden" name="id" class="idInput" value="">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row m-1">
                                                    <p>Text</p>
                                                    <input type="text" name="text" class="form-control textInput"
                                                           placeholder="text" required>
                                                </div>
                                                <fieldset class="form-group">
                                                    <div class="row m-1">
                                                        <legend class="col-form-label">Status</legend>
                                                        <div class="col-sm">
                                                            <?php foreach ($status as $item): ?>
                                                                <div class="form-check">
                                                                    <input class="form-check-input statusInput"
                                                                           type="radio"
                                                                           name="status" id="status_<?= $item; ?>"
                                                                           value="<?= $item; ?>">
                                                                    <label class="form-check-label"
                                                                           for="status_<?= $item; ?>">
                                                                        <?= $item; ?>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include 'includes/footer.php';
