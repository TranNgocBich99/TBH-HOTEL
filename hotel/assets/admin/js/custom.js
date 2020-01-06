(function($){
    'use strict';
    $('.btn-delete').click(function (e) {
        var deleteConf = confirm("Bạn có muốn xóa không?");
        if(!deleteConf){
            e.preventDefault();
        }
    });
     
})(jQuery);