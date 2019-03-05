function secondsTillMonday() {
    const currentDate = new Date(); // current date
    const mSecondsInADay = 8.64e+7; // milliseconds per day
    let days_to_monday = 8 - currentDate.getUTCDay(); // days left to closest Monday
    if (days_to_monday === 8) {days_to_monday = 1} // solves Sunday bug
    const monday_in_msec = currentDate.getTime() + days_to_monday * mSecondsInADay; // earliest UTC Monday in seconds from 1970
    const next_monday = new Date(monday_in_msec); // Monday in date object
    next_monday.setUTCHours(0,0,0);
    return Math.floor((next_monday - currentDate)/1000); // Seconds till earliest UTC Monday
}

function counter(seconds) {
    document.getElementById('diff').innerHTML = seconds + 's till the nearest UTC Monday. This computes to:';
    const days = Math.floor(seconds / (24 * 3600));
    let hours = Math.floor((seconds % (24 * 3600)) / 3600);
    let minutes = Math.floor((seconds % 3600) / 60);
    seconds = seconds % 60;
    if(hours < 10) hours = "0" + hours;
    if(minutes < 10) minutes = "0" + minutes;
    if(seconds < 10) seconds = "0" + seconds;

    document.getElementById('days').innerHTML = days + ' day(s)';
    document.getElementById('hours').innerHTML= hours + ' hour(s)';
    document.getElementById('minutes').innerHTML = minutes + ' minute(s)';
    document.getElementById('seconds').innerHTML = seconds + ' second(s)';
}

let seconds = secondsTillMonday();
setInterval(function() {
    counter(seconds);
    seconds--;
}, 1000);