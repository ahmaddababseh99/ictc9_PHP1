<!--In this page can be should create Users-->

<h1>Create User</h1>

<form action="/users/store"  method="post" enctype="multipart/form-data" class="w-50">
    <div class="mb-3">
        <label for="display-name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username">
    </div>
    <div class="mb-3">
        <label for="user-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password-email" name="password">
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile02" name="photo"><span class="material-symbols-outlined">add_a_photo</span></label>

        <input type="file" name="file" class="form-control" id="inputGroupFile02">
    </div>
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>