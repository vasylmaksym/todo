<?php include 'includes/header.php'; ?>

<main id="app">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Awesome Todo list</h4>
                            <div class="add-items d-flex"><input type="text" class="form-control todo-list-input"
                                                                 placeholder="What do you need to do today?">
                                <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                            </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse todo-list">
                                    <li>
                                        <div class="form-check"><label class="form-check-label"> <input class="checkbox"
                                                                                                        type="checkbox">
                                                For what reason would it be advisable. <i
                                                        class="input-helper"></i></label></div>
                                        <i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check"><label class="form-check-label"> <input class="checkbox"
                                                                                                        type="checkbox"
                                                                                                        checked=""> For
                                                what reason would it be advisable for me to think. <i
                                                        class="input-helper"></i></label></div>
                                        <i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                    <li>
                                        <div class="form-check"><label class="form-check-label"> <input class="checkbox"
                                                                                                        type="checkbox">
                                                it be advisable for me to think about business content? <i
                                                        class="input-helper"></i></label></div>
                                        <i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                    <li>
                                        <div class="form-check"><label class="form-check-label"> <input class="checkbox"
                                                                                                        type="checkbox">
                                                Print Statements all <i class="input-helper"></i></label></div>
                                        <i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check"><label class="form-check-label"> <input class="checkbox"
                                                                                                        type="checkbox"
                                                                                                        checked=""> Call
                                                Rampbo <i class="input-helper"></i></label></div>
                                        <i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                    <li>
                                        <div class="form-check"><label class="form-check-label"> <input class="checkbox"
                                                                                                        type="checkbox">
                                                Print bills <i class="input-helper"></i></label></div>
                                        <i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
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
