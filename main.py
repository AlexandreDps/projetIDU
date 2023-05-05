from selenium.webdriver.chrome.options import Options
from pymongo import MongoClient
import threading
import scrapping as s

CHROME_OPTIONS = Options()
CHROME_OPTIONS.add_argument('--headless')

IDENTIFIANT = 'a_remplir'
PASSWORD = 'a_remplir'
IMPLICIT_WAIT = 5 #nb de secondes d'attente avant de retourner une erreur (le temps de charger les pages)

#chromedriver112 ou chromedriver113 selon votre version de Chrome
DRIVER_PATH = 'chromedriver112.exe'

#Initialisation
client = MongoClient()
client = MongoClient('localhost', 27017)
db = client['StudentApp']


def empty_collection(collection,db):
    #Drop if exist (only for dev, a supprimer plus tard)
    if collection in db.list_collection_names():
        mycollection = db[collection]
        mycollection.drop()
    collection = db[collection]
    collection.insert_one({})
    
empty_collection('homework',db)
empty_collection('courses_marks',db)
empty_collection('polypoints',db)


t1 = threading.Thread(target=s.scrapping_polytech, 
                      args=(IDENTIFIANT, PASSWORD, IMPLICIT_WAIT,CHROME_OPTIONS,DRIVER_PATH,db))
t2 = threading.Thread(target=s.scrapping_moodle, 
                      args=(IDENTIFIANT, PASSWORD, IMPLICIT_WAIT,CHROME_OPTIONS,DRIVER_PATH,db))

t1.start()
t2.start()
t1.join()
t2.join()                     
                      
print('Done')

