#教學網站
#https://www.itread01.com/content/1523104707.html
#https://www.techbeamers.com/locate-elements-selenium-python/#locate-element-by-xpath

import sys
import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from bs4 import BeautifulSoup
import json


driver = webdriver.Chrome()
driver.get('https://mops.twse.com.tw/mops/web/t05st22_q1')

#輸入股票代碼
#
# stockid="2317"
stockid=str(sys.argv[1])

driver.find_element_by_xpath("//input[@id='co_id']").send_keys(stockid)


driver.find_element_by_xpath("//input[@type='button' and @value=' 查詢 ']").click()
#driver.find_element_by_type('button').click()  # 按 登入 鈕


#driver.find_element_by_xpath("//input/@value='emailId/mobileNo'")

time.sleep(1) #這很重要

#登進去了


#--------------------------------------開始抓財務比率
soup = BeautifulSoup(driver.page_source, 'html.parser')



####################重要一定要加不然laveral無法顯示
driver.quit()



table=soup.find_all('table')

#就是在tabke15
#table[15].contents


table_all=table[15].find_all('td')


#財務比率
financerate_data=[]
for i in range(0,len(table_all)):
    rate=table_all[i].text.replace(" ", "")
    #new_rate=float(rate)
    #financerate_data.append(new_rate)
    financerate_data.append(rate)



#富邦做法 整理成陣列
trs =  table[15].find_all('tr')
rows = list()
for tr in trs:
    rows.append([td.text.replace(" ", '').replace("NA", 'null') for td in tr.find_all('td')])

    #rows.append([td.text.replace(" ", '').replace('\xa0', '') for td in tr.find_all('td')])



#財務結構
Financialstructure_dict = {
             #time還要改
             "time": [106,107,108],
             #負債佔資產比率(%)
             "debtratio": rows[1],
             #長期資金佔不動產、廠房及設備比率(%)
             "Long_term_to_fixedassets": rows[2]

                }



#償債能力
Debtrepayment_dict = {
             #time還要改
             "time": [106,107,108],
             "currentratio": rows[3],
             #速動比率(%)
             "quickratio": rows[4],
              #利息保障倍數(%)
             "interestcoverageratio": rows[5]

                }


#經營能力
management_dict = {
             #time還要改
             "time": [106,107,108],
             #應收款項週轉率(次)
             "RTR": rows[6],
             #平均收現日數
             "ACD": rows[7],
              #存貨週轉率(次)
             "ITR": rows[8],
              #平均銷貨日數
             "ASD": rows[9],
              #不動產、廠房及設備週轉率(次)
             "TRR": rows[10],
             #總資產週轉率(次)
             "TROTA": rows[11]
                }




#獲利能力
profit_dict = {
             #time還要改
             "time": [106,107,108],
             #資產報酬率(%)
             "ROA": rows[12],
             #權益報酬率(%)
             "ROE": rows[13],
             #稅前純益佔實收資本比率(%)
             "NPBF" : rows[14],
              #純益率(%)
             "NPM" : rows[15],
              #每股盈餘(元)
             "EPS": rows[16]

                }


#現金流量
cash_dict = {
             #time還要改
             "time": [106,107,108],
             #現金流量比率(%)
             "CFA": rows[17],
             #現金流量允當比率(%)
             "CFAR": rows[18],
             #現金再投資比率(%)
             "CRR" : rows[19]


                }

finance = [Financialstructure_dict,Debtrepayment_dict,management_dict,profit_dict,cash_dict]

finance_ratio= json.dumps(finance)
print(finance_ratio)



