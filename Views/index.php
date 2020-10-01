<?php include 'includes/header.php'; ?>

<main id="app">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Todo</h4>
                            <div class="add-items d-flex">
                                <input type="text" class="form-control todo-list-input"
                                       placeholder="What do you need to do today?">
                                <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                            </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse todo-list">
                                    <?php foreach ($data as $item): ?>
                                        <li class="<?= $item['done'] ? 'completed' : ''; ?>">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox"
                                                           disabled <?= $item['done'] ? 'checked' : '' ?>>
                                                    <?= $item['name'] . " — " . $item['text']; ?>
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
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

<?php include 'includes/footer.php'; ?>
