<?php include 'includes/header.php'; ?>

<main id="app">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <form action="/create" method="post" class="card-body">
                            <h4 class="card-title">Todo</h4>
                            <div class="add-items d-flex">
                                <input name="name" type="text" class="form-control todo-list-input mr-3"
                                       placeholder="name" required>
                                <input name="email" type="text" class="form-control todo-list-input mr-3"
                                       placeholder="email" required>
                            </div>
                            <div class="add-items d-flex">
                                <input name="text" type="text" class="form-control todo-list-input mr-3"
                                       placeholder="What do you need to do today?" required>
                                <button class="add btn btn-primary font-weight-bold todo-list-add-btn mr-3">Add</button>
                            </div>
                            <div class="list-wrapper">
                                <?php if (!empty($data)): $length = count($data); ?>
                                    <div class="">
                                        <span class="mr-3">Sort by:</span>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!--TODO: if selected add class act-->
                                            <a href="?sort=name" data-sort="name" class="sortField mr-3">Name</a>
                                            <a href="?sort=email" data-sort="email" class="sortField mr-3">Email</a>
                                            <a href="?sort=status" data-sort="status" class=sortField">Status</a>
                                        </div>
                                    </div>
                                    <ul class="d-flex flex-column todo-list">
                                        <?php for ($i = 0; $i < $length; $i++): ?>
                                            <li class="<?= $data[$i]->status === 'closed' ? 'completed' : ''; ?>">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox"
                                                               disabled <?= $data[$i]->status === 'closed' ? 'checked' : '' ?>>
                                                        <?= "{$data[$i]->name}({$data[$i]->email})" . " — " . $data[$i]->text; ?>
                                                        <i class="input-helper"></i>
                                                    </label>
                                                </div>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                <?php else: ?>
                                    <p>Task List is empty :(</p>
                                <?php endif; ?>
                            </div>
                        </form>
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
</main>

<?php include 'includes/footer.php'; ?>
