import requests

apikey = "LIVDSRZULELA"  # test value
lmt = 50

search_term = "anim kiss"
r = requests.get("https://api.tenor.com/v1/search?q=%s&key=%s&limit=%s" % (search_term, apikey, lmt))
d = r.json()
g = []
i = 0

for t in d['results']:
    for gt in t['media']:
        i += 1

        f = open(f'imgs/{i}.gif','wb')
        f.write(requests.get(gt['gif']['url']).content)
        f.close()