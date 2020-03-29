import sys
import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.common.exceptions import NoSuchElementException
from bs4 import BeautifulSoup
import json

driver = webdriver.Chrome()
driver.get('https://mops.twse.com.tw/mops/web/t05st03')


#1592 1593

stockid = ["2511 ", "2514 ", "2515 ", "2516 ", "2520 ", "2524 ", "2527 ", "2528 ", "2530 ", "2534 ", "2535 ", "2536 ", "2537 ", "2538 ", "2539 ", "2540 ", "2542 ", "2543 ", "2545 ", "2546 ", "2547 ", "2548 ", "2596 ", "2597 ", "2601 ", "2603 ", "2605 ", "2606 ", "2607 ", "2608 ", "2609 ", "2610 ", "2611 ", "2612 ", "2613 ", "2614 ", "2615 ", "2616 ", "2617 ", "2618 ", "2630 ", "2633 ", "2634 ", "2636 ", "2637 ", "2640 ", "2641 ", "2642 ", "2643 ", "2701 ", "2702 ", "2704 ", "2705 ", "2706 ", "2707 ", "2712 ", "2718 ", "2719 ", "2722 ", "2723 ", "2724 ", "2726 ", "2727 ", "2729 ", "2731 ", "2732 ", "2734 ", "2736 ", "2739 ", "2740 ", "2743 ", "2745 ", "2748 ", "2752 ", "2801 ", "2809 ", "2812 ", "2816 ", "2820 ", "2823 ", "2832 ", "2834 ", "2836 ", "2838 ", "2841 ", "2845 ", "2849 ", "2850 ", "2851 ", "2852 ", "2855 ", "2867 ", "2880 ", "2881 ", "2882 ", "2883 ", "2884 ", "2885 ", "2886 ", "2887 ", "2888 ", "2889 ", "2890 ", "2891 ", "2892 ", "2897 ", "2901 ", "2903 ", "2904 ", "2905 ", "2906 ", "2908 ", "2910 ", "2911 ", "2912 ", "2913 ", "2915 ", "2916 ", "2923 ", "2924 ", "2926 ", "2928 ", "2929 ", "2936 ", "2937 ", "2939 ", "3002 ", "3003 ", "3004 ", "3005 ", "3006 ", "3008 ", "3010 ", "3011 ", "3013 ", "3014 ", "3015 ", "3016 ", "3017 ", "3018 ", "3019 ", "3021 ", "3022 ", "3023 ", "3024 ", "3025 ", "3026 ", "3027 "]


newData=[]


for var,index in enumerate(stockid):
    x = var+1
    if x%20 == 0:
        time.sleep(60)
    if x%100 == 0:
        time.sleep(120)
    driver.find_element_by_id('co_igfdd').send_keys(index)
    driver.find_element_by_id('co_gfdggfd').send_keys(Keys.ENTER)
    time.sleep(1)

    soup = BeautifulSoup(driver.page_source, 'html.parser')
    # dellay=soup.find('table', class_ = 'hasBorder')
    table=soup.find('table', class_ = 'hasBorder')
    table_all=table.find_all('td')
    basic_data=[]

    for i in range(0,len(table_all)):
        basic_data.append(table_all[i].text)

    basic_dict = {
        "stock_id": index,
        "company": basic_data[3],
        "industry": basic_data[1].strip().replace(u'\u3000', u' ').replace(u'\xa0', u' '),
        "start_time": basic_data[13],
        "IPO":basic_data[16],
        "Chairman":basic_data[6],
        "capital":basic_data[15].strip(),
        "publiccommon_stock":basic_data[21].replace(" ", "").replace('\n',''),
        "common_stock":basic_data[20].replace(" ", ""),
        "preferred_stock":basic_data[22].replace(" ", ""),
        "investman":basic_data[41],
        "Main_business":basic_data[12],
    }
    newData += [basic_dict]
    driver.find_element_by_id('co_id').clear()

driver.quit()

finalbasic= json.dumps(newData)

with open('C:/Users/Brian/Documents/GitHub/StockIntegrationPlatform_vue/public/python/test-2.json', 'w') as f:
    json.dump(finalbasic, f)

# with open('C:/Users/Brian/Documents/GitHub/StockIntegrationPlatform_vue/public/python/test.json', 'r') as f:
#     load_dict = json.load(f)

# print(finalbasic)





