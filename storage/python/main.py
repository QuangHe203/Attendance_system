import cv2
from mtcnn_detector import detect_face
from facenet_embedding import get_embedding
from sklearn.neighbors import NearestNeighbors
# from knn_recognition import knn_recognition
# from vectordb_pinecone import fetch_embedding, query_embedding
from vectordb_pickle import load_embeddings
from datetime import datetime
from local_db import save_attendance, check_if_attendance_exists
# from utils import capture_image

import numpy as np

def main():
    all_embeddings = load_embeddings()
    studentIDs = list(all_embeddings.keys())
    stored_embeddings = np.array([np.array(e) for e in all_embeddings.values()])
    threshold = 0.3
    
    if len(stored_embeddings) == 0:
        print("No embeddings found in the database.")
        return
    
    knn = NearestNeighbors(n_neighbors=1, metric="cosine")
    knn.fit(stored_embeddings)

    cap = cv2.VideoCapture(0) 

    recognition_counter = {} # Đếm số lần nhận diện chính xác mỗi sinh viên
    attendance_confirmed = {} # Theo dõi sinh viên đã điểm danh

    while True:
        ret, frame = cap.read()  
        if not ret:
            print("Cant read frame from camera")
            break
        # print("Frame shape:", frame.shape) 
        frame, faces = detect_face(frame) 
        if faces is not None and len(faces) > 0:
            
            for i in range(faces.shape[0]):
                x1, y1, x2, y2 = faces[i].astype(int)
                face_img = frame[y1:y2, x1:x2]

                embedding = get_embedding(face_img).flatten()
    
                distances, indices = knn.kneighbors([embedding])
                distance = distances[0][0]
                studentID = studentIDs[indices[0][0]]

                if distance < threshold:
                    cv2.rectangle(frame, (x1, y1), (x2, y2), (255, 0, 0), 2)
                    cv2.putText(frame, f"ID: {studentID}, Score: {distance:.2f}", (x1, y1-10), cv2.FONT_HERSHEY_SIMPLEX, 0.9, (0, 255, 0), 2)

                    if studentID not in recognition_counter:
                        recognition_counter[studentID] = 1
                    else:
                        recognition_counter[studentID] += 1
                    
                    # Nếu nhận diện 3 frame liên tiếp và chưa được điểm danh 
                    if recognition_counter[studentID] >= 3 and not attendance_confirmed.get(studentID, False):
                        period_id = 1
                        time_attend = datetime.now().strftime('%Y-%m-%d %H:%M:%S')

                        if not check_if_attendance_exists(student_id = studentID, period_id= period_id):
                            save_attendance(student_id= studentID, period_id= period_id, time_attend= time_attend)
                            attendance_confirmed[studentID] = True
                        else:
                            print(f"Student ID: {studentID} has already been marked present for period {period_id}")
                else:
                    cv2.rectangle(frame, (x1, y1), (x2, y2), (255, 0, 0), 2)
                    cv2.putText(frame, "Unknown", (x1, y1-10), cv2.FONT_HERSHEY_SIMPLEX, 0.9, (0, 0, 255), 2)
        cv2.imshow("Face Recognition", frame)  
        if cv2.waitKey(1) & 0xFF == ord('q'):  
            break
    
    cap.release()  
    cv2.destroyAllWindows()

if __name__ == "__main__":
    main()
    