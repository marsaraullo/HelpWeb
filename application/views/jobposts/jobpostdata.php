<?php
if (!isset($title)) { $title= ""; }
if (!isset($min_cost)) { $min_cost = ""; }
if (!isset($actual_cost)) { $actual_cost = ""; }
if (!isset($max_cost)) { $max_cost = ""; }
if (!isset($description)) { $description = ""; }
if (!isset($id)) { $id = 0; }
echo form_open($form_url); echo "\n";
?>
<?php
include 'buttondata.php';
?>
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body bg-gray">
                <div class="form-group">
                    <label for="category_name">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>" maxlength="30" placeholder="Title" required/>
                </div>
                <div class="form-group">
                    <label for="category_name">Minimum:</label>
                    <input type="text" name="min_cost" id="min_cost" class="form-control" value="<?php echo $min_cost; ?>" maxlength="30" placeholder="Minimum" required/>
                </div>

                <div class="form-group">
                    <label for="category_name">Actual:</label>
                    <input type="text" name="actual_cost" id="actual_cost" class="form-control" value="<?php echo $actual_cost; ?>" maxlength="30" placeholder="Actual" required/>
                </div>
                
                <div class="form-group">
                    <label for="category_name">Maximum:</label>
                    <input type="text" name="max_cost" id="category_name" class="form-control" value="<?php echo $max_cost; ?>" maxlength="30" placeholder="Maximum" required/>
                </div>                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body bg-gray">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" style="height:100px;" placeholder="Description"><?php echo $description; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
echo form_hidden('asker_id', $_SESSION['user_id']);
echo form_close();
?>