from sklearn.neighbors import NearestNeighbors

def knn_recognition(embedding, stored_embeddings, threshold):
    knn = NearestNeighbors(n_neighbors=1, metric= "cosine")
    knn.fit(stored_embeddings)
    distances, indices = knn.kneighbors([embedding])

    if distances[0][0] < threshold:
        return True, distances[0][0]
    return False, distances[0][0]
