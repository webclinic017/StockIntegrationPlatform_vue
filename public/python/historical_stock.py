from pandas_datareader import data as pdr
import sys
import yfinance as yf
import pandas as pd
import json
#import matplotlib.pyplot as plt

yf.pdr_override()  # <== that's all it takes :-)

# download dataframe
# data = pdr.get_data_yahoo("2330.TW", start="2019-01-01", end="2020-03-01")

data = pdr.get_data_yahoo(sys.argv[1], start=sys.argv[2], end=sys.argv[3])

#時間格式重組
time=data.index
time2=time.strftime('%d %b %Y %H:%M')
time2=time2+' Z'
time22=list(time2)

#重組資料陣列
newData=[]
                                                #特別注意鍵值名稱要與圖表命名規則相同
for vel,time in enumerate(time22):              #將陣列加入第一筆字典資料time
    newData += [{"t":str(time)}]
for vel,index in enumerate(data['Open']):       #在陣列 第vel比 加入鍵值Open 並將值轉為字串
    newData[vel]['o'] = str(index)
for vel,index in enumerate(data['High']):       #在陣列 第vel比 加入鍵值High 並將值轉為字串
    newData[vel]['h'] = str(index)
for vel,index in enumerate(data['Low']):        #在陣列 第vel比 加入鍵值Low 並將值轉為字串
    newData[vel]['l'] = str(index)
for vel,index in enumerate(data['Close']):      #在陣列 第vel比 加入鍵值Close 並將值轉為字串
    newData[vel]['c'] = str(index)

data= json.dumps(newData)
print(data)


# 有交易與未交易的比較圖
# fig = plt.figure() # 新图 0
# plt.figure(figsize=(10,10)) #整个现实图（框架）的大小
# plt.plot(cum,label="cumret",color='k')#plt.plot(data.Close[:'2017-12-31'],label="Close",color='k')
# plt.plot(tradecum,label="tradecumret",color='b',linestyle='dashed')

