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

# Kiểm tra xem sinh viên đã được điểm danh hay chưa (tránh điểm danh lại)
def check_attendance_exists(student_id, period_id):
    connection = connect_db()
    cursor = connection.cursor()
    
    query = "SELECT * FROM student_attendance_results WHERE student_id = %s AND period_id = %s"
    cursor.execute(query, (student_id, period_id))
    
    result = cursor.fetchone()
    cursor.close()
    connection.close()

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