<h1>Edit Items</h1>

<form action="/transctions/editdone" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
        <label for="post-title" class="form-label">Item Name</label>
    <select name="item_id" id="" class="form-control">
        <?php
        foreach ($data->item as $i) {
            if ($i->id == $data->transaction->item_id) {
        ?>
                <option value="<?= $i->id ?>" selected> <?= $i->item_name ?></option>

            <?php

            } else {
            ?>
                <option value="<?= $i->id ?>"><?= $i->item_name ?></option>
        <?php
            }
        }
        ?>
    </select>

    <div class="mb-3">
        <label for="post-title" class="form-label">Item Quantity</label>
        <input type="text" class="form-control" id="post-title" name="ItemQuantity" value="<?= $data->transaction->ItemQuantity ?>">
    </div>

    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>