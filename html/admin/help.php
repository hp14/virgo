
<div class="panel-form-row">
    <label for="posts_number">تعداد نوشته ها در هر صفحه: </label>
    <input type="number" id="posts_number" name="posts_number" min="3" max="40" value="<?php
            if(!empty( $ls_options['help']['posts_number'])){
                echo $ls_options['help']['posts_number']; } ?>">
        <input type="file" name="file" >
</div>
<input type="submit" class="panel-btn" name="submit_logo" value="ذخیره تغییرات">

