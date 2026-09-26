here<!DOCTYPE html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>91 CLUB - 1 to 9 Steps</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial}
body{background:#f2f4f8;padding-bottom:80px}
.page{display:none}.page.active{display:block}
.header{background:linear-gradient(90deg,#ff3a3a,#ff7a7a);padding:15px;color:#fff;text-align:center}
.tabs{display:flex;background:#fff;padding:8px;gap:6px;overflow:auto;white-space:nowrap;border-bottom:1px solid #eee;position:sticky;top:0;z-index:20}
.tabs span{padding:8px 10px;border-radius:10px;font-size:11px;background:#f5f5f5;color:#666;cursor:pointer}
.tabs .active{background:#fff;box-shadow:0 2px 8px #0002;color:#ff3a3a;font-weight:bold;border-bottom:2px solid #ff3a3a}
.grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;padding:8px}
.tile{border-radius:12px;overflow:hidden;background:#fff;height:135px;position:relative;box-shadow:0 2px 6px #0001;cursor:pointer}
.tile img{width:100%;height:100%;object-fit:cover}
.lb{position:absolute;bottom:0;left:0;right:0;background:linear-gradient(transparent,#000c);color:#fff;padding:4px;font-size:8px;font-weight:bold;text-align:center}
.bottom{position:fixed;bottom:0;left:0;right:0;background:#fff;display:flex;justify-content:space-around;padding:7px 0;border-top:1px solid #ddd;z-index:100}
.bottom div{text-align:center;font-size:9px;color:#888;cursor:pointer}
.bottom .act{color:#ff3a3a}
.center{width:50px;height:50px;background:linear-gradient(180deg,#ffb86c,#ff3a3a);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:bold;margin-top:-16px;border:3px solid #fff}
.ib{background:#fff;border-radius:10px;padding:12px;display:flex;align-items:center;margin-top:8px}
.ib input{border:none;outline:none;width:100%}
.btn-main{width:100%;padding:13px;border-radius:25px;border:none;font-weight:bold;margin-top:15px;cursor:pointer}
.modal{position:fixed;top:0;left:0;width:100%;height:100%;background:#000d;display:none;z-index:9999;align-items:center;justify-content:center;padding:15px}
.modal-box{background:#fff;border-radius:18px;padding:18px;width:92%;max-width:330px;text-align:center}
.play-btn{background:linear-gradient(90deg,#ff3a3a,#ff6a6a);color:#fff;border:none;padding:12px;border-radius:25px;font-weight:bold;margin-top:10px;width:100%}
</style></head><body>

<div id="page-login" class="page active">
<div class="header"><div>91 CLUB</div><h3>Log in</h3></div>
<div style="padding:15px"><div class="ib"><input placeholder="Phone number"></div>
<button class="btn-main" style="background:#d0d0d8" onclick="goLobby()">Log in</button>
<button class="btn-main" style="background:#fff;border:1.5px solid #ff3a3a;color:#ff3a3a" onclick="showPage('page-register')">Register</button>
<p style="text-align:center;margin-top:10px;font-size:11px">Step 1 - Koy bhi dbaviye khulvi joye</p></div>
</div>

<div id="page-lobby" class="page">
<div class="tabs"><span class="active">🏠 Lobby</span><span onclick="showPage('page-mini')">🎮 Mini</span><span onclick="showPage('page-slots')">⑦ Slots</span><span onclick="showPage('page-card')">🃏 Card</span><span onclick="showPage('page-fishing')">🎣 Fishing</span><span onclick="showPage('page-casino')">🎰 Casino</span><span onclick="showPage('page-sports')">⚽ Sports</span></div>
<div style="margin:8px;border-radius:12px;height:110px;background:linear-gradient(90deg,#8b0000,#ff0000);display:flex;align-items:center;justify-content:center;color:gold;font-weight:900">REAL TIME REBATE 0.5% & 1%</div>
<div style="display:flex;justify-content:space-between;padding:8px;background:#fff"><b>₹0.84 Wallet</b><div><button onclick="openGame('Withdraw')" style="background:orange;color:#fff;border:none;padding:5px 12px;border-radius:10px">Withdraw</button> <button onclick="openGame('Deposit')" style="background:red;color:#fff;border:none;padding:5px 12px;border-radius:10px">Deposit</button></div></div>
<div style="padding:8px"><b>⭐ Recommended</b><div class="grid"><div class="tile" onclick="openGame('AVIATOR')"><div style="height:100%;background:#000;color:#f06;display:flex;align-items:center;justify-content:center">AVIATOR</div></div><div class="tile" onclick="showPage('page-slots')"><div style="height:100%;background:gold;display:flex;align-items:center;justify-content:center">GEMS</div></div><div class="tile" onclick="openGame('WIN GO')"><div style="height:100%;background:#5aa0ff;display:flex;align-items:center;justify-content:center;color:#fff">WIN GO</div></div></div></div>
<div class="bottom"><div class="act">🏠<br>Home</div><div onclick="showPage('page-promotion')">💰<br>Promotion</div><div><div class="center">GO</div></div></div>
</div>

<div id="page-mini" class="page"><div class="tabs"><span onclick="showPage('page-lobby')">🏠 Lobby</span><span class="active">🎮 Mini game</span><span onclick="showPage('page-slots')">⑦ Slots</span><span onclick="showPage('page-card')">🃏 Card</span><span onclick="showPage('page-fishing')">🎣 Fishing</span><span onclick="showPage('page-casino')">🎰 Casino</span><span onclick="showPage('page-sports')">⚽ Sports</span></div>
<div class="grid">
<!-- 48 Mini Games - mini_00.jpg to mini_46.jpg -->
<div class="tile" onclick="openGame('Aviator')"><img src="mini_00.jpg"><div class="lb">Aviator</div></div>
<div class="tile" onclick="openGame('Aviator +500%')"><img src="mini_01.jpg"><div class="lb">Aviator +500%</div></div>
<!-- બધી 48 Games આવી રીતે -->
</div></div>

<div id="page-slots" class="page"><div class="tabs"><span onclick="showPage('page-lobby')">🏠 Lobby</span><span onclick="showPage('page-mini')">🎮 Mini</span><span class="active">⑦ Slots</span><span onclick="showPage('page-card')">🃏 Card</span><span onclick="showPage('page-fishing')">🎣 Fishing</span><span onclick="showPage('page-casino')">🎰 Casino</span><span onclick="showPage('page-sports')">⚽ Sports</span></div>
<div class="grid">
<!-- 54 Slots Games - slots_00.jpg to slots_53.jpg -->
<div class="tile" onclick="openGame('SUPER ACE')"><img src="slots_00.jpg"><div class="lb">SUPER ACE</div></div>
</div></div>

<div id="page-card" class="page"><div class="tabs"><span class="active">🃏 Card</span></div><div class="grid">
<div class="tile" onclick="openGame('7UP 7DOWN')"><img src="card_00.jpg"><div class="lb">7UP 7DOWN</div></div>
<!-- 9 Card Games -->
</div></div>

<div id="page-fishing" class="page"><div class="grid">
<div class="tile" onclick="openGame('JACKPOT FISHING')"><img src="fishing_00.jpg"><div class="lb">JACKPOT FISHING</div></div>
<!-- 15 Fishing -->
</div></div>

<div id="page-casino" class="page"><div class="grid">
<div class="tile" onclick="openGame('Evo')"><img src="casino_00.jpg"><div class="lb">Evo</div></div>
<!-- 4 Casino -->
</div></div>

<div id="page-sports" class="page"><div class="grid">
<div class="tile" onclick="openGame('ARBET')"><img src="sports_00.jpg"><div class="lb">ARBET</div></div>
<!-- 3 Sports -->
</div></div>

<div id="page-promotion" class="page">
<div style="background:linear-gradient(180deg,#ff7a7a,#ff3a3a);padding:18px;color:#fff;text-align:center">
<div>91 CLUB</div><div style="display:flex;justify-content:space-around;margin-top:15px"><div>Today's bonus<br>₹0.00</div><div>Total bonus<br>₹1.37</div></div>
<button style="background:#fff;color:#ff3a3a;border:none;padding:10px 28px;border-radius:20px;font-weight:bold;margin-top:15px" onclick="showPage('page-bonus-details')">Bonus details</button>
</div>
<div style="background:#fff;padding:12px;display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:12px;text-align:center">
<div onclick="openGame('Invitation bonus')">👤<br>Invitation bonus</div>
<div onclick="openGame('Betting rebate')">💰<br>Betting rebate</div>
<div onclick="openGame('Super Jackpot')">🏆<br>Super Jackpot</div>
<div onclick="openGame('First gift')">🎁<br>First gift</div>
</div>
</div>

<div id="page-bonus-details" class="page">
<div style="background:#fff;padding:10px;display:flex;align-items:center;gap:8px"><span onclick="showPage('page-promotion')"><</span><div style="flex:1;text-align:center;font-weight:bold">Bonus details</div></div>
<div style="background:#fff;padding:8px;display:flex;gap:8px"><select style="flex:1;padding:8px"><option>All</option></select><select style="flex:1;padding:8px"><option>Choose a date</option></select></div>
<div style="background:#fff;display:flex;gap:15px;padding:8px 12px"><span style="color:#ff3a3a;border-bottom:2px solid #ff3a3a">To be collected</span><span style="color:#888">Received</span><span style="color:#888">Expired</span></div>
<div style="display:flex;flex-direction:column;align-items:center;padding:70px 15px"><div style="font-size:60px">📄</div><div style="color:#999">No data</div><div style="margin-top:18px;background:#ff3a3a;color:#fff;padding:10px 24px;border-radius:20px;font-weight:bold">A peg kulega ✅ Step 9</div></div>
</div>

<div id="gameModal" class="modal"><div class="modal-box"><h3 id="gTitle">Game</h3><div style="font-size:50px;margin:12px">🎰</div><p style="color:#666;font-size:12px">kanpur91.com</p><button class="play-btn" onclick="startPlay()">PLAY NOW - A peg kulega</button><button style="margin-top:8px;background:#fff;border:1px solid #ddd;padding:7px 18px;border-radius:18px;width:100%" onclick="closeModal()">Close</button></div></div>

<script>
function showPage(id){document.querySelectorAll('.page').forEach(p=>p.classList.remove('active'));document.getElementById(id).classList.add('active');window.scrollTo(0,0)}
function goLobby(){showPage('page-lobby')}
function openGame(name){document.getElementById('gTitle').innerText=name;document.getElementById('gameModal').style.display='flex'}
function closeModal(){document.getElementById('gameModal').style.display='none'}
function startPlay(){closeModal();showPage('page-bonus-details')}
</script>
</body></html>
