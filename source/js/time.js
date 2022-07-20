function startTime() {
    const today = new Date();
    const yyyy = today.getFullYear();
    let MM = today.getMonth() + 1;
    let dd = today.getDate();
    const hh=today.getHours();
    let mm=today.getMinutes();
    let ss=today.getSeconds();
    MM=checkTime(MM);
    dd=checkTime(dd);
    mm=checkTime(mm);
    ss=checkTime(ss);
    document.getElementById('nowDateTimeSpan').innerHTML=yyyy+"-"+MM +"-"+ dd +" " + hh+":"+mm+":"+ss;
    setTimeout('startTime()',1000);//每一秒中重新加载startTime()方法
}



function checkTime(i) {
    if (i<10){
        i="0" + i;
    }
    return i;
}