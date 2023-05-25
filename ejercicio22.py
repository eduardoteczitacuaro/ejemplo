import nltk
nltk.download('words')
nltk.download('stopwords')
from nltk.tokenize import word_tokenize, sent_tokenize
from nltk.tag import pos_tag
from nltk.chunk import ne_chunk
from nltk.corpus import stopwords

def process_text(text):
    # Tokenización de oraciones
    sentences = sent_tokenize(text)
    print("Oraciones:", sentences)

    # Tokenización de palabras
    tokens = word_tokenize(text)
    print("Tokens:", tokens)

    # Etiquetado gramatical
    tagged = pos_tag(tokens)
    print("Etiquetas gramaticales:", tagged)

    # Reconocimiento de entidades nombradas
    named_entities = ne_chunk(tagged)
    print("Entidades nombradas:", named_entities)

    # Eliminación de palabras vacías (stop words)
    stop_words = set(stopwords.words('english'))
    filtered_words = [token for token in tokens if token.lower() not in stop_words]
    print("Palabras filtradas:", filtered_words)

# Ruta del archivo de texto
archivo = open('\\TASM\\dato.txt','r')

# Leer el contenido del archivo
ejemplo=archivo.read()
archivo.close()

# Procesar el texto
process_text(ejemplo)
