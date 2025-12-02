<header class="header-bar">

    {{-- LEFT SIDE: MENU BUTTON (MOBILE) + LOGO --}}
    <div class="header-left">
        {{-- MOBILE MENU BUTTON --}}
        <button onclick="openSidebar()" class="mobile-menu-btn">
            <i class="fas fa-bars"></i>
        </button>

        <div class="header-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <h2 class="header-title">Career & Courses Portal</h2>
    </div>

    {{-- RIGHT SIDE: TIMER + SUBMIT --}}
    <div class="header-right">
        <div class="timer-box" id="timer">30:00</div>

        <button form="testForm" class="submit-btn">
            Submit Test
        </button>
    </div>

</header>

<style>
.header-bar {
    background:#2c3e50;
    padding:15px 20px;
    color:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    position:sticky;
    top:0;
    z-index:1000;
}

.header-left {
    display:flex;
    align-items:center;
    gap:15px;
}

.header-icon {
    background:#3498db;
    width:45px; height:45px;
    border-radius:8px;
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
    font-size:20px;
}

.header-title { font-size:20px; margin:0; }

.header-right { display:flex; align-items:center; gap:20px; }

.timer-box {
    background:#e74c3c;
    padding:8px 14px;
    border-radius:5px;
    font-weight:bold;
    font-size:18px;
}

.submit-btn {
    background:#27ae60;
    padding:10px 20px;
    border:none;
    border-radius:6px;
    color:white;
    cursor:pointer;
    font-size:16px;
}

/* MOBILE MENU BUTTON */
.mobile-menu-btn {
    display:none;
    background:#3498db;
    padding:8px 12px;
    border:none;
    border-radius:6px;
    color:white;
    font-size:20px;
    cursor:pointer;
}

@media(max-width:768px) {
    .mobile-menu-btn { display:block; }
    .header-title { font-size:18px; }
    .header-icon { width:40px; height:40px; }
}
</style>

<script>
function openSidebar() {
    const sidebar = document.getElementById('studentSidebar');
    sidebar.classList.toggle('sidebar-show');
}
</script>
