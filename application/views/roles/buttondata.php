<?php
if (isset($is_view)){
?>
    <script type="text/javascript">
        $("input[type=text]").attr("disabled",true);
        $("input[type=checkbox]").attr("disabled",true);
        $("input[type=radio]").attr("disabled",true);
        $("input[type=file]").attr("disabled",true);
        $("input[type=password]").attr("disabled",true);
        $("select").attr("disabled",true);
        $("textarea").attr("disabled",true);
    </script>
<?php
}
?>
<div class="form-group">
<?php
if (!isset($is_view)){
    if (isset($enable_save)){
        echo '<input type="submit" name="btn_save" value="Save" class="btn btn-success" />&nbsp;&nbsp;'
            . '<input type="submit" name="btn_cancel" value="Cancel" class="btn btn-danger" />';
    } else {
        echo '<input type="submit" name="btn_add" value="Add" class="btn btn-primary" />';
        echo '&nbsp;&nbsp;<input type="submit" name="btn_cancel" value="Reset" class="btn btn-danger" />';
    }
} else {
    echo  '<input type="button" name="btn_cancel" value="Close" class="btn btn-info"'
        . 'onclick="javascript:window.location=\''. site_url() . "/"
        . $this->uri->segment(1) .'\'" />';
}
?>
</div>
