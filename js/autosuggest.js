/**
 * Created by Virgo on 29/06/2016.
 */
jQuery(document).ready(function($){
    $('.autosuggest').keyup(function(){
        var self = $(this);

        var $action = self.data('action');
        var $search_term = self.attr('value');
        $.ajax(
            {
                url: data14.ajax_url,
                type: 'post',
               dataType: 'json',
                beforeSend: function () {
                    $("#autosuggest_pic").css("display", "block");
                },
                data: {
                    action: $action,
                    search_term: $search_term
                },
                success:function(response){
                    console.log(response);
                    //console.log(response[0]);
                    $('.result_drop').html("");
                    for (i = 0; i < response.length; i++) {
                        $('.result_drop').append("<a href='"+ response[i].guid +"'><li>"+ response[i].post_title +"</li></a>")  ;
                    }
                    if (response.emptysearch){
                        $('.result_drop').append("<li> "+response.emptysearch+"</li>")  ;
                    }
                    $("#autosuggest_pic").css("display", "none");
                    /*written by mohammad mehdi hossein pour*/;
                },
                error: function(){
                    alert('error happend');
                 // console.log('error');
                }

            }
        );
    });
});