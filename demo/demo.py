import requests
import json

feeling = "hug"
random = True

req = requests.get("https://enzia.toile-libre.org/cdn/feeling/?feeling=%s&random=%s" % (feeling, random))

# Renvois :
# - success (200 pour bon)
# - exist (si le fichier existe bien, utile quand on cherche un ID en particulier)
# - link (le lien)  
rep = req.json()
print(rep)