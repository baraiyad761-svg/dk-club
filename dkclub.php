here<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>91 CLUB BLUE</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial}
body{background:#eef2ff}
.top{background:#0b3d91;color:#fff;padding:16px;text-align:center;font-weight:900;font-size:19px;letter-spacing:1px}
.wallet{margin:12px;background:linear-gradient(100deg,#0b3d91,#00b4ff);border-radius:20px;padding:18px;color:#fff;display:flex;justify-content:space-between;align-items:center}
.tabs{background:#fff;display:flex;gap:8px;padding:10px;overflow:auto}
.tab{padding:8px 18px;border-radius:20px;border:1px solid #ddd;background:#fff;font-size:13px;white-space:nowrap}
.tab.active{background:#0b3d91;color:#fff}
.betBox{background:#fff;margin:10px;border-radius:14px;padding:12px}
.betRow{display:flex;gap:6px;margin-top:8px} .betRow input{flex:1;padding:13px;border:1px solid #ddd;border-radius:10px} .betRow button{padding:10px 14px;border:none;background:#eef2ff;border-radius:8px;color:#0b3d91;font-weight:bold}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;padding:10px}
.card{background:#fff;border-radius:16px;padding:18px 5px;text-align:center;box-shadow:0 3px 10px #0001;font-weight:bold;font-size:12px}
.card span{font-size:28px;display:block}
#game{position:fixed;inset:0;background:#0a1931;display:none;z-index:99;padding:15px;color:#fff;text-align:center;overflow:auto}
.g5{display:grid;grid-template-columns:repeat(5,1fr);gap:8px;margin:18px 0}
.bx{background:#162a52;height:56px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:24px;border:1px solid #204080}
.btn{width:100%;padding:15px;border-radius:30px;border:none;font-weight:800;margin-top:10px}
.green{background:#00c851;color:#fff} .blue{background:#0b3d91;color:#fff}
</style>
</head>
<body>
<div class="top">91 CLUB • BLUE EDITION</div>
<div class="wallet"><div><small>Wallet balance</small><br><b style="font-size:26px">₹<span id="bal">5000.00</span></b><br><small>UID 8233336 | BLUE VIP</small></div><div><button onclick="balance+=500;upd()" style="background:#fff;border:none;padding:10px 22px;border-radius:22px;color:#0b3d91;font-weight:800">Deposit</button></div></div>
<div class="tabs"><div class="tab active">For You</div><div class="tab">Lobby</div><div class="tab">Slots</div><div class="tab">Original</div></div>
<div class="betBox"><div style="font-size:13px;color:#666">Bet Amount - ગમે એટલી નાખો</div><div class="betRow"><input id="amt" type="number" value="100"><button onclick="amt.value=100">100</button><button onclick="amt.value=500">500</button><button onclick="amt.value=1000">1000</button></div></div>
<div class="grid">
<div class="card" onclick="openG('MINES')"><span>💣</span>MINES</div>
<div class="card" onclick="openG('GEMS CLASH')"><span>💎</span>GEMS CLASH</div>
<div class="card" onclick="openG('AVIATOR')"><span>🚀</span>AVIATOR</div>
<div class="card" onclick="openG('CHICKEN ROAD')"><span>🐔</span>CHICKEN ROAD</div>
<div class="card" onclick="openG('DRAGON')"><span>🐉</span>DRAGON</div>
<div class="card" onclick="openG('DICE')"><span>🎲</span>DICE</div>
<div class="card" onclick="openG('PLINKO')"><span>🎯</span>PLINKO</div>
<div class="card" onclick="openG('ROULETTE')"><span>🎰</span>ROULETTE</div>
<div class="card" onclick="openG('CRICKET')"><span>🏏</span>CRICKET</div>
</div>
<div id="game"><h2 id="gt" style="color:#00e5ff">GAME</h2><p>Bet ₹<span id="sb">0</span> | Win ₹<span id="wb">0</span> | <span id="mt">1.00x</span></p><div id="gc"></div><button class="btn green" onclick="cash()">CASHOUT ₹<span id="wb2">0</span></button><button class="btn blue" onclick="cls()">CLOSE</button></div>
<script>
let balance=5000,bet=0,win=0,mult=1,timer=null;
function upd(){bal.innerText=balance.toFixed(2);}
function openG(n){bet=parseInt(amt.value);if(bet>balance){alert('Balance નથી');return;}balance-=bet;upd();win=0;mult=1;gt.innerText=n;sb.innerText=bet;wb.innerText=0;wb2.innerText=0;mt.innerText='1.00x';game.style.display='block';let bombs=[2,9,18];gc.innerHTML='';let g=document.createElement('div');g.className='g5';for(let i=0;i<25;i++){let b=document.createElement('div');b.className='bx';b.id='b'+i;b.innerText='?';b.onclick=()=>clk(i,bombs);g.appendChild(b);}gc.appendChild(g);let ab=document.createElement('button');ab.className='btn blue';ab.innerText='AUTO GEMS START';ab.onclick=()=>auto(bombs);gc.appendChild(ab);}
function clk(i,bombs){let el=document.getElementById('b'+i);if(el.innerText!='?')return;if(bombs.includes(i)){el.innerText='💣';el.style.background='#ff0040';clearInterval(timer);setTimeout(()=>{alert('Bomb Loss ₹'+bet);cls();},300);}else{el.innerText='💎';el.style.background='#00c851';mult+=0.9;win=Math.floor(bet*mult);wb.innerText=win;wb2.innerText=win;mt.innerText=mult.toFixed(2)+'x';}}
function auto(bombs){clearInterval(timer);timer=setInterval(()=>{let r=[];for(let i=0;i<25;i++){let e=document.getElementById('b'+i);if(e.innerText=='?')r.push(i);}if(r.length==0){clearInterval(timer);return;}clk(r[Math.floor(Math.random()*r.length)],bombs);},600);}
function cash(){if(win==0){alert('એક Gems ખોલ');return;}clearInterval(timer);balance+=win;upd();alert('WIN ₹'+win);cls();}
function cls(){clearInterval(timer);game.style.display='none';}
</script>
</body>
</html>
