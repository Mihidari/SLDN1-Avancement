let end = 1571356800000;
let docDate = document.getElementById("date");

const getRemain =() => {

    let date = Date.now();
    let remain = end - date;
    let hours = Math.floor(remain/3600000);
    remain = remain - (hours*3600000);
    let minutes = Math.floor(remain/60000);
    remain = remain - (minutes*60000);
    let secondes = Math.floor(remain/1000);
    let dateStr = "";
    if (hours < 10) {
        dateStr += "0" + hours.toString() + ":";
    }
    else {
        dateStr += hours.toString() + ":";
    }
    if (minutes < 10) {
        dateStr += "0" + minutes.toString() + ":";
    }
    else {
        dateStr += minutes.toString() + ":";
    }
    if (secondes < 10) {
        dateStr += "0" + secondes.toString();
    }
    else {
        dateStr += secondes.toString();
    }
    docDate.innerHTML = dateStr;

};

getRemain();
setInterval(getRemain, 1000);