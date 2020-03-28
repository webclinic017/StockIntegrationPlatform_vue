from pandas_datareader import data as pdr
import time
import yfinance as yf
import json
import sys
import pandas as pd
import numpy as np


yf.pdr_override()  # <== that's all it takes :-)

# download dataframe
# data = pdr.get_data_yahoo("2317.TW", start="2019-01-01", end="2020-03-18")
data = pdr.get_data_yahoo((sys.argv[1]), start=sys.argv[2], end=sys.argv[3])

def upbreak(tsLine, tsRefLine):
    # tsLine=data.Close[data.Close.index[20:][0]:]#tsLine=Close[boundDC.index[0]:]
    #tsRefLine=boundDC.upboundDC#
    n = min(len(tsLine), len(tsRefLine))
    tsLine = tsLine[-n:]
    tsRefLine = tsRefLine[-n:]  # 倒倏第N個
    signal = pd.Series(0, index=tsLine.index)
    for i in range(1, len(tsLine)):
        if all([tsLine[i] > tsRefLine[i], tsLine[i-1] < tsRefLine[i-1]]):
            signal[i] = 1
    return(signal)
# 向下突破函數


def downbreak(tsLine, tsRefLine):
    n = min(len(tsLine), len(tsRefLine))
    tsLine = tsLine[-n:]
    tsRefLine = tsRefLine[-n:]
    signal = pd.Series(0, index=tsLine.index)
    for i in range(1, len(tsLine)):
        if all([tsLine[i] < tsRefLine[i], tsLine[i-1] > tsRefLine[i-1]]):
            signal[i] = 1
    return(signal)

# 布林通道


def bbands(tsPrice, period=20, times=2):
    upBBand = pd.Series(0.0, index=tsPrice.index)
    midBBand = pd.Series(0.0, index=tsPrice.index)
    downBBand = pd.Series(0.0, index=tsPrice.index)
    sigma = pd.Series(0.0, index=tsPrice.index)
    for i in range(period-1, len(tsPrice)):
        midBBand[i] = np.nanmean(tsPrice[i-(period-1):(i+1)])
        sigma[i] = np.nanstd(tsPrice[i-(period-1):(i+1)])
        upBBand[i] = midBBand[i]+times*sigma[i]
        downBBand[i] = midBBand[i]-times*sigma[i]
    BBands = pd.DataFrame({'upBBand': upBBand[(period-1):],
                           'midBBand': midBBand[(period-1):],
                           'downBBand': downBBand[(period-1):],
                           'sigma': sigma[(period-1):]})
    return(BBands)


# -----------------------------------------------------交易變數


# 交易次數
timesOfTradeArr = []  # 交易次數
principalArr = []  # 每筆交易次數本金
#optimalprofit = []


# 變數設定(更改這裡的變數)
# mean = 20
# std = 1.2
# principal = 1000000  # 本金

mean = int(sys.argv[4])
std = float(sys.argv[5])
principal = int(sys.argv[6])  # 本金

# data = pdr.get_data_yahoo(sys.argv[1]+".TW", start=sys.argv[2], end=sys.argv[3])


# 交易策略變數設定
tsmcBBands = bbands(data.Close, mean, std)  # 交易策略
buy = 0
sell = 0
cost = 0  # 目前花的
count = 0  # 算贏的次數
profit = [0]  # 獲利
date = []  # 獲利的日期

# 2019-5-4 updated 對應數值
buyArr = []  # 存取每次buy
sellArr = []  # 存取每次sell


for i in range((len(tsmcBBands)-1)):  # (len(tsmcBBands)-1)

    #   if(data.Close[i+mean] < data.Close[i+mean-1]   and data.Close[i+mean] > tsmcBBands.upBBand[i]):
    # 高於2倍標準差下賣出
    if(data.Close[i+mean] > tsmcBBands.upBBand[i]):
        if(i == len(tsmcBBands)-2):  # 若到期時還賣出訊號就不要
            continue

    # 賣出條件(當股價跌到downband底下，看到賣出訊號隔天開盤價賣出)
        if(buy != 0):
            profit.append((data.Open[i+mean+1] * buy - cost))  # 隔天開盤價賣出
            principal = principal + profit[-1] * 1000  # profit[-1]為最新的獲利
            #print("append 到profit:", (data.Open[i+mean+1] * buy - cost ), "目前 cost： ",cost)
            date.append(data.index[i+mean+1])  # 賣出的天數也存起來
            for x in range(0, buy):
                sellArr.append(data.Open[i+mean+1])
            buy = 0
            cost = 0  # 2019-5-07 v1 初始化
            #print("賣出全部","buy", buy, "個","價格", data.Open[i+mean+1],"加進 sellArr")
            #print("目前sellArr:", sellArr)
            #print("目前buyArr: ", buyArr)

    if(i == len(tsmcBBands)-2):  # 到期時（最後一天）
        if(buy != 0):  # 若買進不等於0,則當天平倉
            sell = buy
            profit.append((data.Close[i+mean] * buy - cost))
            principal = principal + profit[-1] * 1000

            #print("append 到profit:", (data.Close[i+mean] * buy - cost ))
            date.append(data.index[i+mean])
            for x in range(0, sell):
                sellArr.append(data.Close[i+mean])
            #print("[最後]全部賣出","buy",buy,"賣出價格 ",data.Close[i+mean], "放進 sellArr ")
            # 平倉完後要初始化
            cost = 0  # 2019-5-07 v1 初始化
            buy = 0
            sell = 0
        #print("[最後]目前sellArr:", sellArr)
        #print("[最後]目前buyArr: ", buyArr)

        # ------------------------買進狀況
        # 連漲兩天 且 低於一倍標準差下買進
     # 低於2倍標準差下買進
    if(data.Close[i+mean] < tsmcBBands.downBBand[i]):

        # 若到期時還有買進訊號就不要買
        if(i == len(tsmcBBands)-2):
            continue
        cost = cost + data.Open[i+mean+1]
        # 本金小於花費就不能買
        if (principal < cost * 1000):
            cost = cost - data.Open[i+mean+1]
            continue
        else:
            buy = buy + 1
            buyArr.append(data.Open[i+mean+1])
            #print("買進","buy", buy, "加進 buyArr", data.Open[i+mean+1])


# --------------------------------績效-------------------------------------------
profit = profit[1:]  # 去掉第一個0


# 每筆報酬收入
rate = []
for k in range(0, len(sellArr)):
    # rate.append((sellArr[i]-buyArr[i])/buyArr[i])
    rate.append((sellArr[k]-buyArr[k])*0.994)


# 每筆報酬率
profit2 = pd.Series(rate)

# 平均每筆賺多少
if(len(profit2[profit2 > 0]) == 0):
    meanWin = 0
else:
    # sum(profit2[profit2>0])/len(profit2[profit2>0])
    meanWin = sum(profit2[profit2 > 0])/len(profit2[profit2 > 0])


# 平均每筆賠多少
if(len(profit2[profit2 < 0]) == 0):
    meanLoss = 0
else:
    meanLoss = sum(profit2[profit2 < 0])/len(profit2[profit2 < 0])

# 勝率
winRate = len(profit2[profit2 > 0])/len(profit2[profit2 != 0])*100

# 績效表現
perform = {'winRate': winRate, 'meanWin': meanWin, 'meanLoss': meanLoss}


# 累積報酬
title = ['profit']
df = pd.DataFrame(0, index=data.index, columns=title)
#print("df lenghth: ", len(df))
j = 0
for i_iloc in range(len(df)):
    if(j < len(date)):
        if(df.index[i_iloc] == date[j]):
            # print(j)
            df.iloc[i_iloc] = profit[j]
            j = j + 1


# 有交易的累積報酬
tradecum = np.cumsum(df)[0:]+principal  # 有交易累積本金


# 沒交易的累積報酬
pro = (data.Close-data.Close.shift(1))*0.994+principal  # 沒交易累積本金
title = ['profit']
notrade = pd.DataFrame(pro)
notrade.iloc[0, 0] = principal
cum = notrade


# pdseries轉換list
# 轉資料
# 時間



#時間格式重組
time=data.index
time2=time.strftime('%d %b %Y %H:%M')
time2=time2+' Z'
time22=list(time2)

#加這個可以註解時間
labeltime=list(time.strftime('%Y-%m-%d'))



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



#新data(把布林通道都變成null)
tsmcBBands['time']=tsmcBBands.index
data['time']=data.index
newdata= pd.merge(data,tsmcBBands, on='time',how='outer')
newdata2=newdata.iloc[:,6:]
#新data結束
data_upBBand = newdata2['upBBand'].replace(np.nan, "null").values.tolist()
data_midBBand = newdata2['midBBand'].replace(np.nan, "null").values.tolist()
data_downBBand = newdata2['downBBand'].replace(np.nan, "null").values.tolist()

#新data結束


data_time = time22

#data_upBBand = tsmcBBands['upBBand'].values.tolist()
#data_midBBand = tsmcBBands['midBBand'].values.tolist()
#data_downBBand = tsmcBBands['downBBand'].values.tolist()


data_volume = data['Volume'].values.tolist()

# 累績報酬率
data_tradecum = tradecum['profit'].values.tolist()
data_cum = cum['Close'].values.tolist()





#布林通道
a = {
    "volume": data_volume,
    "upBBand": data_upBBand,
    "midBBand": data_midBBand,
    "downBBand": data_downBBand,
    "labeltime":labeltime#加一個時間
}

#績效表現
b = {
     # 績效表現
    'winRate': winRate,
    'loseRate': 100-winRate,
    'meanWin': meanWin*1000,
    'meanLoss': meanLoss*1000,
}

#交易報酬
c = {
    # 有交易累積報酬
    'tradecum': data_tradecum,
    'notradecum': data_cum
    # 未交易累積報酬
}



#20200326改

bbanddata = [a,b,c,newData,data_time]
finalbbanddata= json.dumps(bbanddata)
print(finalbbanddata)
