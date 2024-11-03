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

function showStudentAttendanceResult(query) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.table) {
                document.getElementById("student_attendance_list").innerHTML = response.table;
            } else {
                document.getElementById("student_attendance_list").innerHTML = "<b>" + response.message + "</b>";
            }
        }
    };

    if (query === "") {
        xmlhttp.open("GET", "/attendance_result/list", true);
    } else {
        xmlhttp.open("GET", "/attendance_result/search?q=" + query, true);
    }
    xmlhttp.send();
}

