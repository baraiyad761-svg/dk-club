<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>91 CLUB</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial}
body{background:#f5f5f5}
.header{background:#e71d36;color:#fff;padding:15px;text-align:center;font-size:18px;font-weight:bold}
.wallet{background:linear-gradient(90deg,#ff3a3a,#ff8a00);margin:12px;border-radius:15px;padding:16px;color:#fff;display:flex;justify-content:space-between;align-items:center}
.tabs{display:flex;gap:8px;padding:10px;background:#fff;overflow:auto}
.tab{padding:8px 16px;border-radius:20px;border:1px solid #ddd;white-space:nowrap;font-size:13px;background:#fff}
.tab.active{background:#e71d36;color:#fff}
.betBox{background:#fff;margin:10px;border-radius:12px;padding:12px}
.betRow{display:flex;gap:6px;margin-top:8px}
.betRow input{flex:1;padding:12px;border-radius:8px;border:1px solid #ddd}
.betRow button{padding:10px 12px;border-radius:8px;border:none;background:#eee}
.games{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;padding:10px}
.g{background:#fff;border-radius:12px;padding:15px 5px;text-align:center;box-shadow:0 2px 5px #0001}
#gamePage{position:fixed;top:0;left:0;width:100%;height:100%;background:#111;display:none;z-index:100;padding:15px;color:#fff;text-align:center;overflow:auto}
.grid5{display:grid;grid-template-columns:repeat(5,1fr);gap:7px;margin:15px 0}
.box{background:#2a2a2a;height:50px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:20px}
.btn{width:100%;padding:14px;border-radius:25px;border:none;font-weight:bold;margin-top:10px}
.btnGreen{background:#00c851;color:#fff} .btnRed{background:#e71d36;color:#fff}
</style>
</head>
<body>

<div class="header">91 CLUB</div>

<div class="wallet">
<div><div style="font-size:13px;opacity:0.9">Total balance</div><b style="font-size:24px">₹<span id="bal">5000.00</span></b><br><span style="font-size:11px">UID: 8233336 | VIP1</span></div>
<div><button onclick="balance+=500;upd()" style="background:#fff;border:none;padding:8px 18px;border-radius:20px;color:#e71d36;font-weight:bold">Deposit</button></div>
</div>

<div class="tabs">
<div class="tab active">For You</div><div class="tab">Lobby</div><div class="tab">Slots</div><div class="tab">Card</div><div class="tab">Fishing</div>
</div>

<div class="betBox">
<div style="font-size:13px;color:#666">Bet Amount ગમે એટલી નાખો</div>
<div class="betRow">
<input id="betAmt" type="number" value="100">
<button onclick="betAmt.value=100">100</button>
<button onclick="betAmt.value=500">500</button>
<button onclick="betAmt.value=1000">1000</button>
</div>
</div>

<div class="games">
<div class="g" onclick="openG('MINES')">💣<br>MINES</div>
<div class="g" onclick="openG('GEMS CLASH')">💎<br>GEMS CLASH</div>
<div class="g" onclick="openG('AVIATOR')">🚀<br>AVIATOR</div>
<div class="g" onclick="openG('CHICKEN ROAD')">🐔<br>CHICKEN ROAD</div>
<div class="g" onclick="openG('DRAGON')">🐉<br>DRAGON</div>
<div class="g" onclick="openG('DICE')">🎲<br>DICE</div>
<div class="g" onclick="openG('PLINKO')">🎯<br>PLINKO</div>
<div class="g" onclick="openG('ROULETTE')">🎰<br>ROULETTE</div>
<div class="g" onclick="openG('CRICKET')">🏏<br>CRICKET</div>
</div>

<div id="gamePage">
<h2 id="gTitle" style="color:gold">GAME</h2>
<p>Bet ₹<span id="sBet">0</span> | Win ₹<span id="w">0</span> | <span id="m">1.00x</span></p>
<div id="gContent"></div>
<button class="btn btnGreen" onclick="cashout()">WIN - Cashout ₹<span id="w2">0</span></button>
<button class="btn" style="background:#333;color:#fff" onclick="document.getElementById('gamePage').style.display='none';clearInterval(timer)">Close</button>
</div>

<script>
let balance=5000, bet=0, win=0, mult=1, timer=null;
function upd(){document.getElementById('bal').innerText=balance.toFixed(2);}
function openG(name){
 bet=parseInt(document.getElementById('betAmt').value); if(bet>balance){alert('Balance ઓછું છે');return;}
 balance-=bet; upd(); win=0; mult=1;
 document.getElementById('gTitle').innerText=name;
 document.getElementById('sBet').innerText=bet;
 document.getElementById('gamePage').style.display='block';
 let c=document.getElementById('gContent'); c.innerHTML='';
 let bombs=[2,9,18];
 let grid=document.createElement('div'); grid.className='grid5';
 for(let i=0;i<25;i++){let b=document.createElement('div'); b.className='box'; b.id='b'+i; b.innerText='?'; b.onclick=()=>clickBox(i,bombs); grid.appendChild(b);}
 c.appendChild(grid);
 let autoBtn=document.createElement('button'); autoBtn.className='btn btnRed'; autoBtn.innerText='AUTO GEMS START'; autoBtn.onclick=startAuto;
 c.appendChild(autoBtn);
}
function clickBox(i,bombs){
 let el=document.getElementById('b'+i); if(el.innerText!='?')return;
 if(bombs.includes(i)){el.innerText='💣';el.style.background='red';clearInterval(timer);setTimeout(()=>{alert('Bomb! Loss ₹'+bet);document.getElementById('gamePage').style.display='none';},300);}
 else{el.innerText='💎';el.style.background='#00c851';mult+=0.90;win=Math.floor(bet*mult);document.getElementById('w').innerText=win;document.getElementById('w2').innerText=win;document.getElementById('m').innerText=mult.toFixed(2)+'x';}
}
function startAuto(){
 let bombs=[2,9,18];
 timer=setInterval(()=>{let rem=[];for(let i=0;i<25;i++){let e=document.getElementById('b'+i); if(e && e.innerText=='?')rem.push(i);} if(rem.length==0){clearInterval(timer);return;} let r=rem[Math.floor(Math.random()*rem.length)]; clickBox(r,bombs);},600);
}
function cashout(){if(win==0){alert('પહેલા 1 Gems ખોલ');return;}clearInterval(timer);balance+=win;upd();alert('WIN ₹'+win);document.getElementById('gamePage').style.display='none';}
</script>
</body>
</html>
