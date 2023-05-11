from selenium.webdriver.chrome.options import Options
from pymongo import MongoClient
import threading
import scrapping as s
import sys

CHROME_OPTIONS = Options()
CHROME_OPTIONS.add_argument('--headless')

#Retrieving the data sent from php; for whatever reason, when arriving in Python we have a string rather than a json data
#Example: '[sanziana,12345]'

IDENTIFIANT = sys.argv[1]
PASSWORD = sys.argv[2]
GRP = sys.argv[3]
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

empty_collection('planning',db)
if GRP == 'A2':
    t1 = threading.Thread(target=s.scrapping_planning2, 
                        args=(IDENTIFIANT, PASSWORD, IMPLICIT_WAIT,Options(),DRIVER_PATH,db))
else : 
    t1 = threading.Thread(target=s.scrapping_planning, 
                        args=(IDENTIFIANT, PASSWORD, IMPLICIT_WAIT,Options(),DRIVER_PATH,db))

t1.start()

        