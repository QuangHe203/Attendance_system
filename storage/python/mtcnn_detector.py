import cv2
from facenet_pytorch import MTCNN
from PIL import Image
from torchvision import transforms
import numpy as np
import os

"""
detect_face: dùng để xử lý từng frame ảnh trên camera
"""
def detect_face(frame):
    detector = MTCNN()
    if not isinstance(frame, np.ndarray):
        raise ValueError("Input frame must be a NumPy array")

    frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)  
    # frame_rgb = frame_rgb.astype(np.float32) / 255.0 
    boxes, probabilities = detector.detect(frame_rgb)

    # if boxes is not None:
    #     for i in range(boxes.shape[0]):
    #         x1, y1, x2, y2 = boxes[i].astype(int)
    #         confidence = probabilities[i]
    #         cv2.rectangle(frame, (x1, y1), (x2, y2), (255, 0, 0), 2)
    #         cv2.putText(frame, f"{confidence:.2f}", (x1, y1-10), cv2.FONT_HERSHEY_SIMPLEX, 0.9, (255, 0, 0), 2)

    return frame, boxes

"""
detect_and_save: dùng để xử lý các ảnh của từng sinh viên.

- Một bước tiền tiền xử lý trước khi cho vào model FaceNet để trích xuất embeddings
- Sẽ lưu các ảnh vào của sinh viên với ID tương ứng vào thư mục faces/{studentID}/
"""

def detect_and_save(image_path, studentID, image_name, save_dir= 'faces/'):
    mtcnn = MTCNN()
    
    img = Image.open(image_path).convert('RGB')
    img_np = np.array(img)
    boxes, _ = mtcnn.detect(img)
    
    if boxes is not None and len(boxes) > 0:
        student_dir = f"{save_dir}{studentID}"  
        os.makedirs(student_dir, exist_ok=True)

        for _, box in enumerate(boxes):
            x1, y1, x2, y2 = map(int, box)  
            face_crop = img_np[y1:y2, x1:x2]
            face_pil_img = Image.fromarray(face_crop)

        face_pil_img.save(f"{student_dir}/{image_name}.jpg")

        # transform = transforms.Compose([
        #     transforms.RandomHorizontalFlip(p=0.5),
        #     transforms.RandomRotation(degrees=10),
        #     transforms.ColorJitter(brightness=0.2, contrast=0.2, hue=0.1),
        #     transforms.ToTensor(),
        #     transforms.Normalize(mean=[0.5, 0.5, 0.5], std=[0.5, 0.5, 0.5])
        # ])

        # augmented_image = transform(face_pil_img)

        # face_pil_img_aug = augmented_image.permute(1, 2, 0).mul(255).byte().numpy()
        # face_pil_img_aug = Image.fromarray(face_pil_img_aug)

        # face_pil_img_aug.save(f"{student_dir}/augmented_{image_name}.jpg")
    else:
        print(f"No faces detected in the image for {image_path}")

