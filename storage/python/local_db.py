import mysql.connector
from mysql.connector import Error

def check_if_attendance_exists(student_id, period_id):
    """
    Kiểm tra xem sinh viên đã được điểm danh trong period hiện tại chưa.
    """
    try:
        connection = mysql.connector.connect(
            host= '127.0.0.1',
            database= 'laravel',
            user= 'root',
            password= ''
        )

        if connection.is_connected():
            cursor = connection.cursor()
            query = """SELECT COUNT(*) FROM student_attendance_results 
                       WHERE student_id = %s AND period_id = %s"""
            cursor.execute(query, (student_id, period_id))
            result = cursor.fetchone()

            return result[0] > 0 
    except:
        print(f"Error while checking attendance: {e}")
        return False

    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()

def save_attendance(student_id, period_id, time_attend):
    """
    Lưu điểm danh cho sinh viên nếu sinh viên chưa được điểm danh.
    """
    try:
        connection = mysql.connector.connect(
            host='127.0.0.1',
            database='laravel',
            user='root',
            password=''
        )

        if connection.is_connected():
            if not check_if_attendance_exists(student_id, period_id):
                cursor = connection.cursor()
                insert_query = """INSERT INTO student_attendance_results (student_id, period_id, time_attend) 
                                  VALUES (%s, %s, %s)"""
                record = (student_id, period_id, time_attend)
                cursor.execute(insert_query, record)
                connection.commit()
                print(f"Attendance recorded for student ID: {student_id}")
            else:
                print(f"Student ID: {student_id} has already been marked present for period {period_id}")

    except Error as e:
        print(f"Error while connecting to MySQL: {e}")

    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            print("MySQL connection is closed")