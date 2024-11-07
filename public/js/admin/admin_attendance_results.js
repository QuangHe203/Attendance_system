document.addEventListener('DOMContentLoaded', () => {
    const selectElement = document.getElementById('tab-select');
    const tabContents = document.querySelectorAll('.tab-content');

    if (selectElement) { 
        const savedValue = localStorage.getItem('selectedTab');
        if (savedValue) {
            selectElement.value = savedValue;
        }

        function showTab(tabId) {
            tabContents.forEach(content => {
                content.style.display = content.id === tabId ? 'block' : 'none';
            });
        }

        selectElement.addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            showTab(selectedValue);

            localStorage.setItem('selectedTab', selectedValue);
        });

        showTab(selectElement.value);
    } else {
        console.error("Không tìm thấy phần tử với id 'tab-select'.");
    }
});

function showStudentAttendanceResults() {
    var student_id = document.getElementById("search-studentId").value;
    var subject = document.getElementById("select-subject").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.table) {
                document.getElementById("student_attendance_list").innerHTML =
                    response.table;
            } else {
                document.getElementById("student_attendance_list").innerHTML =
                    "<b>" + response.message + "</b>";
            }
        }
    };

    /*if (student_id === "") {
        xmlhttp.open("GET", "/attendance_result/list", true);
    } else {
        xmlhttp.open("GET", "/attendance_result/search?student_id=" + student_id + "&subject=" + subject, true);
    }
        */
    xmlhttp.open("GET", "/student_attendance_result/search?student_id=" + student_id + "&subject=" + subject, true);
    xmlhttp.send();
}

function showTeacherAttendanceResults() {
    var teacher_id = document.getElementById("search-teacherId").value;
    var department = document.getElementById("select-department").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.table) {
                document.getElementById("teacher_attendance_list").innerHTML =
                    response.table;
            } else {
                document.getElementById("teacher_attendance_list").innerHTML =
                    "<b>" + response.message + "</b>";
            }
        }
    };
    
    xmlhttp.open("GET", "/teacher_attendance_result/search?teacher_id=" + teacher_id + "&department=" + department, true);
    xmlhttp.send();
}