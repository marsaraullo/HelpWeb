<?php
if (!isset($username)) { $username = ""; }
if (!isset($firstname)) { $firstname = ""; }
if (!isset($middlename)) { $middlename = ""; }
if (!isset($lastname)) { $lastname = ""; }
if (!isset($address)) { $address = ""; }
if (!isset($city)) { $city = ""; }
if (!isset($contact)) { $contact = ""; }
if (!isset($roles)) { $roles = array(0 => '-- unknown --'); }
if (!isset($password)) { $password = ""; }
if (!isset($email)) { $email = ""; }
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
                    <label for="usernmae">User Name:</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>" maxlength="20" placeholder="Username"/>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $password; ?>" maxlength="20" placeholder="Password" />
                </div>
                <div class="form-group">
                    <label for="role_id">Role:</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <?php
                        foreach ($roles as $key => $value) {
                            if ($_SESSION['role_id']!=1 && $key == 1){
                                continue;
                            }
                            if ($role_id==$key) {
                                echo '<option value="' . $key . '" selected>' . $value['rolename'] . '</option>';
                            } else {
                                echo '<option value="' . $key . '">' . $value['rolename'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lastname">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>" maxlength="50" placeholder="Address"/>
                </div>

                <div class="form-group">
                    <label for="lastname">City</label>
                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $city; ?>" maxlength="50" placeholder="City"/>
                </div> 
                
                <div class="form-group">
                    <label for="lastname">Contact No.</label>
                    <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $contact; ?>" maxlength="50" placeholder="Contact"/>
                </div>     

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body bg-gray">
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname; ?>" maxlength="50" placeholder="First Name" />
                </div>

                <div class="form-group">
                    <label for="firstname">Middle Name:</label>
                    <input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo $middlename; ?>" maxlength="50" placeholder="Middle Name"/>
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname; ?>" maxlength="50" placeholder="Last Name"/>
                </div>           

                <div class="form-group">
                    <label for="lastname">E-mail address:</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>" maxlength="255" placeholder="Email Address" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php
echo form_close(); echo "\n";
?>
<div class="clearfix"></div>