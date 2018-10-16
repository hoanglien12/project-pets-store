/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});

        jQuery(document).ready(function($) {
            "use strict";
            var date_now = new Date();
            var day = date_now.getDate();
            var month = date_now.getMonth() + 1;
            var year = date_now.getFullYear();
            var current_day = day + '-' + month + '-' + year;
            console.log(current_day);
            $(function () {
                $('[data-toggle="datepicker"]').datepicker({
                    autoHide: true,
                    format: 'dd-mm-yyyy',
                    date: current_day, // @check nếu tồn tại biến truyền vào thì set. không thì set mặc định ngày hiện tại
                    endDate: current_day,
                    changeMonth: false,
                    changeYear: false,
                    // days: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
                    // daysShort: ["CN", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
                    // daysMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                    // months: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                    // monthsShort: ["Th1", "Th2", "Th3", "Th4", "Th5", "Th6", "Th7", "Th8", "Th9", "Th10", "Th11", "Th12"],
                    // today: "Hôm nay",
                    // clear: "Xóa",
                });
                $('#datepicker-right').datepicker({
                    container: 'div#datepicker-right',
                    inline: true,
                    format: 'dd-mm-yyyy',
                    date: current_day, // @check nếu tồn tại biến truyền vào thì set. không thì set mặc định ngày hiện tại
                    endDate: current_day,
                    changeMonth: false,
                    changeYear: false,
                    // days: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
                    // daysShort: ["CN", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
                    // daysMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                    // months: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                    // monthsShort: ["Th1", "Th2", "Th3", "Th4", "Th5", "Th6", "Th7", "Th8", "Th9", "Th10", "Th11", "Th12"],
                    // today: "Hôm nay",
                    // clear: "Xóa",
                });

                $('#datepicker-right .datepicker-panel > ul > li[data-view="month current"]').click(function(){
                    return false;
                });
                $('#datepicker-right .datepicker-panel > ul[data-view="days"] > li').click(function(){
                    goToUrl('thongke/thongke-mien-lo.php');
                });
            });

        });

        
