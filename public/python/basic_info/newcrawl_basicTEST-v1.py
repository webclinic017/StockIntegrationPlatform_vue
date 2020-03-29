import sys
import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from bs4 import BeautifulSoup
import json

driver = webdriver.Chrome()
driver.get('https://mops.twse.com.tw/mops/web/t05st03')


#1592 1593

stockid = ["6560 ", "6561 "]

newData=[]


for var,index in enumerate(stockid):
    x = var+1
    if x%20 == 0:
        time.sleep(60)
    if x%100 == 0:
        time.sleep(120)
    driver.find_element_by_id('co_id').send_keys(index)
    driver.find_element_by_id('co_id').send_keys(Keys.ENTER)
    time.sleep(1)

    soup = BeautifulSoup(driver.page_source, 'html.parser')
    # dellay=soup.find('table', class_ = 'hasBorder')
    table=soup.find('table', class_ = 'hasBorder')
    table_all=table.find_all('td')
    basic_data=[]

    for i in range(0,len(table_all)):
        basic_data.append(table_all[i].text)

    basic_dict = {
        "stock_id": index,
        "company": basic_data[3],
        "industry": basic_data[1].strip().replace(u'\u3000', u' ').replace(u'\xa0', u' '),
        "start_time": basic_data[13],
        "IPO":basic_data[16],
        "Chairman":basic_data[6],
        "capital":basic_data[15].strip(),
        "publiccommon_stock":basic_data[21].replace(" ", "").replace('\n',''),
        "common_stock":basic_data[20].replace(" ", ""),
        "preferred_stock":basic_data[22].replace(" ", ""),
        "investman":basic_data[41],
        "Main_business":basic_data[12],
    }
    newData += [basic_dict]
    driver.find_element_by_id('co_id').clear()

driver.quit()

finalbasic= json.dumps(newData)

with open('C:/Users/Brian/Documents/GitHub/StockIntegrationPlatform_vue/public/python/test.json', 'w') as f:
    json.dump(finalbasic, f)

# with open('C:/Users/Brian/Documents/GitHub/StockIntegrationPlatform_vue/public/python/test.json', 'r') as f:
#     load_dict = json.load(f)

print("ok")





