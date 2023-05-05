# -*- coding: utf-8 -*-
"""
Created on Thu May  4 10:14:17 2023

@author: Alexandre
"""

from selenium import webdriver

DRIVER_PATH = 'chromedriver.exe'
driver = webdriver.Chrome(executable_path=DRIVER_PATH)
driver.get('https://intranet.univ-smb.fr/')
