from selenium import webdriver
from selenium.webdriver.common.by import By

######################### Scrapping moodle/intranet ##########################

def scrapping_moodle(identifiant, password, implicit_wait,chrome_options,driver_path,db):
    driver = webdriver.Chrome(executable_path=driver_path,options=chrome_options)
    driver.get('https://intranet.univ-smb.fr/')
    driver.implicitly_wait(implicit_wait)
    
    #Connexion
    driver.find_element(By.ID, "username").send_keys(identifiant)
    driver.find_element(By.ID, "password").send_keys(password)
    driver.find_element(By.CLASS_NAME, "btn-submit").click()
    driver.execute_script("window.open('https://moodle.univ-smb.fr/my/', '_blank');")
    driver.switch_to.window(driver.window_handles[1]) #Switch sur l'onglet moodle
    driver.find_element(By.PARTIAL_LINK_TEXT, 'Connexion').click()
    driver.find_element(By.PARTIAL_LINK_TEXT, 'tudiant').click() #On met pas le É car l'ecriture pourrait changer dans le temps
    
    driver.get('https://moodle.univ-smb.fr/my/')
    #Scrapping devoirs
    devoirs = driver.find_elements(By.PARTIAL_LINK_TEXT, 'doit')
    for i in range(len(devoirs)):
        devoirs[i] = devoirs[i].get_attribute("aria-label")
    collection = db['homework']
    collection.insert_one({'user':identifiant,'devoirs':devoirs})
    
    #Scrapping notes et cours
    driver.get("https://moodle.univ-smb.fr/grade/report/overview/index.php")
    cours = driver.find_elements(By.CSS_SELECTOR, 'td.cell.c0')
    notes = driver.find_elements(By.CSS_SELECTOR, 'td.cell.c1')
    cours_notes = {'user':identifiant}
    for i in range(len(cours)):
        cours_notes[cours[i].text] = notes[i].text
    #Scrapping planning
    collection = db['courses_marks']
    collection.insert_one(cours_notes)
    
    
############################# Scrapping polytech #############################
def scrapping_polytech(identifiant, password, implicit_wait,chrome_options,driver_path,db):
    driver2 = webdriver.Chrome(executable_path=driver_path,options=chrome_options)
    driver2.get('https://www.polytech.univ-smb.fr/intranet/accueil.html')
    driver2.implicitly_wait(implicit_wait)
    
    #Connexion
    driver2.find_element(By.CLASS_NAME, "tarteaucitronCTAButton.tarteaucitronDeny").click()
    driver2.find_element(By.ID, "user").send_keys(identifiant)
    driver2.find_element(By.ID, "pass").send_keys(password)
    driver2.find_element(By.CLASS_NAME, "submit").click()
    driver2.find_element(By.PARTIAL_LINK_TEXT, 'Espace').click()
    
    #Scrapping Polypoints
    intitule = driver2.find_elements(By.CSS_SELECTOR, 'li.intitule')
    intitule_tache = driver2.find_elements(By.CSS_SELECTOR, 'li.intitule_tache')
    nb_points = driver2.find_elements(By.CSS_SELECTOR, 'li.nb_points')
    annee = driver2.find_elements(By.CSS_SELECTOR, 'li.annee')
    for i in range(len(intitule)):
        intitule[i]= intitule[i].text
        intitule_tache[i]= intitule_tache[i].text
        nb_points[i]= nb_points[i].text
        annee[i]= annee[i].text
        #print(f'{intitule[i]}, {intitule_tache[i]}, {nb_points[i]}, {annee[i]}')
    collection = db['polypoints']
    collection.insert_one({'user':identifiant,
                           'intitule':intitule,
                           'intitule_tache':intitule_tache,
                           'nb_points':nb_points,
                           'annee':annee})
    return [intitule,intitule_tache,nb_points,annee]




