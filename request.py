import requests

url = "https://scorecard.mhexam.com/api/api/admitcard/fetchadmitcard"

appno=12345678
dob='37/7/2069'
dobe=dob.split("/")
day=dobe[0]
month=dobe[1]
year=dobe[2]
print(dobe)

payload = f'=%7B%22LoginId%22%3A%22{appno}%22%2C%22Password%22%3A%22{day}%2F{month}%2F{year}%22%2C%22CourseCode%22%3A%2217%22%7D'
headers = {
  'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:127.0) Gecko/20100101 Firefox/127.0',
  'Accept': 'application/json, text/javascript, */*; q=0.01',
  'Accept-Language': 'en-US,en;q=0.5',
  'Accept-Encoding': 'gzip, deflate, br, zstd',
  'Content-Type': 'application/x-www-form-urlencoded',
  'X-Requested-With': 'XMLHttpRequest',
  'Origin': 'https://scorecard.mhexam.com',
  'Connection': 'keep-alive',
  'Referer': 'https://scorecard.mhexam.com/v2/MAH-PCM-CET-2024/',
  'Sec-Fetch-Dest': 'empty',
  'Sec-Fetch-Mode': 'cors',
  'Sec-Fetch-Site': 'same-origin',
  'Priority': 'u=1',
  'Cookie': 'L0L'
}

response = requests.request("POST", url, headers=headers, data=payload)
string = response.text
i= string.find("Score1")
score1=(string[i+11]+string[i+12]+string[i+13])
i= string.find("Score2")
score2=(string[i+11]+string[i+12]+string[i+13])
i= string.find("Score3")
score3=(string[i+11]+string[i+12]+string[i+13])
print("physics:",score1)
print("Chemistry:",score2)
print("Maths:",score3)
i= string.find("TotalScore")
total=(string[i+15]+string[i+16]+string[i+17])
print(total)
print(response.text)
