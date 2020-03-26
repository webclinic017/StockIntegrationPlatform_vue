# -*- coding: utf-8 -*-
"""
Created on Thu Mar 19 13:00:09 2020

@author: User
"""

from pandas_datareader import data as pdr
import time
import yfinance as yf
import json

import sys

yf.pdr_override() # <== that's all it takes :-)

# download dataframe
data = pdr.get_data_yahoo(sys.argv[1], start=sys.argv[2], end=sys.argv[3])
# data = pdr.get_data_yahoo(sys.arg[0], start="2019-12-01", end="2019-12-31")


#時間
time=data.index

time2=time.strftime('%d %b %Y %H:%M')

time2=time2+' Z'

time22=list(time2)

data_time=time22
data_open=data['Open'].values.tolist()
data_high=data['High'].values.tolist()
data_low=data['Low'].values.tolist()
data_close=data['Close'].values.tolist()
data_volume=data['Volume'].values.tolist()


stockprice_dict = {
             "time": data_time,
             "Open": data_open,
             "High": data_high,
             "Low": data_low,
             "Close": data_close,
                }



stockprice_dict2 = json.dumps(stockprice_dict)
print(stockprice_dict2)

