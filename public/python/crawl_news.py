# -*- coding: utf-8 -*-
"""
Created on Mon Mar 23 15:33:13 2020

@author: User
"""

# -*- coding: utf-8 -*-
"""
Created on Fri Mar 20 11:34:51 2020

@author: User
"""
# -*- coding: utf-8 -*-
"""
Created on Tue Mar 17 20:11:09 2020

@author: User
"""
#爬基本資料
#-------------------------------------------------------基本資料
import requests
from bs4 import BeautifulSoup
import pandas as pd
import json

#html = urllib.request.urlopen("https://tw.stock.yahoo.com/d/s/company_2317.html").read()

#輸入股票代碼
stock_id="2330"
url="https://tw.stock.yahoo.com/d/s/company_"+stock_id+".html"

html = requests.get(url)

soup = BeautifulSoup(html.text, 'html.parser')

#利用 class 從該 HTML 裡取得特定表格
table1 = soup.find_all('table')
table=table1[1]
table.contents

table_all=table.find_all('td')


basic_data=[]

for i in range(0,len(table_all)):
    basic_data.append(table_all[i].text)



#basic_data[33].strip().replace(u'\u3000', u' ').replace(u'\xa0', u' ')
basic_dict = {
              #產業類別
             "industry": basic_data[5].strip().replace(u'\u3000', u' ').replace(u'\xa0', u' '),
             #成立時間
             "start_time": basic_data[9],
             #上市(櫃)時間
             "IPO":basic_data[13],
             #董事長
             "Chairman":basic_data[17],
             #總經理
             "manager":basic_data[21],
             #營收比重
             "Revenue_share":basic_data[33].strip().replace(u'\u3000', u' ').replace(u'\xa0', u' '),

             #ROA
             "ROA":basic_data[60],


             #現金股利
             "Cash_dividend":basic_data[7],

             #股東會日期
             "Shareholders_date":basic_data[23],

             #公積配股
             "Public_reserve":basic_data[19],
             #盈餘配股
             "earning_reserve":basic_data[15],

             #股票股利
             "stock_dividend":basic_data[11],

             #營業毛利率
             "Operating_margin":basic_data[42],

              #營業利益率
             "Operating_profit":basic_data[48],

             #稅前淨利率
             "Net_interest_beforetax":basic_data[54],

             #第一季每股盈餘
             "first_eps":basic_data[44],

              #第二季每股盈餘
             "second_eps":basic_data[50],

            #第三季每股盈餘
             "third_eps":basic_data[56],

             #第四季每股盈餘
             "four_eps":basic_data[62],

              #第一年每股盈餘
             "yfirst_eps":basic_data[46],

              #第二年每股盈餘
             "ysecond_eps":basic_data[52],

             #第三年每股盈餘
             "ythird_eps":basic_data[58],

             #第四年每股盈餘
             "yfour_eps":basic_data[64],

             #除權日期
             "Exrights":basic_data[71],

             #除息日期
             "Exdate":basic_data[73],


                }



#finalbasic= json.dumps(basic_dict,ensure_ascii=False)
#print(finalbasic)
#-------------------------------------------------------------------新聞

import requests
from bs4 import BeautifulSoup
#from urllib.parse import quote#這個自己額外要裝
import json


#stock_id='2317'
 # 要抓取的網址
url = 'https://tw.finance.yahoo.com/news_search.html?ei=Big5&q='+stock_id


#url = 'https://tw.finance.yahoo.com/news_search.html?ei=Big5&q=' + quote(keyword.encode('big5'))
#print(url)
#請求網站
list_req = requests.get(url)

#爬取網頁全部內容
#將整個網站的程式碼爬下來
soup = BeautifulSoup(list_req.content, "html.parser")
#print(soup.text)
#抓出新聞所在區塊（table）
#找到b這個標籤
getAllNew= soup.find('table',{'id':'newListContainer'}) #抓到新聞的table
getAllNew.contents



#取得新聞內文列表
title=[]
content=[]
href_text=[]
time=[]

NewsList = getAllNew.find_all('td',{'valign':'top'})
#print(NewsList)
for i in range(0,len(NewsList)-1,2):
    #新聞時間
    time.append(NewsList[i].text[-11:-1])
    title.append(NewsList[i].text)
    content.append(NewsList[(i+1)].text.replace("(詳全文)", ""))
    href_text.append(NewsList[i].find_all("a", {"class":"mbody"})[1].get('href'))



    #print("新聞標題： " + NewsList[i].text)
    #print("內文：\n..." + NewsList[(i+1)].text.replace("(詳全文)", "") + "...\n")

    #print("連結： " + NewsList[i].find_all("a", {"class":"mbody"})[1].get('href'))


news_dict = {
             "time": time,
             "title": title,
             "content": content,
             "href_text":  href_text,
                }

# news = json.dumps(news_dict)
# print(news)



################################################
###################################轉資料
newsData=[]
                                                #特別注意鍵值名稱要與圖表命名規則相同
for vel,time2 in enumerate(time):              #將陣列加入第一筆字典資料time
    newsData += [{"time":time2}]

for vel,index in enumerate(title):       #在陣列 第vel比 加入鍵值Opne 並將值轉為字串
    newsData[vel]['title'] = str(index)

for vel,index in enumerate(content):       #在陣列 第vel比 加入鍵值High 並將值轉為字串
    newsData[vel]['content'] = str(index)


for vel,index in enumerate(href_text):        #在陣列 第vel比 加入鍵值Low 並將值轉為字串
    newsData[vel]['href_text'] = str(href_text)





#news = json.dumps(newData)
#print(news)



#------------------------------------------------------
data = [basic_dict,newsData]
finaldata= json.dumps(data)
print(finaldata)

