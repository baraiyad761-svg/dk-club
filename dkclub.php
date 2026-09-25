<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DDWIN - 91 Club Clone</title>
<link rel="manifest" href="manifest.json">
<style>
body{margin:0;background:#0a0a0a;color:#fff;font-family:Arial}
.top{background:gold;color:#000;padding:12px;display:flex;justify-content:space-between;font-weight:bold}
.nav{display:flex;justify-content:space-around;background:#1a1a1a;padding:10px;position:fixed;bottom:0;width:100%}
.nav div{text-align:center;font-size:12px;cursor:pointer}
.page{display:none;padding:15px;padding-bottom:80px}
.active{display:block}
.card{background:#1e1e1e;padding:15px;border-radius:12px;margin:10px 0;border:1px solid #333}
.btn{width:100%;padding:12px;background:gold;border:none;border-radius:8px;font-weight:bold;margin-top:10px}
input{width:95%;padding:10px;border-radius:8px;border:none;margin:5px 0;background:#2a2a2a;color:#fff}
.grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px}
.g-card{background:#222;padding:10px;border-radius:10px;text-align:center;font-size:30px}
.fish{font-size:35px;position:absolute;cursor:pointer}
</style>
</head>
<body>

<div class="top"><span>DDWIN 💎</span><span>₹<span id="balTop">0</span></span></div>

<!-- LOGIN PAGE -->
<div id="loginPage" class="page active">
<h2 style="text-align:center">Login / Register</h2>
<div class="card">
<input id="mob" placeholder="Mobile Number">
<input id="pass" type="password" placeholder="Password">
<button class="btn" onclick="login()">LOGIN & START GAME</button>
<p style="text-align:center;font-size:12px;color:#aaa">Login કરતા જ ₹1000 Bonus મળશે</p>
</div>
</div>

<!-- HOME / COLOUR GAME -->
<div id="homePage" class="page">
<div class="card" style="background:linear-gradient(gold,orange);color:#000;text-align:center">
<h3>Wallet Balance</h3><h1>₹<span id="bal">1000</span></h1>
<button onclick="showPage('walletPage')" style="padding:6px 15px;border-radius:20px;border:none;background:#000;color:gold">Deposit / Withdraw</button>
</div>
<div class="card">
<h3>🎯 Colour Prediction</h3>
<p id="timer" style="color:gold">30s</p>
<div style="display:flex;gap:10px"><button onclick="playColor('RED')" style="background:red" class="btn">RED</button><button onclick="playColor('GREEN')" style="background:green" class="btn">GREEN</button><button onclick="playColor('VIOLET')" style="background:violet" class="btn">VIOLET</button></div>
</div>
<button class="btn" onclick="showPage('slotsPage')" style="background:#222;color:#fff;border:1px solid gold">🎰 20 SLOT GAMES PLAY</button>
<button class="btn" onclick="showPage('fishPage')" style="background:#00aaff">🐟 FISH HUNTER 20 FISH</button>
</div>

<!-- SLOTS PAGE -->
<div id="slotsPage" class="page">
<h2>🎰 20 GEMS / SLOTS</h2>
<div id="slotGrid" class="grid"></div>
<div id="gemBox" class="grid" style="margin-top:15px"></div>
<p id="slotResult" style="text-align:center;font-size:24px"></p>
<button class="btn" onclick="spinGems()">OPEN 15 GEMS 💎</button>
</div>

<!-- FISH PAGE -->
<div id="fishPage" class="page">
<h2>🐟 FISH HUNTER</h2>
<div id="sea" style="position:relative;height:60vh;background:linear-gradient(#00aaff,#001a33);border-radius:15px;overflow:hidden"></div>
<button class="btn" onclick="loadFish()">START 20 FISH</button>
</div>

<!-- WALLET PAGE -->
<div id="walletPage" class="page">
<h2>Wallet</h2>
<div class="card"><h1>₹<span id="bal2">1000</span></h1></div>
<div class="card">
<h3>Deposit</h3><input id="depAmt" placeholder="Amount"><button class="btn" onclick="deposit()">Deposit Add</button>
<h3>Withdraw</h3><input id="withAmt" placeholder="Amount"><input placeholder="UPI ID"><button class="btn" onclick="withdraw()" style="background:#fff;color:#000">Withdraw</button>
</div>
</div>

<div class="nav">
<div onclick="showPage('homePage')">🏠<br>Home</div>
<div onclick="showPage('slotsPage')">🎰<br>Gems</div>
<div onclick="showPage('fishPage')">🐟<br>Fish</div>
<div onclick="showPage('walletPage')">💰<br>Wallet</div>
</div>

<script>
let bal = parseInt(localStorage.getItem('ddwin_bal') || 1000);
function updateBal(){ document.getElementById('balTop').innerText=bal; document.getElementById('bal').innerText=bal; document.getElementById('bal2').innerText=bal; localStorage.setItem('ddwin_bal',bal); }
updateBal();

function login(){
 if(document.getElementById('mob').value.length<5){alert("Mobile nakho");return;}
 localStorage.setItem('ddwin_user', document.getElementById('mob').value);
 showPage('homePage'); updateBal();
}
function showPage(p){
 document.querySelectorAll('.page').forEach(x=>x.classList.remove('active'));
 document.getElementById(p).classList.add('active');
 if(p=='slotsPage') loadSlots();
 if(p=='fishPage') loadFish();
}

function playColor(c){
 let bet=100; if(bal<bet){alert("Low Bal");return;}
 let win=['RED','GREEN','VIOLET'][Math.floor(Math.random()*3)];
 if(c==win){bal+=bet;alert("WIN "+win);}else{bal-=bet;alert("LOSS Result "+win);}
 updateBal();
}
function deposit(){ let a=parseInt(document.getElementById('depAmt').value); bal+=a; updateBal(); alert("Deposit Success ₹"+a); }
function withdraw(){ let a=parseInt(document.getElementById('withAmt').value); if(a>bal){alert("Low Bal");return;} bal-=a; updateBal(); alert("Withdraw Request ₹"+a+" - 24h me aayega"); }

let games=["✈️","💣","📈","🔴","🎲","🎡","7️⃣","🃏","🐯","🎰","🍒","💎","🍀","🃏","👑","💰","💠","🍬","⚡","🌟"];
function loadSlots(){
 let g=document.getElementById('slotGrid'); g.innerHTML="";
 games.forEach((icon,i)=>{ g.innerHTML+=`<div class='g-card'>${icon}<br><small style='font-size:10px'>Game ${i+1}</small></div>`; });
 spinGems();
}
function spinGems(){
 let box=document.getElementById('gemBox'); box.innerHTML="";
 let res=document.getElementById('slotResult'); let win=0;
 for(let i=0;i<15;i++){
  let r=Math.random(); let em=r>0.6?"💎":r>0.3?"💰":"💣";
  box.innerHTML+=`<div class='g-card'>${em}</div>`;
  if(em=="💎") win+=50; if(em=="💰") win+=20; if(em=="💣") win-=10;
 }
 if(win>0){bal+=win; res.innerText="WIN ₹"+win+" 💎";}else{bal+=win; res.innerText="LOSS ₹"+Math.abs(win);}
 updateBal();
}

function loadFish(){
 let sea=document.getElementById('sea'); sea.innerHTML="";
 for(let i=0;i<20;i++){
  let f=document.createElement('div'); f.className='fish';
  f.innerText=["🐟","🐠","🐡","🦈","🐙"][Math.floor(Math.random()*5)];
  f.style.left=Math.random()*85+"%"; f.style.top=Math.random()*80+"%";
  f.onclick=function(){ bal+=20; updateBal(); this.innerText="💥"; setTimeout(()=>this.remove(),300); }
  sea.appendChild(f);
 }
}
setInterval(()=>{ let t=document.getElementById('timer'); if(t){ let s=parseInt(t.innerText); if(s<=0) t.innerText="30s"; else t.innerText=(s-1)+"s"; } },1000);
</script>
</body>
</html>
