<div class="panel-form-row">
    <img width="150" height="150" src="<?php
    if(!empty( $ls_options['general']['ls_home_logo'])){
        echo $ls_options['general']['ls_home_logo']; }else{
        echo get_template_directory_uri().'/images/gravatar.png'; } ?>" alt="" id="ls_home_logo">
    <input type="hidden" id="ls_home_logo_input" name="ls_home_logo" value="<?php
        if(!empty( $ls_options['general']['ls_home_logo'])){
            echo $ls_options['general']['ls_home_logo']; }else{
            echo get_template_directory_uri().'/images/gravatar.png'; } ?>">
    <button data-target="ls_home_logo" data-target-type="image" class="panel-btn select-uploader">choose pic</button>

</div>
<div class="panel-form-row">
    <label for="address">آدرس ما: </label>
    <input type="text" id="address" name="address" value="<?php
            if(!empty( $ls_options['general']['address'])){
                echo $ls_options['general']['address']; } ?>">
    <label for="phone">شماره تماس با ما: </label>
        <input type="text" id="phone" name="phone" value="<?php
                if(!empty( $ls_options['general']['phone'])){
                    echo $ls_options['general']['phone']; } ?>">
    <label for="phone" style="display: block">درباره ما: </label>
    <textarea style="margin: 50px 10px;" name="about_us" id="about_us" cols="100" rows="10"><?php
                    if(!empty( $ls_options['general']['about_us'])){
                        echo $ls_options['general']['about_us']; } ?></textarea>
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
                            <div>
                                <label for="instagram">instagram</label>
                                <input id="instagram" type="text" class="panel-" name="instagram" placeholder="instagram" value="<?php
                                if (isset($ls_options['general']['instagram'])) {
                                    echo $ls_options['general']['instagram'];
                                } ?>">
                            </div>
                            <div>
                                <label for="twitter">twitter</label>
                                <input id="twitter" type="text" class="panel-" name="twitter" placeholder="twitter" value="<?php
                                if (isset($ls_options['general']['twitter'])) {
                                    echo $ls_options['general']['twitter'];
                                } else {
                                    echo '';
                                } ?>">
                            </div>
                            <div>
                                <label for="stumble">stumble</label>
                                <input id="stumble" type="text" class="panel-" name="stumble" placeholder="stumble" value="<?php
                                if (isset($ls_options['general']['stumble'])) {
                                    echo $ls_options['general']['stumble'];
                                } else {
                                    echo '';
                                } ?>">
                            </div>
                            <div>
                                <label for="telegram">telegram</label>
                                <input id="telegram" type="text" class="panel-" name="telegram" placeholder="telegram" value="<?php
                                if (isset($ls_options['general']['telegram'])) {
                                    echo $ls_options['general']['telegram'];
                                }  ?>">
                            </div>
                            <div>
                                <label for="dribble">dribble</label>
                                <input id="dribble" type="text" class="panel-" name="dribble" placeholder="dribble" value="<?php
                                if (isset($ls_options['general']['dribble'])) {
                                    echo $ls_options['general']['dribble'];
                                } ?>">
                            </div>
                            <div>
                                <label for="vimeo">vimeo</label>
                                <input id="vimeo" type="text" class="panel-" name="vimeo" placeholder="vimeo" value="<?php
                                if (isset($ls_options['general']['vimeo'])) {
                                    echo $ls_options['general']['vimeo'];
                                } ?>">
                            </div>
                        </div>
<input type="submit" class="panel-btn" name="submit_logo" value="ذخیره تغییرات">