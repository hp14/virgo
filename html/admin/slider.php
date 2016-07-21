<?php echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
$slider = get_option('slider_options');
$old_count= get_option('slider_num1');
$mt= time();
//unset ($slider['row']['url']);
if(isset($_POST['submit_slider'])) {

    /* number of rows*/
    $slider['number'] = sanitize_text_field($_POST['slider_number']);

    /*check box */
    if (isset($_POST['slider_checkbox'])) {
        $slider['slider_checkbox'] = $_POST['slider_checkbox'];
    } else {unset($slider['slider_checkbox']);}
/* end check box */



    foreach ($_POST as $key => $value) {
        if(preg_match('/url/',$key)) {
            if (!empty($_POST[$key])) {
                $slider['row']['url'][$key] = sanitize_text_field($_POST[$key]);
            } else {
                unset($slider['row']['url'][$key]);
            }
       }
        if(preg_match('/transition/',$key)) {
                    if (!empty($_POST[$key])) {
                        $slider['row']['effect'][$key] = sanitize_text_field($_POST[$key]);
                    } else {
                        unset($slider['row']['effect'][$key]);
                    }
               }
}
            update_option('slider_options', $slider);
           //unset($slider['urls']['slider_checkbox']);
        }
var_dump($slider);
var_dump($_POST);

    ?>
<div class="meta-box-roe">
    <form action="" method="post">
        <div class="">
            <div>
                <label for="slider_checkbox">نمایش اسلایدر در صفحه اصلی</label>
                <input type="checkbox" name="slider_checkbox" id="slider_checkbox" value="on"
                    <?php if(isset($slider['slider_checkbox'])) { echo'checked'; } else echo ""; ?>>
            </div>
        </div>

    <?php $slider_counter=0;

    foreach ($slider['row']['url'] as $key => $value) {

        if (!empty($value)) {
            isset($slider['row']['effect']) ?   $effect= $slider['row']['effect'] : $effect = 'select_box';
            $slider_counter++;
            $st++;
            //$effect= 'slideleft';
            echo '<input type="text" id="'.$key.'"  name="'.$key.'" style="width: 50%; height: 30px;"  class="input" value="' .$value. '">
                <button data-target="'.$key.'" data-target-type="textbox" class="panel-btn select-uploader">انتخاب تصویر</button>
                        <label for="'.$effect.'">نوع افکت</label>
        <select name="'.$effect.'" id="'.$effect.'">
            <option value="fade" '.selected( $effect, "fade").' >fade</option>
            <option value="slideup" '.selected( "$effect","slideup").'>slideup</option>
            <option value="slidedown" '.selected( $effect , "slidedown").'>slidedown</option>
            <option value="slideleft" '.selected( $effect ,"slideleft").'>slideleft</option>
            <option value="slideright" '.selected( $effect , "slideright").'>slideright</option>
        </select>
        <hr>
            ';
        }
    }
    update_option('slider_num1',$slider_counter);
    $x1= get_option('slider_id');
    if($slider_counter>=$old_count) {
        $x2 = $x1 - $old_count + $slider_counter;
    }else{$x2 = $x1;}
if(isset($_POST['submit_slider'])){
    update_option('slider_id',$x2);
}

    for($i=$slider_counter ; $i<$slider['number'] ; $i++){
        $mt++;
        ?>
        <input type="text" id="url_<?php echo $i; ?>" name="url_<?php echo $i; ?>" style="width: 50%; height: 30px;"  class="input" value="">
        <button data-target="url_<?php echo $i; ?>" data-target-type="textbox" class="panel-btn select-uploader">انتخاب تصویر</button>
        <label for="transition_<?php echo $mt; ?>">نوع افکت</label>
        <select name="transition_<?php echo $mt; ?>" id="transition_<?php echo $mt; ?>">
            <option name="fade" value="fade">fade</option>
            <option name="slideup" value="slideup">slideup</option>
            <option name="slidedown" value="slidedown">slidedown</option>
            <option name="slideleft" value="slideleft">slideleft</option>
            <option name="slideright" value="slideright">slideright</option>
        </select>

  <?php   }  ?>
        <input type="number" id="posts_number" name="slider_number" min="<?php echo $slider_counter; ?>" max="40" value=
        "<?php  echo $slider['number'];  ?>">
        <input type="submit" class="panel-btn" name="submit_slider" value="ذخیره تغییرات">
        <?php

     ?>
    </form>


    </div>
<?php
echo '</div>';