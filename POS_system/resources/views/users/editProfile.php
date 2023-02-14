<!--In this page can be should edit profile user-->
<h1>Edit Profile</h1>

<form action="/users/prfileeditdone" method="POST" enctype="multipart/form-data" class="w-50 container">
    <input type="hidden" name="id" value="<?= $data->user->id ?>">
    <div class="mb-3">
        <label for="display_name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name" value="<?= $data->user->display_name ?>">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email" value="<?= $data->user->email ?>">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username" value="<?= $data->user->username ?>">
    </div>
    <div class="input-group mb-3">
        <input type="file" class="form-control" name="file" id="inputGroupFile02">
        <label class="input-group-text" for="inputGroupFile02" name="photo"><span class="material-symbols-outlined">add_a_photo</span></label>
    </div>

    <button type="submit" class="btn btn-warning mt-4">Update</button>

    </div>

</form>