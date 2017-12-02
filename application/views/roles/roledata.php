<?php
if (!isset($rolename)) { $rolename = ""; }
if (!isset($roletasks)) { $roletasks = ""; }
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
                    <label for="rolename">Role Name:</label>
                    <input type="text" name="rolename" id="rolename" class="form-control" value="<?php echo $rolename; ?>" placeholder="Role Name" maxlength="30" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body bg-gray">           
                <div class="form-group">
                    <label for="roletasks">Tasks:</label>
                    <textarea name="roletasks" id="roletasks" class="form-control" style="height:75px;"><?php echo $roletasks; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php
echo form_close(); echo "\n";
?>