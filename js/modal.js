/**
 * Created by Virgo on 23/06/2016.
 */

(function ($) {
    $.fn.modal = function (opt) {
        //anything in opt will override $.extend() object

        var settings, createModal,closeModal;
        var body= $('body');
        settings = $.extend(
            {
                'modal' : 'jquery-modal',
                'close' : 'jquery-modal-close',
                'closeText' : '',
                'shade' : 'jquery-modal-shade'
            },opt
        );
        console.log(settings);
        closeModal = function (modal,shade) {
            modal.remove();
            shade.remove();
        };
        createModal = function(data){
            var shade,close,modal;
            shade = $('<div/>',{
                class: settings.shade
            }).on('click',function(){
                //close modal and shade
                closeModal(modal,shade);
            });

            close = $('<a/>', {
                text: settings.closeText,
                class: settings.close,
                href: '#'
            }).on('click',function(e){
                //close modal and shade
                closeModal(modal,shade);
                e.preventDefault(); //for not scrolling after closing
            });

        modal = $('<div/>',{
            html:data,
            class: settings.modal
        }).append(close);
        body.prepend(shade,modal)
    };
        this.on('click',function(e){
            var self = $(this);

            console.log(self.data('action'));
            var $actionv = self.data('action');
            var $uid = self.data('uid');


            $.ajax (
                {
                    url : data14.ajax_url,
                    type : 'post',
                    dataType: 'json',
                    //cache : false,
                    beforeSend: function() {
                        $("#wait").css("display", "block");
                       },
                    data: {
                        action: $actionv,
                        uid: $uid
                    }
                }
            ).done(function(data) {
                    console.log(data);
                    createModal(data.content);
                    $("#wait").css("display", "none");
                }
            ).error(function(){
                    $("#wait").css("display", "none");
                    createModal('there was an error');
                            }
            );

            e.preventDefault(); //for not scrolling after click on a link

        });
    };
}) (jQuery);
jQuery('.modal').modal(
    {
        'modal': 'mo_window',
        'close': 'modal-close',
        'closeText': 'X',
        'shade': 'modal-shade'
    }
);
jQuery(document).on('submit', '.ls_register_form' , function(event){
    event.preventDefault();
    //window.location.replace("http://google.com");
    var $this =  jQuery(this) ;

    var $userName= $this.find('#username').val();
    var $password= $this.find('#password').val();
    var $password2= $this.find('#password2').val();
    var $mobilenum= $this.find('#mobilenum').val();
    var $email= $this.find('#email').val();
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
           action: 'ls_modal_register',
           username : $userName,
           password: $password,
           password2: $password2,
           email: $email,
           mobilenum: $mobilenum,
           _nonce: $_nonce
       },
        success:function(response){
            console.log(response);
            $("#wait").css("display", "none");
            if(response.error){
                $login_message.html(response.message).slideDown(300);
                //console.log(response);

            }
            if(response.success){

                $login_message.removeClass('login-error').addClass('success type-2').html(response.message).slideDown(300);
                $(location).delay(9000).attr('href', response.redirect);
                //window.location.replace(response.redirect) ;
                       }


        },
        error:function(){
            $("#wait").css("display", "none");
            alert('error');
        }


    });
});


