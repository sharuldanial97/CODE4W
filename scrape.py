##!/usr/bin/env python

from bs4 import BeautifulSoup
import requests
import re
import csv
import sys
import pandas as pd
from pandas import DataFrame
import matplotlib.pyplot as pyplot


pageUrl = '1'
searchTerm = sys.argv[1]
pageNum = 0

avg = 0
num = 0
total = 0

date = []
price = []

source = requests.get('https://www.exoticanimalsforsale.net/search.asp?page=' + pageUrl + '&q=' + searchTerm).text
soup = BeautifulSoup(source, 'lxml')

pageNum = 0
for page in soup.find_all('div', id='pagination'):
    a = page.find_all('a')
    pageNum = len(a)
   
for i in range(pageNum):
    pageUrl = str(i + 1)
    source = requests.get('https://www.exoticanimalsforsale.net/search.asp?page=' + pageUrl + '&q=' + searchTerm).text
    soup = BeautifulSoup(source, 'lxml')

    for sevenUD in soup.find_all('div', class_='7u$'):
        #print(sevenUD.prettify())

        row = sevenUD.find('div', class_='row')
        #print(row.prettify())
        
        twelveUD = row.find('div', class_='12u$')
        #print(twelveUD.prettify())

        sRow = twelveUD.find('div', class_='row')
        #print(sRow.prettify())

        sTwelveUD = sRow.find_all('div', class_='12u$')
        count = 0
        for sTUD in sTwelveUD:

            info = sTUD.text.split(":")
            if(info[0] == "Price"):
                price.append(info[1].replace('$', "").replace(',', '').replace(' ', ''))

            if(info[0] == "Posted"):
                date.append(info[1].split("/")[0])

            if(count%2!=0):
                if(len(date) > len(price)):
                    price.append('0')
                
            count += 1
        

        df = DataFrame(list(zip(date, price)), columns=['Date', 'Price'])
        export_csv = df.to_csv(r'C:\Users\Als.DESKTOP-21IAGT9\Documents\Projects\code4w\python\scrape.csv', index = None, header=True)


df = pd.read_csv('python/scrape.csv')

fig, ax = pyplot.subplots(figsize=(15,7))
df.groupby('Date')['Price'].sum().plot(ax=ax)

#df.plot(kind='scatter', x='Date', y='Price')
#df.plot(kind='hist' , y='Date', x='Price')
#pyplot.show()
pyplot.savefig('plot.png')
#print(df)