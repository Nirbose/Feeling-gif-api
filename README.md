# Feeling-gif-api
L'api pour chercher un feeling en GIF !

## Utilisation :
Si le requête est un success (200) alors vous devriez recevoir 3 objet :
 - success (succes de la requête)
 - exist (si le fichier existe bien, utile quand on cherche un ID en particulier)
 - link (le lien)

**JS :**
```js
const fetch = require('node-fetch');

let feeling = "hug";
let random = true;

fetch(`https://enzia.toile-libre.org/cdn/feeling/?feeling=${feeling}&random=${random}`)
.then(response => response.json())
.then(data => {
    console.log(data)
});
```

**PY :**
```py
import requests
import json

feeling = "hug"
random = True

req = requests.get("https://enzia.toile-libre.org/cdn/feeling/?feeling=%s&random=%s" % (feeling, random))

rep = req.json()
print(rep)
```

Vous pouver aussi chercher un ID en particulier avec :
`https://enzia.toile-libre.org/cdn/feeling/?feeling=hug&id=12`
Si l'id n'existe pas il vous repondra `exist = false`, si vous voulez absolument avoir un retour en true vous pouver forcée :
`https://enzia.toile-libre.org/cdn/feeling/?feeling=hug&id=12&force_success=true`

## Feeling disponible :
- hug
- kiss
- pat
- eat
- punch
- cry
- blush

## Fait par Nirbose
*PS: se que vous trverer dans le dossier /App n'est pas encore mis en place donc suivez bien se qui est dis au dessus.*
