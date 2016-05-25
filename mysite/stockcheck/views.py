from django.shortcuts import render

# Create your views here.

from django.http import HttpResponse

import urllib2
from BeautifulSoup import BeautifulSoup

def index(request):
    page = urllib2.urlopen("http://finance.yahoo.com/market-overview/")
    soup = BeautifulSoup(page)
    colWrap = soup.findAll('div', {"class":'ColWrap'})[0]
    marketUpdate = colWrap.findChildren('div',{"class":"bd"})[0]

    message = ''
    for p in marketUpdate.findAll('p')[:-1]:
        message += str(p.text)
    if not message:
        message = "Counld not retieve market data."
    return HttpResponse(message)
