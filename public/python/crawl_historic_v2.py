# -*- coding: utf-8 -*-
"""
Created on Thu Mar 26 20:59:15 2020

@author: User
"""

# -*- coding: utf-8 -*-
"""
Created on Tue Mar 24 09:42:25 2020

@author: User
"""
import sys
from pandas_datareader import data as pdr
import yfinance as yf
import pandas as pd
import numpy as np
import json
#現在時間
import datetime
# stock_id="2330"

yf.pdr_override() # <== that's all it takes :-)

#現在時間
# using now() to get current time
current_time = datetime.datetime.now().strftime("%Y-%m-%d")
two_years=(datetime.datetime.now() - datetime.timedelta(days=2*365)).strftime("%Y-%m-%d")


# download dataframe
# data = pdr.get_data_yahoo(stock_id+".TW", start=two_years, end=current_time)
# download dataframe
data = pdr.get_data_yahoo(sys.argv[1], start=two_years, end=current_time)

#------------------------------------------------------------------------



#################均線指標
def smaCal(tsPrice,k):
    sma=pd.Series([np.nan]*len(tsPrice),index=tsPrice.index)
    for i in range(k-1,len(tsPrice)):
        sma[i]=np.mean(tsPrice[(i-k+1):(i+1)])
    return(sma)




mean5=smaCal(data.Close,5).replace(np.nan, "null").values.tolist()
mean20=smaCal(data.Close,20).replace(np.nan, "null").values.tolist()
mean60=smaCal(data.Close,60).replace(np.nan, "null").values.tolist()


######################################歷史資料輸出成json
#時間
time=data.index


time2=time.strftime('%d %b %Y %H:%M')

time2=time2+' Z'

time22=list(time2)


#加這個可以註解時間
labeltime=list(time.strftime('%Y-%m-%d'))


data_time=time22
data_open=data['Open'].values.tolist()
data_high=data['High'].values.tolist()
data_low=data['Low'].values.tolist()
data_close=data['Close'].values.tolist()
data_volume=data['Volume'].values.tolist()



stockprice_dict = {
             "time": data_time,
             "open": data_open,
             "high": data_high,
             "low": data_low,
             "close": data_close,
             "volume": data_volume,
             "shortmean":mean5,
             "midmean":mean20,
             "longmean":mean60,

                }




stockprice_dict2 = json.dumps(stockprice_dict)
#print(stockprice_dict2)


#重組資料陣列
newData=[]
                                                #特別注意鍵值名稱要與圖表命名規則相同
for vel,time in enumerate(time22):              #將陣列加入第一筆字典資料time
    newData += [{"t":str(time)}]
for vel,index in enumerate(data['Open']):       #在陣列 第vel比 加入鍵值Opne 並將值轉為字串
    newData[vel]['o'] = str(index)
for vel,index in enumerate(data['High']):       #在陣列 第vel比 加入鍵值High 並將值轉為字串
    newData[vel]['h'] = str(index)
for vel,index in enumerate(data['Low']):        #在陣列 第vel比 加入鍵值Low 並將值轉為字串
    newData[vel]['l'] = str(index)
for vel,index in enumerate(data['Close']):      #在陣列 第vel比 加入鍵值Close 並將值轉為字串
    newData[vel]['c'] = str(index)
#加入平均數
#for vel,index in enumerate(mean30):      #在陣列 第vel比 加入鍵值Close 並將值轉為字串
    #newData[vel]['mean30'] = str(index)


#for vel,index in enumerate(mean60):      #在陣列 第vel比 加入鍵值Close 並將值轉為字串
    #newData[vel]['mean60'] = str(index)


#data= json.dumps(newData)
#print(data)


#########################################
pricemean = {
    "shortmean":mean5,
     "midmean":mean20,
     "longmean":mean60,
     "labeltime":labeltime#加一個時間
}

volume={
   "volume":data_volume,
        }

#newData是蠟燭圖
data = [pricemean,newData,data_time,volume]
finaldata= json.dumps(data)
print(finaldata)





