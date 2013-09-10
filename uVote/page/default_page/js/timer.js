$(function(){
    $('.countdown').countdown({
        date: "June 7, 2087 15:03:26",
        render: function(data) {
                    $(this.el).text(this.leadingZeros(data.years, 4) + "j " + this.leadingZeros(data.days, 3) + "t " + this.leadingZeros(data.hours, 2) + "s " + this.leadingZeros(data.min, 2) + "m " + this.leadingZeros(data.sec, 2) + "s");
                    $(this.el).parent().children('.countdownbar').width('70%');
                }
    });
});