require('./bootstrap');

require('alpinejs');

let userId = document.head.querySelector('meta[name="current"]').content;
let role = document.head.querySelector('meta[name="role"]').content;
// console.log(userId);
Echo.private('App.Models.User.'+userId).notification((notification) => {
    console.log(notification);

    if (role == "2") {

        $(".notif-count").html(notification.count);
        let html = ''+
        '<a href="'+notification_url+'/'+notification.id+'" class="dropdown-item adminRead">'+
            '<span class="dropdown-item-icon">'+
                '<img src="'+notification.data.icon+'" style="width: 50px; height:50px; object-fit:cover; border-radius:20px" alt="">'+
            '</span>'+
            '<span class="dropdown-item-desc">'+notification.data.body+
                '<span class="time">now</sapn>'+
            '</span>'+
        '</a>';
        $(".notifications-prepend").prepend(html)
        if(notification.notif.read_at == null || notification.notif.read_at == ''){
            $('.adminRead').addClass('dropdown-item-unread');
        }
        $(".notifications-prepend").css({
            "max-height": "300px",
           " overflow-y":" auto !important",
        });
    }
});
