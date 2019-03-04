const closestMonday = () => {
    const currentDate = new Date(); // current date
    const mSecondsInADay = 8.64e+7; // milliseconds per day
    let days_to_monday = 8 - currentDate.getUTCDay(); // days left to closest Monday
    if (days_to_monday === 8) {days_to_monday = 1} // solves Sunday bug
    const monday_in_sec = currentDate.getTime() + days_to_monday * mSecondsInADay; // earliest UTC Monday in seconds from 1970
    const next_monday = new Date(monday_in_sec); // Monday in date object
    next_monday.setUTCHours(0,0,0);
    return Math.floor((next_monday - currentDate)/1000);
}

const counter = () => {
    let seconds = closestMonday();
    document.getElementById('diff').innerHTML = seconds + '<br>';
    const days = Math.floor(seconds / (24 * 3600));
    const hours = Math.floor((seconds - days * 24 * 3600) / 3600);
    const minutes = Math.floor((seconds % 3600) / 60);
    seconds = seconds % 60;

    document.getElementById('days').innerHTML = days + ' day(s)<br>';
    document.getElementById('hours').innerHTML= hours + ' hour(s)<br>';
    document.getElementById('minutes').innerHTML = minutes + ' minute(s)<br>';
    document.getElementById('seconds').innerHTML = seconds + ' second(s)<br>';
}

setInterval(counter, 1000);