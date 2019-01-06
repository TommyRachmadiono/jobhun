import Vue from "vue"

Vue.filter("toFullDate", value => {
		var hari= ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
        var bulan= ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        var timenumb = new Date(value);
        var day = hari[timenumb.getDay()];
        var mon = bulan[timenumb.getMonth()];
        var dat = timenumb.getDate();
        var year = timenumb.getFullYear();
        var jam = timenumb.getHours();
        if(jam<10)
        {
        	jam = "0"+jam;
        }
        var mnt = timenumb.getMinutes();
        if(mnt<10)
        {
        	mnt = "0"+mnt;
        }
        return day + ", " + dat + " " + mon + " " + year + " " + jam + ":" + mnt;
    });

Vue.filter("toFullDateSimple", value => {
        var hari= ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
        var bulan= ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        var timenumb = new Date(value);
        var day = hari[timenumb.getDay()];
        var mon = bulan[timenumb.getMonth()];
        var dat = timenumb.getDate();
        var year = timenumb.getFullYear();
        
        return day + ", " + dat + " " + mon + " " + year;
    });

Vue.filter("toDd-Mm-Yyyy", value =>{
    var timenumb = new Date(value);
    var year = timenumb.getFullYear();
    var mon = timenumb.getMonth();
    var dat = timenumb.getDate();
    if(dat<10)
    {
        dat = "0"+dat;
    }
    if(mon<10)
    {
        mon = "0"+mon;
    }
    return dat + "-" + mon + "-" + year;
});

Vue.filter("timeDifference", value =>{
    var bulan= ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            var now = new Date();
            var theTime = new Date(value);
            var secondsPast = (now.getTime() - theTime.getTime()) / 1000;
            if(secondsPast < 60){
              return parseInt(secondsPast) + 's';
            }
            if(secondsPast < 3600){
              return parseInt(secondsPast/60) + 'm';
            }
            if(secondsPast <= 86400){
              return parseInt(secondsPast/3600) + 'h';
            }
            if(secondsPast > 86400){
                var day = theTime.getDate();
                var month = bulan[theTime.getMonth()];
                var year = theTime.getFullYear() == now.getFullYear() ? "" :  " "+theTime.getFullYear();
                return day + " " + month + year;
            }
});