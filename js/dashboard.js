// Live Clock
function updateClock(){

    let now = new Date();

    document.getElementById("clock").innerHTML =
        now.toLocaleString();

}

setInterval(updateClock,1000);

// Welcome Message
window.onload = function(){

    console.log("Dashboard Loaded Successfully");

};
