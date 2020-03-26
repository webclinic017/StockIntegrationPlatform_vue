# -*- coding: utf-8 -*-
"""
Created on Tue Mar 17 20:11:09 2020

@author: User
"""
#爬基本資料

import requests
from bs4 import BeautifulSoup
import pandas as pd
import json

#html = urllib.request.urlopen("https://tw.stock.yahoo.com/d/s/company_2317.html").read()

stock_id="1110"
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

             #資產報酬率
             "ROA":basic_data[60],


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
                }



finalbasic= json.dumps(basic_dict)
print(finalbasic)
