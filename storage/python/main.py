import cv2
from mtcnn_detector import detect_face
from facenet_embedding import get_embedding
from sklearn.neighbors import NearestNeighbors
# from knn_recognition import knn_recognition
# from vectordb_pinecone import fetch_embedding, query_embedding
from vectordb_pickle import load_embeddings
# from utils import capture_image

import numpy as np

def main():
    # studentID = "21011601"
    # stored_embeddings = fetch_embedding(studentID)
    # stored_embeddings = np.array([np.array(e) for e in stored_embeddings]) 
    # threshold = 0.55
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

    while True:
        ret, frame = cap.read()  
        if not ret:
            print("Cant read frame from camera")
            break
        # print("Frame shape:", frame.shape) 
        frame, faces = detect_face(frame) 
        if faces is not None and len(faces) > 0:
        #     print(f"Số khuôn mặt phát hiện: {len(faces)}")
        # else:
        #     print("Không phát hiện khuôn mặt nào.")
            # box = faces[0]
            # x1, y1, x2, y2 = box.astype(int)
            # face_img = frame[y1:y2, x1:x2] 

            # embedding = get_embedding(face_img)  

            # match, distance = knn_recognition(embedding.flatten(), stored_embeddings, threshold)  # So sánh embedding

            # if match:
            #     print(f"Success! distance: {distance:.2f}")
            # else:
            #     print(f"False! distance: {distance:.2f}")
            for i in range(faces.shape[0]):
                x1, y1, x2, y2 = faces[i].astype(int)
                face_img = frame[y1:y2, x1:x2]

                embedding = get_embedding(face_img).flatten()
                # print(embedding)
                # print(type(embedding))
                # print(embedding.shape)
                distances, indices = knn.kneighbors([embedding])
                distance = distances[0][0]
                studentID = studentIDs[indices[0][0]]

                if distance < threshold:
                    cv2.rectangle(frame, (x1, y1), (x2, y2), (255, 0, 0), 2)
                    cv2.putText(frame, f"ID: {studentID}, Score: {distance:.2f}", (x1, y1-10), cv2.FONT_HERSHEY_SIMPLEX, 0.9, (0, 255, 0), 2)
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
    