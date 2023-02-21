<div class="form-floating mb-2">
    <input class="form-control" placeholder=" " name="<?php echo empty($confirm) ? $campo_dado : "confirma_$campo_dado" ?>" <?php
                                                                                                                            if (isset($type)) echo "type=\"$type\"";
                                                                                                                            if (isset($type) && $type == "password") echo "autocomplete=\"new-password\"";
                                                                                                                            if (isset($max_length)) echo "maxlength=\"$max_length\"";
                                                                                                                            if (empty($dont_autofill) && empty($confirm) && isset($_SESSION[$campo_dado])) echo "value=\"$_SESSION[$campo_dado]\"";
                                                                                                                            if (empty($dont_autofill) && !empty($confirm) && isset($_SESSION["confirma_$campo_dado"])) echo "value=\"" . $_SESSION["confirma_$campo_dado"] . "\""
                                                                                                                            ?>>

    <label for="<?php echo $campo_dado; ?>">
        <?php echo isset($display_text) ? $display_text : ucfirst($campo_dado);
        if (!empty($required)) { ?>
            <span class="text-danger">*</span>
        <?php } ?>
    </label>
</div>