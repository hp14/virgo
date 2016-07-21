jQuery(document).ready(function($){

    var custom_uploader;

    $(".select-uploader").click(function(e) {

        e.preventDefault();
         var $this = $(this);
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        $this.css("color", "red");
		var target = $this.data('target');
		var target_type = $this.data('target-type');


        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'انتخاب تصویر',
            button: {
                text: 'انتخاب تصویر'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            console.log(attachment);
            switch (true) {
                case target_type === 'image' :
                    $('#' + target).attr('src',attachment.url);
                    $('#' + target + '_input').val(attachment.url);

                    break;
                case target_type === 'textbox' :
                         $('#'+target).val(attachment.url);
                        $('#' + target+'_img').attr('src',attachment.url);
                         break;
            }



        });

        //Open the uploader dialog
        custom_uploader.open();

    });

$('.hide1414').hide();
    //var xx= $("input[type='radio']").prop('checked',true);
    //$("input[type='radio']").prop('checked',function(){
    //    var $this = $(this);
    //    alert($this.val());
    //});
$("#link_r_1414").click(function(){
    $("#popup1414").hide();
    $("#modal1414").hide();
    $("#link1414").show();

});
    $("#link_popup1414").click(function(){
        $("#modal1414").hide();
        $("#popup1414").show();
        $("#link1414").show();
    });
    $("#modal_r_1414").click(function(){
        $("#modal1414").show();
        $("#popup1414").hide();
        $("#link1414").hide();
    });
    $("#modal_popup1414").click(function(){
        $("#modal1414").show();
        $("#popup1414").show();
        $("#link1414").hide();
    });





});