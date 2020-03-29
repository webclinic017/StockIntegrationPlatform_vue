import requests
import pandas as pd
import json
import time

stock = ["6560", "6561"]

# stock = input('輸入股票代碼')


new_data = []


url= "https://mops.twse.com.tw/mops/web/ajax_t100sb07_1"
r = requests.get(url, {
        'encodeURIComponent':1,
        'step':1,
        'firstin':1,
        'off':1,
        'TYPEK':'all',
        'co_id':1264,
    })

r.encoding = 'utf8'
dfs = pd.read_html(r.text, header=None)

Data=[]
Data += [{"0 股票代碼:":str(1264)}]

for vel,index in enumerate(dfs[0][1]):
    if (index == '法人說明會簡報內容'):
        Data[0][str(vel+1)+' '+index+':'] = "https://mops.twse.com.tw/nas/STR/"+str(dfs[0][3][vel])
    else:
        Data[0][str(vel+1)+' '+index] = str(dfs[0][3][vel])



print(Data)

# with open('C:/Users/Brian/Documents/GitHub/StockIntegrationPlatform_vue/public/python/concall.json', 'r', encoding='utf-8') as f:
    # print(json.load(f))


# print(newData)

