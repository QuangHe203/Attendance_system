// Khi chọn học kỳ -> hiện môn học trong học kỳ
document.getElementById("semester").addEventListener("change", function () {
    document.querySelectorAll(".semester-content").forEach(function (div) {
        div.style.display = "none";
    });

    document.querySelectorAll(".display-attendance").forEach(function (div) {
        div.style.display = "none";
    });

    subjects.forEach((sub) => sub.classList.remove("active"));
    
    const selectedValue = this.value;

    if (selectedValue) {
        document.getElementById(selectedValue).style.display = "block";
    }
});

// Khi chọn môn học -> hiện kết quả điểm danh
const subjects = document.querySelectorAll(".subject");
const displayAttendances = document.querySelectorAll(".display-attendance");

subjects.forEach((subject) => {
    subject.addEventListener("click", function () {
        displayAttendances.forEach((div) => (div.style.display = "none"));
        
        const index = this.getAttribute("data-index");
        
        if (displayAttendances[index]) {
            displayAttendances[index].style.display = "block";
        }

        subjects.forEach((sub) => sub.classList.remove("active"));
        
        this.classList.add("active");
    });
});
