const a = "htllo.page?app_id=2gl1hip5cvn&valid_id=PWD002"
const newa = (a.substring(a.indexOf('?')+1)).split('&')
const valid_id = newa[0].split("=")[1]
const app_id = newa[0].split("=")[1]
console.log(valid_id)
