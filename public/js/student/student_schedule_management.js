let currentMonth = new Date().getMonth() + 1;
let currentYear = new Date().getFullYear();

// Hiển thị lịch nhỏ
window.loadCalendar = function (month, year) {
    $('#month-year').text(`Tháng ${month}-${year}`);
    $.get(`/api/calendar/${month}/${year}`, function(data) {
        let tableBody = $('#calendar-table tbody');
        tableBody.empty();

        let currentDay = new Date().getDate();
        let currentMonth = new Date().getMonth() + 1; // Tháng bắt đầu từ 0
        let currentYear = new Date().getFullYear();

        data.forEach(function(week) {
            let row = '<tr>';
            week.forEach(function(day) {
                if (day) {
                    // Kiểm tra xem ngày có phải là ngày hiện tại không
                    let isToday = (day === currentDay && month === currentMonth && year === currentYear);
                    row += `<td class="day-cell${isToday ? ' selected-day' : ''}" data-day="${day}" data-month="${month}" data-year="${year}">${day}</td>`;
                } else {
                    row += '<td></td>';
                }
            });
            row += '</tr>';
            tableBody.append(row);
        });

        // Hiển thị tuần hiện tại khi lịch được tải
        if (currentMonth === month && currentYear === year) {
            showWeek(currentDay, currentMonth, currentYear);
        }

        $('.day-cell').click(function() {
            // Xóa background của các ô khác
            $('.day-cell').removeClass('selected-day');

            // Đặt background cho ô được nhấn
            $(this).addClass('selected-day');

            const day = $(this).data('day');
            const month = $(this).data('month');
            const year = $(this).data('year');
            showWeek(day, month, year);
        });
    });
}

// Hiển thị theo tuần
window.showWeek = function (day, month, year) {
    const selectedDate = new Date(year, month - 1, day);
    const startOfWeek = new Date(selectedDate);

    // Điều chỉnh startOfWeek khi ngày được chọn là Chủ Nhật
    const dayOfWeek = selectedDate.getDay();
    startOfWeek.setDate(selectedDate.getDate() - (dayOfWeek === 0 ? 6 : dayOfWeek - 1));

    const weekDays = [];
    for (let i = 0; i < 7; i++) {
        const weekDay = new Date(startOfWeek);
        weekDay.setDate(startOfWeek.getDate() + i);

        // Định dạng ngày-tháng-năm với dd/mm/yyyy
        const dayFormatted = String(weekDay.getDate()).padStart(2, '0');
        const monthFormatted = String(weekDay.getMonth() + 1).padStart(2, '0');
        const formattedDate = `${dayFormatted}/${monthFormatted}/${weekDay.getFullYear()}`;
        weekDays.push(formattedDate);
    }

    // Cập nhật thông tin hiển thị tuần
    $('#selected-day').text(`${String(day).padStart(2, '0')}/${String(month).padStart(2, '0')}/${year}`);
    $('#week-list').empty();
    $('#week-list').append(`<li style = "border-left:none;"><p>Tiết học</p></li>`);
    weekDays.forEach(date => {
        $('#week-list').append(`<li>${date}</li>`);
    });

    // Hiển thị div chứa tuần
    $('#week-display').show();
}

// Nút sang tháng hoặc lùi
$(document).ready(function() {
    loadCalendar(currentMonth, currentYear);

    $('#prev').click(function() {
        if (currentMonth === 1) {
            currentMonth = 12;
            currentYear--;
        } else {
            currentMonth--;
        }
        loadCalendar(currentMonth, currentYear);
    });

    $('#next').click(function() {
        if (currentMonth === 12) {
            currentMonth = 1;
            currentYear++;
        } else {
            currentMonth++;
        }
        loadCalendar(currentMonth, currentYear);
    });
});