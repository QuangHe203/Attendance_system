// JS khi chọn để xem chi tiết email
window.showEmailContent = function (index) {
    // Ẩn tất cả các email-content bằng cách xóa lớp .active
    const emailContents = document.querySelectorAll(".email-content");
    emailContents.forEach((content) => content.classList.remove("active"));

    // Loại bỏ lớp .selected từ tất cả các email-item
    const emailItems = document.querySelectorAll(".email-item");
    emailItems.forEach((item) => item.classList.remove("selected"));

    // Thêm lớp .active vào email-content được chọn
    const selectedEmail = document.getElementById(`email${index}`);
    if (selectedEmail) {
        selectedEmail.classList.add("active");
    }

    // Thêm lớp .selected vào email-item được chọn
    const selectedItem = emailItems[index];
    if (selectedItem) {
        selectedItem.classList.add("selected");
    }
};

// JS khi click vào Soạn thư
window.openComposeModal = function () {
    document.getElementById("composeModal").style.display = "block";
};

window.closeComposeModal = function () {
    document.getElementById("composeModal").style.display = "none";
};

window.onclick = function (event) {
    const modal = document.getElementById("composeModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

// JS khi chọn đối tượng gửi thư
window.updateOptions = function () {
    const selectBox = document.getElementById("student-teacher");
    const studentOptions = document.getElementById("student-options");
    const teacherOptions = document.getElementById("teacher-options");

    if (selectBox.value === "student") {
        studentOptions.style.display = "inline";
        teacherOptions.style.display = "none";
    } else if (selectBox.value === "teacher") {
        studentOptions.style.display = "none";
        teacherOptions.style.display = "inline";
    } else {
        studentOptions.style.display = "none";
        teacherOptions.style.display = "none";
    }
    getStudent();
    getTeacher();
};

function getStudent() {
    var course_name = document.getElementById("classes").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.table) {
                document.getElementById("student-options").innerHTML =
                    response.table;
            }
        }
    };
    xmlhttp.open(
        "GET",
        "/mail_box/getStudent?course_name=" + course_name,
        true
    );
    xmlhttp.send();
}

function getTeacher() {
    var course_name = document.getElementById("classes").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.table) {
                document.getElementById("teacher-options").innerHTML =
                    response.table;
            }
        }
    };
    xmlhttp.open(
        "GET",
        "/mail_box/getTeacher?course_name=" + course_name,
        true
    );
    xmlhttp.send();
}

function selectOption(name, id) {
    const selectElement = document.getElementById("student-teacher");
    const studentOptions = document.getElementById("student-options");
    const teacherOptions = document.getElementById("teacher-options");

    // Tạo một option mới với giá trị đã chọn
    const newOption = document.createElement("option");
    newOption.textContent = name; // Hiển thị tên học sinh
    newOption.value = id; // Giá trị là ID học sinh

    // Thêm option vào select nếu chưa có
    let exists = false;
    for (let i = 0; i < selectElement.options.length; i++) {
        if (selectElement.options[i].value === newOption.value) {
            exists = true;
            selectElement.selectedIndex = i;
            break;
        }
    }

    if (!exists) {
        selectElement.appendChild(newOption);
        selectElement.selectedIndex = selectElement.options.length - 1;
        studentOptions.style.display = "none";
        teacherOptions.style.display = "none";
    }
}
