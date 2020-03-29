import sys
import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from bs4 import BeautifulSoup
import json


driver = webdriver.Chrome()

driver.get('https://mops.twse.com.tw/mops/web/t05st03')

#輸入股票代碼
#變數名稱
stockid="2330"
# stockid=sys.argv[1]
driver.find_element_by_id('co_id').send_keys(stockid)#找id=email
driver.find_element_by_id('co_id').send_keys(Keys.ENTER)
time.sleep(1) #這很重要
###############################################開始抓基本資料


soup = BeautifulSoup(driver.page_source, 'html.parser')
driver.quit()


table=soup.find('table', class_ = 'hasBorder')


# table_all=table.find_all('td')
# table_all_th=table.find_all('th')
table_all_th=table.find_all('tr')
# time22=list(table_all.text)
# table_all=list(table_all)

old_basic_data=[]

basic_data=[]


for i in range(0,len(table_all_th)):
    old_basic_data.append(table_all_th[i].text)

# for i in range(0,len(table_all_th)):
#     print(table_all_th[i].text)

# for i in range(0,len(table_all)):
#     old_basic_data.append(table_all[i].text)

# newBasic_data=list(old_basic_data)

# for vel,index in enumerate(newBasic_data):
#     print(vel)
#     basic_data += [{"content":str(index)}]

# for vel,index in enumerate(table_all_th):
#     print(vel)
    # basic_data[vel]["title"] = str(index)

##########################輸出成dict
# basic_dict = {
#               #公司名稱
#              "company": basic_data[3],
#               #產業類別
#              "industry": basic_data[1].strip().replace(u'\u3000', u' ').replace(u'\xa0', u' '),
#              #成立時間
#              "start_time": basic_data[13],
#              #上市(櫃)時間
#              "IPO":basic_data[16],
#              #董事長
#              "Chairman":basic_data[6],

#              #實收資本額
#              "capital":basic_data[15].strip(),

#              #已發行普通股數
#              "publiccommon_stock":basic_data[21].replace(" ", "").replace('\n',''),


#              #普通股每股面額
#              "common_stock":basic_data[20].replace(" ", ""),


#               #特別股每股面額
#              "preferred_stock":basic_data[22].replace(" ", ""),

#              #投資人關係聯絡人
#              "investman":basic_data[41],

#              #主要經營業務
#             "Main_business":basic_data[12],

#                 }



#finalbasic= json.dumps(basic_dict,ensure_ascii=False)
# finalbasic= json.dumps(basic_dict)
print(old_basic_data)

