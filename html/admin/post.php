<div class="panel-form-row">
    <label for="posts_number">تعداد نوشته ها در هر صفحه: </label>
    <input type="number" id="posts_number" name="posts_number" min="3" max="40" value="<?php
            if(!empty( $ls_options['post']['posts_number'])){
                echo $ls_options['post']['posts_number']; } ?>">
</div>
<input type="submit" class="panel-btn" name="submit_logo" value="ذخیره تغییرات">

<hr>
<div class="panel-form-row">
    <label for="posts_number">پاک کردن آمار بازدید</label><br>
    <input type="submit" onclick="confirm('پاک کردن آمار بازدید بیشتر از یک ماه اخیر?')"  class="panel-btn del_views_button" name="del_views_more_1m" value="پاک کردن آمار بازدید بیشتر از یک ماه اخیر"><br>
    <input type="submit" onclick="confirm('پاک کردن آمار بازدید بیشتر از یک سال اخیر?');" class="panel-btn del_views_button" name="del_views_more_1y" value="پاک کردن آمار بازدید بیشتر از یک سال اخیر"><br>
    <input type="submit" onclick="confirm('پاک کردن همه آمارهای بازدید?');" class="panel-btn del_views_button" name="del_views_all" value="پاک کردن همه آمارهای بازدید"><br>
   <?php var_dump($_POST);
   if($_POST['del_views_more_1m'] || $_POST['del_views_more_1y'] || $_POST['del_views_all']){
if($_POST['del_views_more_1m']){$days = 30;
}elseif($_POST['del_views_more_1y']){
    $days = 365;
}elseif($_POST['del_views_all']){
    $days = 0;
}
       global $wpdb,$table_prefix;
       $num_of_30day = $days *24*60*60;
       $num_of_30_days_ago = time() - $num_of_30day;
       $wpdb->query(
       	" DELETE FROM {$table_prefix}user_visited_data
       			 WHERE date_visited < $num_of_30_days_ago
       			"
       );
       $wpdb->last_query;
       var_dump($days);
   }
//   $wpdb->get_results(
//       "SELECT
//       table_name AS Table,
//       round(((data_length + index_length) / 1024 / 1024), 2) Size in MB
//   FROM information_schema.TABLES
//   WHERE table_schema = '$wpdb->dbname'
//       AND table_name = '{$table_prefix}user_visited_data'
//       ",OBJECT);
//   var_dump($yy);
   ?>
</div>