
<div class="panel-form-row">
    <label for="address">آدرس ما: </label>
    <input type="text" id="address" name="address" value="<?php
            if(!empty( $ls_options['general']['address'])){
                echo $ls_options['general']['address']; } ?>">
    <label for="phone">شماره تماس با ما: </label>
        <input type="text" id="phone" name="phone" value="<?php
                if(!empty( $ls_options['general']['phone'])){
                    echo $ls_options['general']['phone']; } ?>">

</div>
<hr>

<div class="socials">
                <h3>تنظیمات شبکه های اجتماعی</h3>
                            <div>
                                <label for="facebook">facebook</label>
                                <input id="facebook" type="text" class="panel-" name="facebook" placeholder="facebook"
                                       value="<?php
                                       if (isset($ls_options['general']['facebook'])) {
                                           echo $ls_options['general']['facebook'];
                                       } ?>">
                            </div>
                        </div>
<input type="submit" class="panel-btn" name="submit_logo" value="ذخیره تغییرات">