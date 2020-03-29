import requests
import pandas as pd
import numpy as np

def financial_statement(year, season, type='綜合損益彙總表'):

    if year >= 1000:
        year -= 1911

    if type == '綜合損益彙總表':
        url = 'https://mops.twse.com.tw/mops/web/ajax_t163sb04'
    elif type == '資產負債彙總表':
        url = 'https://mops.twse.com.tw/mops/web/ajax_t163sb05'
    elif type == '營益分析彙總表':
        url = 'https://mops.twse.com.tw/mops/web/ajax_t163sb06'
    else:
        print('type does not match')

    r = requests.post(url, {
        'encodeURIComponent':1,
        'step':1,
        'firstin':1,
        'off':1,
        'TYPEK':'sii',
        'year':str(year),
        'season':str(season),
    })

    r.encoding = 'utf8'
    dfs = pd.read_html(r.text, header=None)

    return pd.concat(dfs[1:], axis=0, sort=False)\
             .set_index(['公司代號'])\
             .apply(lambda s: pd.to_numeric(s, errors='ceorce'))

print(financial_statement(108, 3)) # 顯示 10
