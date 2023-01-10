<!-- This page edit items -->
<h1>Edit item</h1>

<form action="/item/editdone" method="POST" style="margin-top: -70px;">
    <input type="hidden" name="id" value="<?= $data->data->id ?>">
    <div class="mb-3">
        <label for="post-title" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="post-title" name="item_name" value="<?= $data->data->item_name ?>">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">Item Price</label>
        <input type="text" class="form-control" id="post-title" name="price" value="<?= $data->data->price ?>">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">Item Cost</label>
        <input type="text" class="form-control" id="post-title" name="cost" value="<?= $data->data->cost ?>">
    </div>
    <div class="mb-3">
        <label for="post-title" class="form-label">Item Quantity</label>
        <input type="text" class="form-control" id="post-title" name="quantity" value="<?= $data->data->quantity ?>">
    </div>
   


    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>