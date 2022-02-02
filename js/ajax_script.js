$(function(){
    $('#btn').click(function(e){
        e.preventDefault();
        let goods = $('.list .item').last().attr('data-id');
        $.ajax({
            type: 'POST',
            url: 'goods_ajax.php',
            data: {GOODS: goods},
            success: function(data){
                let result = JSON.parse(data);
                $('.list').append(result.html);
                if($('.list .item').last().attr('data-id') == result.allGoods){
                    $('#btn').hide();
                }
            }
        });
    });
});