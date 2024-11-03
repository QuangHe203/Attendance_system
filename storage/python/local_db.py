import mysql.connector
from datetime import datetime

def connect_db():
    connection = mysql.connector.connect(
        host="127.0.0.1",
        user="root",
        password="",
        database="laravel"
    )
    return connection

# Lấy time_start từ bảng periods dựa trên period_id
def get_period_time_start(period_id):
    connection = connect_db()
    cursor = connection.cursor()
    
    query = "SELECT time_start FROM periods WHERE period_id = %s"
    cursor.execute(query, (period_id,))
    
    result = cursor.fetchone()
    cursor.close()
    connection.close()

    if result:
        return result[0]
    return None

def check_attendance_exists(student_id, period_id, time_attend):
    connection = connect_db()  # Kết nối cơ sở dữ liệu
    cursor = connection.cursor()
    
    # Chuyển time_attend thành chuỗi dạng 'YYYY-MM-DD' để so sánh chỉ phần ngày
    time_attend_date = time_attend.strftime('%Y-%m-%d')
    
    # Câu truy vấn để kiểm tra xem sinh viên đã điểm danh trong cùng ngày chưa
    query = """
    SELECT * FROM student_attendance_results 
    WHERE student_id = %s AND period_id = %s 
    AND DATE(time_attend) = %s
    """
    cursor.execute(query, (student_id, period_id, time_attend_date))
    
    # Lấy một kết quả duy nhất (vì chỉ cần biết có bản ghi tồn tại hay không)
    result = cursor.fetchone()
    
    cursor.close()  # Đóng cursor
    connection.close()  # Đóng kết nối

    return result is not None 


# Thêm bản ghi điểm danh vào bảng student_attendance_results
def insert_attendance(student_id, period_id, time_attend, status):
    connection = connect_db()
    cursor = connection.cursor()
    
    query = "INSERT INTO student_attendance_results (student_id, period_id, time_attend, status) VALUES (%s, %s, %s, %s)"
    cursor.execute(query, (student_id, period_id, time_attend, status))
    
    connection.commit()
    cursor.close()
    connection.close()