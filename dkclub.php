<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>91 CLUB - Final</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial}body{background:#f0f0f0}
.loginPage{padding:20px;background:#fff;height:100vh} .loginPage h2{text-align:center;margin:20px 0} .inp{width:100%;padding:14px;margin:8px 0;border:1px solid #ddd;border-radius:8px}
.btnRed{width:100%;padding:14px;background:#ff3a3a;color:#fff;border:none;border-radius:25px;font-weight:bold;margin-top:10px}
.header{background:#ff3a3a;color:#fff;padding:12px;text-align:center;font-weight:bold;position:sticky;top:0;z-index:20;display:flex;justify-content:space-between}
.wallet{background:linear-gradient(90deg,#ff4d4d,#ff8a00);color:#fff;margin:10px;border-radius:12px;padding:15px;display:flex;justify-content:space-between}
.tabs{display:flex;gap:8px;padding:10px;overflow:auto;background:#fff} .tab{padding:8px 15px;border-radius:20px;border:1px solid #ddd;white-space:nowrap;font-size:12px} .tab.active{background:#ff3a3a;color:#fff}
.games{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;padding:10px} .g{background:#fff;border-radius:10px;padding:10px;text-align:center;box-shadow:0 1px 2px #0001;height:90px;display:flex;flex-direction:column;justify-content:center;align-items:center;font-size:11px;font-weight:bold}
.g span{font-size:22px}
#main{display:none} #login{display:block}
#gamePage{position:fixed;top:0;left:0;width:100%;height:100%;background:#111;display:none;z-index:99;padding:10px;overflow:auto;color:#fff;text-align:center}
.grid5{display:grid;grid-template-columns:repeat(5,1fr);gap:6px;margin:15px 0} .box{background:#2a2a2a;height:48px;border-radius:6px;display:flex;align-items:center;justify-content:center}
.betRow{display:flex;gap:6px;margin:10px 0} .betRow input{flex:1;padding:12px;border-radius:8px;border:none} .betRow button{padding:10px 12px;border-radius:8px;border:none;background:#333;color:#fff}
</style>
</head>
<body>

<div id="login" class="loginPage">
<h2>Log in<br><span style="font-size:13px;color:#666">Please log in with your phone number</span></h2>
<input class="inp" placeholder="Phone Number +91">
<input class="inp" type="password" placeholder="Password">
<p style="text-align:right;font-size:12px;color:#ff3a3a">Forgot password? Remember password</p>
<button class="btnRed" onclick="loginNow()">Log in</button>
<button class="btnRed" style="background:#fff;color:#ff3a3a;border:1px solid #ff3a3a">Register</button>
<p style="font-size:11px;text-align:center;margin-top:20px;color:#888">91 CLUB.COM Official Channel @telegram</p>
</div>

<div id="main">
<div class="header"><span>91 CLUB</span><span>Balance ₹<b id="bal">5000.00</b></span></div>
<div class="wallet"><div>Total balance<br><b style="font-size:20px">₹<span id="bal2">5000.00</span></b><br><span style="font-size:11px">UID 3674707</span></div><div><button style="background:#fff;border:none;padding:8px 15px;border-radius:20px;color:#ff3a3a" onclick="balance+=500;upd()">Deposit</button></div></div>

<div class="tabs">
<div class="tab active">For You</div><div class="tab">Lobby</div><div class="tab">Slots</div><div class="tab">Card</div><div class="tab">Fishing</div><div class="tab">JILI</div>
</div>

<div style="padding:10px">
<div style="display:flex;gap:8px"><input id="betAmt" type="number" value="100" style="flex:1;padding:10px;border-radius:8px;border:1px solid #ddd"><button onclick="betAmt.value=100" style="padding:10px">100</button><button onclick="betAmt.value=500">500</button></div>
</div>

<div class="games" id="gameList"></div>

<div style="height:80px"></div>
<div style="position:fixed;bottom:0;width:100%;background:#fff;display:flex;justify-content:space-around;padding:10px;border-top:1px solid #ddd;font-size:12px"><span>🏠 Home</span><span>🎁 Activity</span><span>💰 Get ₹500</span><span>📢 Promotion</span><span>👤 Account</span></div>
</div>

<div id="gamePage">
<h2 id="gTitle" style="color:gold"></h2>
<p>Bet ₹<span id="sBet">0</span> | Win ₹<span id="wAmt">0</span> | <span id="mText">1.00x</span></p>
<div id="gContent"></div>
<button class="btnRed" style="background:#00c851" onclick="cashout()">WIN CASHOUT</button>
<button class="btnRed" style="background:#333" onclick="document.getElementById('gamePage').style.display='none'">Close - Loss</button>
</div>

<script>
let balance=5000;
function loginNow(){document.getElementById('login').style.display='none';document.getElementById('main').style.display='block';}
function upd(){document.getElementById('bal').innerText=balance.toFixed(2);document.getElementById('bal2').innerText=balance.toFixed(2);}
let allGames=["AVIATOR","AVIATOR 2","CHICKEN ROAD","CHICKEN ROAD 2","DRAGON GEMS CLASH","GEMS CLASH","PUBG","MINES","MINES PRO","CRICKET","LIMBO","JAVELIN","DRAGON TIGER","GOAL","DICE","KING PAUPER","HILO","PLINKO","BOMB WAVE","HOTLINE","CRYPTOS","ROULETTE","KENO 80","KENO PHARAOH","COIN FLIP","MONEY COMING","RUMMY","TEEN PATTI","ANDAR BAHAR","BLACKJACK","FISHING CLUB","MINESWEEPER","ROCKET DICE","SPACE XY","7UP 7DOWN","BONUS ROAD","TRADER","BALLOON","SUPER PENALTY","POWER KRAKEN","CRASH","HEAD TAILS","CHICKEN DASH","JOKER COINS","MEGA ACE","SUPER ACE","CHARGE BUFFALO","MEGA QUEEN","ALI BABA","GOLDEN BANK","FORTUNE WHEEL","LUCKY JAGUAR","CANDY BABY","CRAZY FAFAFA","HAPPY TAXI","FENG SHEN","WAR DRAGONS","LUCKY PIGGY","CRICKET KING","GOLDEN TEMPLE","FRUITY WHEEL","TREASURE","ZOMBIE ROULETTE","BUFFALO BANK","JOKER 777","CLOVER COINS","WILD TIGER","DROP BALL","MONEY COMING 100x","DINOSAUR TYCOON","DRAGON FORTUNE","BOOM LEGEND","MEGA FISHING","HAPPY FISHING","BOMBING FISHING","ROYAL FISHING","JACKPOT FISHING","SHADE DRAGONS","DISCO FISHING"];

let gl=document.getElementById('gameList');
allGames.forEach(n=>{
 let d=document.createElement('div'); d.className='g'; d.innerHTML='<span>🎮</span>'+n; d.onclick=()=>openGame(n); gl.appendChild(d);
});

let bet=0,win=0,mult=1,bombs=[],timer=null;
function openGame(name){
 bet=parseInt(document.getElementById('betAmt').value); if(bet>balance){alert('Balance nathi');return;}
 balance-=bet; upd(); win=0;mult=1;
 document.getElementById('gTitle').innerText=name;
 document.getElementById('sBet').innerText=bet;
 document.getElementById('wAmt').innerText=0;
 document.getElementById('mText').innerText='1.00x';
 document.getElementById('gamePage').style.display='block';
 let c=document.getElementById('gContent'); c.innerHTML='';
 if(name.includes('MINES')||name.includes('GEMS')){
   bombs=[2,8,19]; let grid=document.createElement('div'); grid.className='grid5';
   for(let i=0;i<25;i++){let b=document.createElement('div'); b.className='box'; b.id='bx'+i; b.innerText='?'; b.onclick=function(){if(b.innerText!='?')return; if(bombs.includes(i)){b.innerText='💣';b.style.background='red';alert('Bomb Loss ₹'+bet);document.getElementById('gamePage').style.display='none';}else{b.innerText='💎';b.style.background='#00c851';mult+=0.9;win=Math.floor(bet*mult); document.getElementById('wAmt').innerText=win; document.getElementById('mText').innerText=mult.toFixed(2)+'x';}}; grid.appendChild(b);}
   c.appendChild(grid);
   // Auto open start
   let auto=document.createElement('button'); auto.innerText='AUTO GEMS START'; auto.className='btnRed'; auto.style.background='#ff8a00';
   auto.onclick=()=>{timer=setInterval(()=>{let rem=[];for(let i=0;i<25;i++){let e=document.getElementById('bx'+i); if(e.innerText=='?')rem.push(i);} if(rem.length==0){clearInterval(timer);return;} let idx=rem[Math.floor(Math.random()*rem.length)]; document.getElementById('bx'+idx).click();},700);};
   c.appendChild(auto);
 } else {
   c.innerHTML='<h1 style="font-size:60px;margin:20px">🚀</h1><p>'+name+' - 91 Club Real Logic</p><button class="btnRed" onclick="playCrash()">PLAY</button><h1 id="crash" style="margin:15px">1.00x</h1>';
 }
}

function playCrash(){
 let v=1.0; let crashPt=(Math.random()*4+1.2).toFixed(2);
 let iv=setInterval(()=>{v+=0.05; document.getElementById('crash').innerText=v.toFixed(2)+'x'; document.getElementById('mText').innerText=v.toFixed(2)+'x'; win=Math.floor(bet*v); document.getElementById('wAmt').innerText=win; if(v>=crashPt){clearInterval(iv); alert('Crashed at '+crashPt+'x | Loss ₹'+bet); document.getElementById('gamePage').style.display='none';}},100);
}

function cashout(){if(win==0){alert('Pela ek gem kholo!');return;} clearInterval(timer); balance+=win; upd(); alert('WIN ₹'+win+' | Bet ₹'+bet+' -> '+mult.toFixed(2)+'x'); document.getElementById('gamePage').style.display='none';}
</script>
</body>
</html>
