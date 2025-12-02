<div id="studentSidebar" class="sidebar-inner">

    <h4 class="sidebar-title">
        <i class="fas fa-list-ul"></i> Sections
    </h4>

    @php $sid = 1; @endphp

    @foreach($questions as $sectionName => $qs)
        <div class="section-btn" onclick="showSection({{ $sid }})" id="btn{{ $sid }}">
            {{ $sectionName }}
        </div>
        @php $sid++; @endphp
    @endforeach

</div>

<style>
/* SIDEBAR INNER */
.sidebar-inner {
    padding: 25px;
}

/* TITLE */
.sidebar-title {
    color:#2c3e50;
    margin-bottom:25px;
    font-size:20px;
    font-weight:700;
}

/* SECTION BUTTONS */
.section-btn {
    background:#fff;
    padding:15px;
    border-radius:8px;
    border:1px solid #ccc;
    margin-bottom:12px;
    cursor:pointer;
    transition:0.2s ease;
    font-size:16px;
    font-weight:500;
}

.section-btn:hover { background:#eaf0ff; border-color:#4a6cf7; }
.active-btn { background:#4a6cf7 !important; color:white !important; border-color:#4a6cf7 !important; }

/* DESKTOP SIDEBAR */
#studentSidebar {
    width:280px;
    background:#f5f5f5;
    border-right:1px solid #ddd;
    min-height:100vh;
    position:sticky;
    top:0;
    overflow-y:auto;
    overflow-x:hidden;
    transition:left 0.3s ease;
    z-index:999;
}

/* MOBILE OFF-CANVAS */
@media(max-width:768px){
    #studentSidebar {
        width:260px;
        position:fixed;
        top:0;
        left:-270px;
        height:100vh;
        overflow-y:auto;
        overflow-x:hidden;
    }

    #studentSidebar.sidebar-show {
        left:0;
    }

    .sidebar-title { font-size:18px; }
    .section-btn { font-size:16px; padding:14px; }
}
</style>
