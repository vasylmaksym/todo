<?php include 'includes/header.php'; ?>

<main id="app">

    <?php include 'includes/nav.php'; ?>

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

                            <?php if (!empty($data)): ?>
                                <div class="">
                                    <span class="mr-3">Sort by:</span>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="?sort=name&order=<?= $sort === 'name' ? ($order === 'asc' ? 'desc' : 'asc') : 'asc'; ?>"
                                           class="mr-3 <?= $sort === 'name' ? 'act-link' : '' ?>">Name</a>
                                        <a href="?sort=email&order=<?= $sort === 'email' ? ($order === 'asc' ? 'desc' : 'asc') : 'asc'; ?>"
                                           class="mr-3 <?= $sort === 'email' ? 'act-link' : '' ?>">Email</a>
                                        <a href="?sort=status&order=<?= $sort === 'status' ? ($order === 'asc' ? 'desc' : 'asc') : 'asc'; ?>"
                                           class="<?= $sort === 'status' ? 'act-link' : ''; ?>">Status</a>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Body</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $key => $item): ?>
                                        <tr class="<?= $item->status === 'closed' ? 'closed' : 'act'; ?>">
                                            <td><?= $item->name ?></td>
                                            <td><?= $item->email ?></td>
                                            <td><?= $item->text ?></td>
                                            <td><?= $item->status; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>Empty todo list :(</p>
                            <?php endif; ?>
                        </form>
                        <?php if (!empty($page_count) && $page_count > 1): ?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $page_count; $i++): ?>
                                        <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                                            <?php $url = !empty($current_sort) ? "?page={$i}&{$current_sort}" : "?page={$i}"; ?>
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
