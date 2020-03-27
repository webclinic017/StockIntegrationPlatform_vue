# -*- coding: utf-8 -*-
"""
Created on Fri Mar 27 11:43:10 2020

@author: User
"""

# -*- coding: utf-8 -*-
"""
Created on Tue Mar 24 20:23:43 2020

@author: User
"""
import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from bs4 import BeautifulSoup
import json

path = "D:\selenium_driver_chrome\chromedriver.exe" #chromedriver.exe執行檔所存在的路徑
driver = webdriver.Chrome(path)


#driver = webdriver.Chrome()
driver.get('https://mops.twse.com.tw/mops/web/t100sb07_1')

#輸入股票代碼
#
stockid="2330"

driver.find_element_by_id('co_id').send_keys(stockid)#找id=email
driver.find_element_by_id('co_id').send_keys(Keys.ENTER)
time.sleep(1) #這很重要
###############################################開始抓法說會資料

#soup = BeautifulSoup(browser.page_source, 'html.parser')
#soup = BeautifulSoup(driver.page_source, 'html.parser')

soup = BeautifulSoup(driver.page_source, 'html.parser')
table=soup.find('table', class_ = 'hasBorder')
#table.contents
driver.quit()

#table = soup.find_all('table', class='hasBorder')
#table=table1[1]


table_all=table.find_all('td')


table_data=[]

for i in range(0,len(table_all)):
    table_data.append(table_all[i].text)


##########################輸出成dict
    #table_data[1].replace('\n','')

tablec_dict = {
              #召開法人說明會日期：
             "date": table_data[1].replace('\n',''),
             #召開法人說明會地點：
             "location": table_data[3].replace('\n',''),
             
              #法人說明會擇要訊息：：
             "import_info": table_data[5].replace('\n',''),
             #法人說明會簡報內容中文：：
             "chinese_file": table_data[8].replace('\n',''),
             #法人說明會簡報中文內容連結：：
             "chinese_href":'https://mops.twse.com.tw/nas/STR/'+table_data[8].replace('\n',''),
              #法人說明會簡報內容英文：：
             "english_file": table_data[10].replace('\n',''),

             #法人說明會簡報英文內容連結：：
             "english_href":'https://mops.twse.com.tw/nas/STR/'+table_data[10].replace('\n',''),

             #法人說明會相關資訊：
             "info": table_data[13].replace('\n',''),

            }

#driver.close()

concile_data= json.dumps(tablec_dict)
print(concile_data)





#https://mops.twse.com.tw/mops/nas/STR/

