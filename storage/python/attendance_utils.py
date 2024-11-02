from datetime import datetime, timedelta

def is_on_time(time_start, time_attend, late_threshold_minutes=15):
    """Kiểm tra sinh viên có đi đúng giờ hay không"""
    # Tính toán khoảng thời gian giữa time_start và time_attend
    time_difference = time_attend - time_start
    # Nếu sinh viên đi trước hoặc không muộn quá 15 phút
    if time_difference <= timedelta(minutes=late_threshold_minutes):
        return True
    # Nếu sinh viên muộn hơn 15 phút
    return False
