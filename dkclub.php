<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>91 CLUB Clone</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial} body{background:#f5f5f5}
.header{background:#ff3a3a;color:#fff;padding:12px;text-align:center;font-weight:bold;position:sticky;top:0;z-index:10}
.wallet-card{background:linear-gradient(90deg,#ff4d4d,#ff8a00);color:#fff;margin:10px;border-radius:12px;padding:15px;display:flex;justify-content:space-between}
.menu{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;padding:10px} .m{background:#fff;border-radius:10px;padding:12px 5px;text-align:center;box-shadow:0 1px 3px #0002;font-size:12px}
.lotteryTabs{display:flex;gap:8px;padding:10px;overflow:auto} .tab{background:#fff;padding:8px 18px;border-radius:20px;border:1px solid #ddd;white-space:nowrap} .tab.active{background:#ff3a3a;color:#fff}
.gameBox{background:#fff;margin:10px;border-radius:12px;padding:10px}
.timerBar{background:#222;color:#fff;padding:10px;border-radius:8px;display:flex;justify-content:space-between;margin-bottom:10px}
.colors{display:flex;gap:10px;justify-content:center;margin:15px 0} .c{width:70px;height:40px;border-radius:20px;border:none;color:#fff;font-weight:bold}
.c.green{background:#00c851} .c.red{background:#ff3a3a} .c.violet{background:#9b59b6}
.numGrid{display:grid;grid-template-columns:repeat(5,1fr);gap:8px} .num{background:#f0f0f0;padding:12px;border-radius:8px;text-align:center;font-weight:bold}
.bottomNav{position:fixed;bottom:0;left:0;width:100%;background:#fff;display:flex;justify-content:space-around;padding:10px 0;border-top:1px solid #ddd}
#resultPage{position:fixed;top:0;left:0;width:100%;height:100%;background:#fff;display:none;z-index:99;padding:15px;overflow:auto}
.mineGrid{display:grid;grid-template-columns:repeat(5,1fr);gap:6px;margin-top:15px} .box{background:#eee;height:50px;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:20px}
</style>
</head>
<body>
<div class="header">91 CLUB</div>
<div class="wallet-card"><div>Balance<br><b style="font-size:22px">₹<span id="bal">5000.00</span></b></div><div><button onclick="balance+=500;updateBal()" style="background:#fff;border:none;padding:8px 15px;border-radius:20px;color:#ff3a3a;font-weight:bold">Deposit</button></div></div>

<div class="menu">
<div class="m" onclick="openAll('Win Go')">🏆<br>Win Go</div>
<div class="m" onclick="openAll('Mines')">💣<br>Mines</div>
<div class="m" onclick="openAll('Aviator')">🚀<br>Aviator</div>
<div class="m" onclick="openAll('Gems')">💎<br>Gems</div>
<div class="m" onclick="openAll('Dragon')">🐉<br>Dragon</div>
<div class="m" onclick="openAll('Plinko')">🎯<br>Plinko</div>
<div class="m" onclick="openAll('Dice')">🎲<br>Dice</div>
<div class="m" onclick="openAll('Roulette')">🎰<br>Roulette</div>
</div>

<div class="gameBox">
<div class="lotteryTabs"><div class="tab active">Win Go 1M</div><div class="tab">Win Go 3M</div><div class="tab">Win Go 5M</div></div>
<div class="timerBar"><span>Time: <b id="timer">00:30</b></span><span id="period">20250925001</span></div>
<p style="font-size:12px;color:#666">Select Color / Number</p>
<div class="colors">
<button class="c green" onclick="placeBet('GREEN',2)">GREEN</button>
<button class="c violet" onclick="placeBet('VIOLET',4.5)">VIOLET</button>
<button class="c red" onclick="placeBet('RED',2)">RED</button>
</div>
<div class="numGrid">
<div class="num" onclick="placeBet('0',9)">0</div><div class="num" onclick="placeBet('1',9)">1</div><div class="num" onclick="placeBet('2',9)">2</div><div class="num" onclick="placeBet('3',9)">3</div><div class="num" onclick="placeBet('4',9)">4</div>
<div class="num" onclick="placeBet('5',9)">5</div><div class="num" onclick="placeBet('6',9)">6</div><div class="num" onclick="placeBet('7',9)">7</div><div class="num" onclick="placeBet('8',9)">8</div><div class="num" onclick="placeBet('9',9)">9</div>
</div>

<div style="display:flex;gap:8px;margin-top:15px">
<input id="betAmt" type="number" value="100" style="flex:1;padding:12px;border:1px solid #ddd;border-radius:8px">
<button onclick="confirmBet()" style="flex:1;background:#ff3a3a;color:#fff;border:none;border-radius:8px;font-weight:bold">BET ₹<span id="betShow">100</span></button>
</div>
</div>

<div id="resultPage">
<h2 id="rTitle" style="color:#ff3a3a;text-align:center"></h2>
<div id="rContent"></div>
<button onclick="document.getElementById('resultPage').style.display='none'" style="width:100%;margin-top:15px;padding:12px;border:1px solid #ddd;background:#fff;border-radius:25px">Back to Lobby</button>
</div>

<div class="bottomNav"><span>🏠 Home</span><span>💰 Wallet</span><span>👤 My</span></div>

<script>
let balance=5000, sel='', selMult=0;
let betInput=document.getElementById('betAmt'); betInput.oninput=()=>{document.getElementById('betShow').innerText=betInput.value}
function updateBal(){document.getElementById('bal').innerText=balance.toFixed(2)}
function placeBet(type,m){sel=type; selMult=m; alert(type+' Selected - '+m+'x');}
function confirmBet(){
 let amt=parseInt(betInput.value); if(!sel){alert('Color/Number Select karo!');return;} if(amt>balance){alert('Balance nathi!');return;}
 balance-=amt; updateBal();
 let winNum=Math.floor(Math.random()*10); let isWin=false;
 if(sel=='GREEN' && [1,3,7,9].includes(winNum)) isWin=true;
 if(sel=='RED' && [0,2,5,8].includes(winNum)) isWin=true;
 if(sel==winNum) isWin=true;
 if(isWin){let w=Math.floor(amt*selMult); balance+=w; updateBal(); alert('WIN! Number: '+winNum+' | Win: ₹'+w);}else{alert('LOSS! Number: '+winNum);}
}
function openAll(name){
 document.getElementById('resultPage').style.display='block';
 document.getElementById('rTitle').innerText=name;
 let c=document.getElementById('rContent'); c.innerHTML='';
 if(name=='Mines' || name=='Gems'){
   let bet=parseInt(betInput.value); if(bet>balance){alert('Balance nathi');return;} balance-=bet; updateBal();
   c.innerHTML='<p>Bet: ₹'+bet+' | 3 Bomb | Gems kholo</p><div class="mineGrid" id="mg"></div><p>Win: ₹<span id="mw">0</span></p><button onclick="collectMines()" style="width:100%;padding:12px;background:#00c851;color:#fff;border:none;border-radius:10px;margin-top:10px">CASHOUT WIN</button>';
   let mg=document.getElementById('mg'); let bombs=[1,12,20]; window.mWin=0; window.mBet=bet; window.mMult=1;
   for(let i=0;i<25;i++){let d=document.createElement('div'); d.className='box'; d.innerText='?'; d.onclick=function(){if(d.innerText!='?')return; if(bombs.includes(i)){d.innerText='💣';d.style.background='red';alert('Bomb Loss!');document.getElementById('resultPage').style.display='none';}else{d.innerText='💎';d.style.background='#00c851'; mMult+=0.9; mWin=Math.floor(mBet*mMult); document.getElementById('mw').innerText=mWin;}}; mg.appendChild(d);}
 } else { c.innerHTML='<h1 style="font-size:50px;text-align:center;margin:20px">🎮 '+name+'</h1><button onclick="confirmBet()" style="width:100%;padding:15px;background:#ff3a3a;color:#fff;border:none;border-radius:10px">PLAY WITH ₹'+betInput.value+'</button>';}
}
function collectMines(){balance+=window.mWin; updateBal(); alert('Cashout ₹'+window.mWin); document.getElementById('resultPage').style.display='none';}
// timer
let t=30; setInterval(()=>{t--; if(t<0)t=30; document.getElementById('timer').innerText='00:'+(t<10?'0'+t:t);},1000);
</script>
</body>
</html>
