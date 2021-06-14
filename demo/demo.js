const fetch = require('node-fetch');

fetch("https://enzia.toile-libre.org/cdn/feeling/?feeling=hug&random=true")
.then(response => response.json())
.then(data => {
    console.log(data)
});