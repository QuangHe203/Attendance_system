document.addEventListener("DOMContentLoaded", function () {
    // Khi chọn học kỳ -> hiện môn học trong học kỳ
    const semesterSelect = document.getElementById("semester");
    if (semesterSelect) {
        semesterSelect.addEventListener("change", function () {
            document.querySelectorAll(".semester-content").forEach(function (div) {
                div.style.display = "none";
            });

            document.querySelectorAll(".display-attendance").forEach(function (div) {
                div.style.display = "none";
            });

            subjects.forEach((sub) => sub.classList.remove("active"));

            const selectedValue = this.value;
            if (selectedValue) {
                const selectedSemester = document.getElementById(selectedValue);
                if (selectedSemester) {
                    selectedSemester.style.display = "block";
                }
            }
        });
    }

    // Khi chọn môn học -> hiện kết quả điểm danh
    const subjects = document.querySelectorAll(".subject");
    const displayAttendances = document.querySelectorAll(".display-attendance");

    if (subjects.length > 0) {
        subjects.forEach((subject) => {
            subject.addEventListener("click", function () {
                displayAttendances.forEach((div) => {
                    div.style.display = "none";
                });

                const index = this.getAttribute("data-index");
                if (index && displayAttendances[index]) {
                    displayAttendances[index].style.display = "block";
                }

                subjects.forEach((sub) => sub.classList.remove("active"));
                this.classList.add("active");
            });
        });
    }

    // JS chọn hiển thị điểm danh hoặc chấm công
    const selectElement = document.getElementById("select");
    if (selectElement) {
        selectElement.addEventListener("change", function () {
            const attendanceDiv = document.getElementById("attendance");
            const resultDiv = document.getElementById("attendance-result");

            if (this.value === "result") {
                if (attendanceDiv) attendanceDiv.style.display = "none";
                if (resultDiv) resultDiv.style.display = "block";
            } else {
                if (attendanceDiv) attendanceDiv.style.display = "block";
                if (resultDiv) resultDiv.style.display = "none";
            }
        });
    }
});
