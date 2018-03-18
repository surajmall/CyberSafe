#!/usr/bin/env python
import json
import requests
header = {'Content-Type': 'application/json',
                  'Accept': 'application/json'}
url = 'http://localhost:9000/api'
data=json.dumps({'username':"__atyachari__"})
r=requests.post(url,data,header)
r=r.json()
print(r)
for x in r['result']:
    print(x)
    if(x==0):
        print("depression")
    elif(x==2):
        print("anxiety")
    elif(x==6):
        print("self harm")
    elif(x==7):
        print("suicidal")
    else:
        print("Normal")
#print(r.json())
