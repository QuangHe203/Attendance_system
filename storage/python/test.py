from mtcnn_detector import detect_and_save
from facenet_embedding import get_embedding
from PIL import Image
import os
from vectordb_pinecone import upload_embeddings, fetch_embedding
import numpy as np
from knn_recognition import knn_recognition
from vectordb_pickle import save_embeddings, load_embeddings

image_path = "images/21012057.png"

detect_and_save(image_path, "21012057", "21012057")



# image_folder = "faces/21011601"
# studentID = "21011601"
# embeddings = []

# for filename in os.listdir(image_folder):
#     if filename.endswith(('.jpg')):
#         image_path = os.path.join(image_folder, filename)
#         img = Image.open(image_path).convert('RGB')

#         embedding = get_embedding(img)
#         if embedding is not None:
#             embeddings.append(embedding)

# upload_embeddings(embeddings, studentID)

image_face = "faces/21012057/21012057.jpg"
img = Image.open(image_face).convert("RGB")

# image_face2 = "faces/21012057/21012057.jpg"
# img2 = Image.open(image_face).convert("RGB")

embedding = get_embedding(img).flatten()
# embedding2 = get_embedding(img2).flatten()

save_embeddings(embeddings=embedding, studentID="21012057")
all_embeddings = load_embeddings()

# In kết quả
print("Tất cả embeddings đã tải:")
for studentID, embedding in all_embeddings.items():
    print(f"Student ID: {studentID}, Embedding shape: {np.array(embedding).shape}")
# stored_embeddings = fetch_embedding(studentID)  
# stored_embeddings = np.array([np.array(e) for e in stored_embeddings])  

# threshold = 0.2
# match, distance = knn_recognition(embedding.flatten(), stored_embeddings, threshold)
# print(distance)
# if match:
#     print(f"Match found with distance: {distance}")
# else:
#     print(f"No match found. Distance: {distance}")


