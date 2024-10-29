import pickle
import os

embeddings_file = 'embeddings.pkl'

def save_embeddings(embeddings, studentID):
    if os.path.exists(embeddings_file):
        with open(embeddings_file, 'rb') as f:
            all_embeddings = pickle.load(f)
    else:
        all_embeddings = {}
    
    all_embeddings[studentID] = embeddings
    with open(embeddings_file, 'wb') as f:
        pickle.dump(all_embeddings, f)

    print(f"Lưu {len(embeddings)} embeddings cho {studentID} vào local storage.")

def load_embeddings():
    if os.path.exists(embeddings_file):
        with open(embeddings_file, 'rb') as f:
            return pickle.load(f)
    return {}

def fetch_embedding(studentID):
    all_embeddings = load_embeddings()
    return all_embeddings.get(studentID, None)
