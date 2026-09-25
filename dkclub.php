here<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>91 CLUB - Official</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:sans-serif}
body{background:#f5f5f5}
.header{background:linear-gradient(90deg,#ff0000,#ff6a00);color:#fff;padding:14px;text-align:center;font-weight:900;font-size:20px}
.wallet{background:#fff;margin:12px;border-radius:16px;padding:16px;display:flex;justify-content:space-between;box-shadow:0 2px 10px #0001}
.wallet b{font-size:22px}
.btn-row{display:grid;grid-template-columns:1fr 1fr;gap:10px;padding:0 12px}
.btn-row button{padding:12px;border-radius:30px;border:none;font-weight:800}
.dep{background:linear-gradient(90deg,#ff0000,#ff8a00);color:#fff} .with{background:#fff;border:1px solid #ddd!important}
.menu{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;padding:14px}
.menu div{background:#fff;border-radius:14px;padding:14px 4px;text-align:center;box-shadow:0 2px 8px #0001;font-size:12px;font-weight:700}
.menu span{font-size:26px;display:block;margin-bottom:4px}
.games{padding:10px}
.gcard{background:linear-gradient(135deg,#4a00e0,#8e2de2);color:#fff;border-radius:16px;padding:18px;margin-bottom:12px;display:flex;justify-content:space-between;align-items:center}
.gcard:nth-child(2){background:linear-gradient(135deg,#ff416c,#ff4b2b)}
.gcard:nth-child(3){background:linear-gradient(135deg,#00b09b,#96c93d)}
.gcard button{background:#fff;border:none;padding:8px 16px;border-radius:20px;font-weight:800}
.footer{position:fixed;bottom:0;left:0;right:0;background:#fff;display:flex;justify-content:space-around;padding:10px;border-top:1px solid #eee}
.footer b{display:block;font-size:18px;text-align:center}
</style>
</head>
<body>
<div class="header">91 CLUB</div>
<div class="wallet">
<div>💰 Balance<br><b>₹<span id="bal">10000.00</span></b></div>
<div style="text-align:right">🔥 Bonus<br><b style="color:green">₹500</b></div>
</div>
<div class="btn-row">
<button class="dep" onclick="alert('Deposit Demo')">Deposit</button>
<button class="with" onclick="alert('Withdraw Demo')">Withdraw</button>
</div>
<div class="menu">
<div><span>🎮</span>Lottery</div><div><span>💣</span>Mines</div><div><span>✈️</span>Aviator</div><div><span>🎯</span>Colour</div>
</div>
<div class="games">
<div class="gcard"><div><h3>MINES GAME</h3><p>DKCLUB Special</p></div><button onclick="openMines()">PLAY</button></div>
<div class="gcard"><div><h3>AVIATOR</h3><p>100x Crash</p></div><button>PLAY</button></div>
<div class="gcard"><div><h3>COLOR TRADING</h3><p>Red / Green</p></div><button>PLAY</button></div>
</div>
<div id="minesModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:#0e0e0e;z-index:99;padding:10px;overflow:auto">
<div style="display:flex;justify-content:space-between;color:#fff;padding:10px"><h3>💣 91 CLUB MINES</h3><span onclick="minesModal.style.display='none'" style="font-size:24px">X</span></div>
<div style="background:#1a1a1a;padding:12px;border-radius:12px;color:#fff;margin-bottom:10px">Profit: ₹<span id="profit">0</span> | <span id="mult">1.00x</span></div>
<div id="grid" style="display:grid;grid-template-columns:repeat(5,1fr);gap:8px"></div>
<button id="startBtn" onclick="startMines()" style="width:100%;padding:16px;border-radius:30px;border:none;background:linear-gradient(90deg,#ff0000,#ff8a00);color:#fff;font-weight:900;margin-top:14px">START GAME ₹100</button>
<button id="cashBtn" onclick="cashOut()" style="display:none;width:100%;padding:16px;border-radius:30px;border:none;background:#00c853;color:#fff;font-weight:900;margin-top:14px">CASHOUT ₹<span id="cashAmt">0</span></button>
</div>
<script>
let balance=10000, bet=100, bombs=[], profit=0, mult=1, opened=0, game=false;
function openMines(){document.getElementById('minesModal').style.display='block'; makeGrid();}
function makeGrid(){let g=document.getElementById('grid'); g.innerHTML=''; for(let i=0;i<25;i++){let d=document.createElement('div'); d.style.cssText='height:60px;background:#222;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:24px;color:#fff;border:1px solid #333'; d.id='c'+i; d.innerText='?'; d.onclick=()=>clickCell(i); g.appendChild(d);}}
function startMines(){if(balance<bet){alert('Low Balance');return;} balance-=bet; document.getElementById('bal').innerText=balance.toFixed(2); bombs=[]; while(bombs.length<3){let r=Math.floor(Math.random()*25); if(!bombs.includes(r)) bombs.push(r);} profit=0; mult=1; opened=0; game=true; makeGrid(); startBtn.style.display='none'; cashBtn.style.display='block'; update(); }
function clickCell(i){if(!game) return; let el=document.getElementById('c'+i); if(el.innerText!='?') return; if(bombs.includes(i)){el.innerText='💣'; el.style.background='#ff1744'; game=false; setTimeout(()=>{alert('Bomb!'); startBtn.style.display='block'; cashBtn.style.display='none';},200);} else {el.innerText='💎'; el.style.background='#00c853'; opened++; mult+=0.8; profit=Math.floor(bet*mult); update();}}
function update(){document.getElementById('profit').innerText=profit; document.getElementById('mult').innerText=mult.toFixed(2)+'x'; document.getElementById('cashAmt').innerText=profit;}
function cashOut(){if(profit==0) return; balance+=profit; document.getElementById('bal').innerText=balance.toFixed(2); alert('Win ₹'+profit); game=false; startBtn.style.display='block'; cashBtn.style.display='none';}
</script>
</body>
</html>
