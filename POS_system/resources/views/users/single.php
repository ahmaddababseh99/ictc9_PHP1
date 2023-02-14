<!--In this page can be should edit or delete User-->

<div class="mt-5 d-flex flex-row-reverse gap-3">
    <a href="/users/edit?id=<?= $data->user->id ?>" class="btn btn-warning"><span class="material-symbols-outlined">edit</span></a>
    <a href="/users/delete?id=<?= $data->user->id ?>" class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a>
    <a href="/users" class="btn btn-success"><span class="material-symbols-outlined">arrow_back</span></a>
</div>

<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->user->display_name ?>
    </h1>

    <p>
        <?= $data->user->email ?>
    </p>
    <p>
        <?= $data->user->username ?>
    </p>
</div>