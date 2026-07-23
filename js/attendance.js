// Mark All Present
function markAllPresent() {

    document.querySelectorAll("input[value='Present']").forEach(function(item){
        item.checked = true;
    });

}

// Mark All Absent
function markAllAbsent() {

    document.querySelectorAll("input[value='Absent']").forEach(function(item){
        item.checked = true;
    });

}

// Count Attendance
function countAttendance() {

    let present = document.querySelectorAll("input[value='Present']:checked").length;
    let absent = document.querySelectorAll("input[value='Absent']:checked").length;

    document.getElementById("presentCount").innerHTML = present;
    document.getElementById("absentCount").innerHTML = absent;
}
