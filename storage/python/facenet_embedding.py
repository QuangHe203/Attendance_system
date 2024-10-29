import torch
import numpy as np
from torchvision import transforms
from facenet_pytorch import InceptionResnetV1
from PIL import Image
class FaceNetModel:
    def __init__(self):
        self.model = InceptionResnetV1(pretrained= "vggface2").eval()

    def get_embedding(self, face_img):
        face_img = torch.unsqueeze(face_img, 0)
        with torch.no_grad():
            embedding = self.model(face_img).cpu().numpy()
        
        return embedding


model = FaceNetModel()

def get_embedding(face_img):
    if isinstance(face_img, Image.Image):  
        face_img_pil = face_img
    elif isinstance(face_img, np.ndarray):  
        face_img_pil = Image.fromarray(face_img.astype('uint8'), 'RGB')
    else:
        raise ValueError("Input must be a PIL Image or a NumPy array")

    transform = transforms.Compose([
        transforms.Resize((160, 160)),
        transforms.ToTensor()
    ])

    face_img_tensor = transform(face_img_pil)

    return model.get_embedding(face_img_tensor)