jQuery('.toggle').on('click', function($) {
  jQuery('.container').stop().addClass('active');
});
jQuery('.close').on('click', function() {
  jQuery('.container').stop().removeClass('active');
});
jQuery(document).on('click', '.load-more' , function(event){
    event.preventDefault();
    console.log('load-more');
    var pagevar= parseInt(jQuery(this).data('page'));
    //alert($page);
    var $this =  jQuery(this) ;
    $this.text('....');
    jQuery.ajax({
        url: data14.ajax_url,
        type: 'post',
       dataType: 'json',
        beforeSend: function() {
                                $("#wait").css("display", "block");
                               },
       data: {
           action: 'load_more_content',
           page: pagevar
       },
        success:function(response){
            $("#wait").css("display", "none");

            if(parseInt(response.count) > 0 ){
            $this.text('مطلب بیشتر');

                jQuery('.post-loop').parent().append(response.content);
            $this.data('page',parseInt(pagevar+1));
            }

        },
        error:function(){
            $("#wait").css("display", "none");
            alert('error');
        }


    });
});

jQuery(document).on('click', '.like-post' , function(event){
    event.preventDefault();
    var $this =  jQuery(this) ;


    var $post_id= parseInt($this.data('pid'));

    if(parseInt($this.data('liked')) ==1){
       // alert('شما قبلا رای داده اید')
        //return false;
    }

    jQuery.ajax({
        url: data14.ajax_url,
        type: 'post',
       dataType: 'json',
        beforeSend: function() {
                                       $("#wait").css("display", "block");
                                      },
       data: {
           action: 'like_post',
           post_id : $post_id
       },
        success:function(response){
            $("#wait").css("display", "none");
            if(response.success){
                $this.parent().find('i').html("");
                if(response.increase){
                    $this.parent().find('i').addClass('is_liked');     }
                if(response.decrease){
                                    $this.parent().find('i').removeClass('is_liked');     }
                $this.parent().find('i').append("<p id='like_number'>"+ response.count +"</p>");//html(response.count);
                $this.data('liked' , 1);
                console.log(response);
            }
            //alert('success');
            //if(parseInt(response.count) > 0 ){
           // $this.text('مطلب بیشتر');

             //   jQuery('.post-loop').parent().append(response.content);
            //$this.data('page',parseInt(pagevar+1));
           // }

        },
        error:function(){
            $("#wait").css("display", "none");
            alert('error');
        }


    });
});

jQuery(document).on('submit', '#ls-login-form' , function(event){
    event.preventDefault();
    var $this =  jQuery(this) ;


    var $userName= $this.find('#username').val();
    var $password= $this.find('#password').val();
    var $rememberme= $this.find('#rememberme').prop('checked');
    var $_nonce = $('meta[name="_nonce"]').attr('content');
    var $login_message =$('.m220');
    $login_message.slideUp(300);

    jQuery.ajax({
        url: data14.ajax_url,
        type: 'post',
       dataType: 'json',
        beforeSend: function() {
                                               $("#wait").css("display", "block");
                                              },
       data: {
           action: 'ls_user_login',
           username : $userName,
           password: $password,
           remember: $rememberme,
           _nonce: $_nonce
       },
        success:function(response){
            $("#wait").css("display", "none");
            if(response.error){
                $login_message.html(response.message).slideDown(300);
            }
            if(response.success){

                $login_message.removeClass('login-error').addClass('success type-2').html(response.message).slideDown(300);
               //window.location.href = 'https://google.com';
                $(location).delay(9000).attr('href', response.redirect);
                       }


        },
        error:function(){
            $("#wait").css("display", "none");
            alert('error');
        }


    });


    function virgo14_popup() {
        //alert('vvv');
        var popup = document.getElementById('myPopup');
        popup.classList.toggle('show');
    }
});

jQuery(document).on('change', '#most_liked_select' , function(event){
    event.preventDefault();
    var $this =  jQuery(this) ;
    var $time_amount= $this.find(":selected").data('tam');
    var $featureType= $this.find(":selected").data('featuretype');
 //   alert($featureType);
    //alert($(this).find(":selected").data('tam')) ;
    jQuery.ajax({
        url: data14.ajax_url,
        type: 'post',
       dataType: 'json',
        beforeSend: function($) {
            if($featureType == 'like'){
                jQuery(".wait_most_like_by_time").css("display", "block");
                jQuery(".wait_most_comment_by_time").removeClass("wait_most_comment_by_time").addClass("wait_most_like_by_time").css("display", "block");
                jQuery(".wait_most_view_by_time").removeClass("wait_most_view_by_time").addClass("wait_most_like_by_time").css("display", "block");
            }  else if($featureType == 'comment'){
                jQuery(".wait_most_comment_by_time").css("display", "block");
                jQuery(".wait_most_like_by_time").removeClass("wait_most_like_by_time").addClass("wait_most_comment_by_time").css("display", "block");
                jQuery(".wait_most_view_by_time").removeClass("wait_most_view_by_time").addClass("wait_most_comment_by_time").css("display", "block");
            }  else if($featureType == 'view'){
                jQuery(".wait_most_view_by_time").css("display", "block");
                jQuery(".wait_most_like_by_time").removeClass("wait_most_like_by_time").addClass("wait_most_view_by_time").css("display", "block");
                jQuery(".wait_most_comment_by_time").removeClass("wait_most_comment_by_time").addClass("wait_most_view_by_time").css("display", "block");
           }

            $this.parent().parent().parent().find('.most_like_by_time').css('opacity',0.2);
                                      },
       data: {
           action: 'ls_moat_featured',
           tam : $time_amount,
           featureType : $featureType
       },
        success:function(response){
            jQuery(".wait_most_like_by_time").css("display", "none");
            jQuery(".wait_most_comment_by_time").css("display", "none");
            jQuery(".wait_most_view_by_time").css("display", "none");
          //  $this.parent().parent().parent().find('.most_like_by_time').css('opacity',1);
            if(response.success){

                $this.parent().parent().parent().find('.most_like_by_time').html('');
                $this.parent().parent().parent().find('.most_like_by_time').append(response.content).css('opacity',1);
            }

        },
        error:function(){
            $("#wait").css("display", "none");
            alert('error');
        }


    });
});


jQuery(document).on('click', '.pagination_li' , function(event){
    // alert(222);
    event.preventDefault();
    var $this =  jQuery(this) ;
   // var $page_href= $this.attr('href');
    var $paged_number= $this.data('numpage');
    var $sri= $this.data('sri');
    var $maxnum= $this.data('maxnum');
    //alert($maxnum);
   // if($paged_number == '»' ){
   //     $paged_number = $this.parent().find('.current').next().text();
   // }else if ($paged_number == '«' ){
   //     $paged_number = $this.parent().find('.current').prev().text();
   // }

    jQuery.ajax({
        url: data14.ajax_url,
        type: 'post',
       dataType: 'json',
        beforeSend: function($) {
            jQuery('.loops_all').css('opacity',0.2);
            jQuery("#wait").css({"display": "block","position": "absolute", "top": "400px"});
                                      },
       data: {
           action: 'ls_pagination_ajax',
           //page_href : $page_href,
           paged_number : $paged_number,
           sri : $sri,
           maxnum : $maxnum
       },
        success:function(response){
            jQuery('.loops_all').css('opacity',1);
            jQuery("#wait").css("display", "none");
            console.log(response);
            if(response.success){

               // $this.parent().parent().parent().find('.most_like_by_time').append(response.content+'#Ajax request successfully received#');
           console.log(response.content);
           console.log(response);
                $this.parent().parent().html(response.pagination);
                jQuery('.loops_all').html(response.content);
            }

        },
        error:function(){
            jQuery("#wait").css("display", "none");
            alert('error');
        }


    });
});



