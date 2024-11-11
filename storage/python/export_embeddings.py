import os
import pickle
from facenet_pytorch import MTCNN
from PIL import Image
import numpy as np
from facenet_embedding import get_embedding  
from vectordb_pickle import save_embeddings  

# Khởi tạo các model và biến cần thiết
mtcnn = MTCNN()

# Đường dẫn đến thư mục ảnh sinh viên và file embeddings
images_folder = '../../public/StudentImage'  

def extract_embeddings_for_all_images(images_folder):
    """
    Hàm này sẽ duyệt qua tất cả các ảnh trong thư mục `images_folder`, 
    nhận diện khuôn mặt và trích xuất embeddings, sau đó lưu chúng vào file `embeddings.pkl`.
    """
    all_embeddings = {}
    
    # Duyệt qua tất cả các file trong thư mục ảnh sinh viên
    for filename in os.listdir(images_folder):
        # Kiểm tra định dạng file là ảnh (có thể là jpg, png)
        if filename.lower().endswith(('.png', '.jpg', '.jpeg')):
            studentID = filename.split('.')[0]  # Lấy mã sinh viên từ tên file
            print("Xử lý ảnh của studentID", studentID)
            
            # Mở và xử lý ảnh
            image_path = os.path.join(images_folder, filename)
            img = Image.open(image_path).convert('RGB')
            img_np = np.array(img)
            
            # Nhận diện khuôn mặt trong ảnh
            boxes, _ = mtcnn.detect(img)
            if boxes is not None:
                for box in boxes:
                    x1, y1, x2, y2 = map(int, box)
                    face_crop = img_np[y1:y2, x1:x2]
                    face_pil_img = Image.fromarray(face_crop)

                    # Trích xuất embedding cho khuôn mặt
                    embedding = get_embedding(face_pil_img).flatten()
                    save_embeddings(embedding, studentID)
                    print(f"Đã xử lý và trích xuất embedding cho sinh viên: {studentID}")
            else:
                print(f"Không tìm thấy khuôn mặt trong ảnh {filename}")


extract_embeddings_for_all_images(images_folder= images_folder)
