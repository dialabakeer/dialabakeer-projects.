<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Day to Cherish – Invitation Designer</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:wght@300;400;600&family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">

    <!-- html2canvas -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <style>
        *{margin:0;padding:0;box-sizing:border-box}

        :root{
            --gold:#C9A27C;
            --text:#7F6A5F;
        }

        /* BACKGROUND */
        body{
            font-family:"Cormorant Garamond",serif;
            background:linear-gradient(to bottom,#fcefe9,#faeee7,#fdf5f1);
            overflow-x:hidden;
            padding-top:180px; /* space under navbar */
        }

        /* PREVENT INPUT OVERLAY ISSUE */
        input,button {position:relative;z-index:10;}

        /* ======================= */
        /* NAVBAR */
        /* ======================= */
        nav{
            position:fixed;
            top:0;left:0;width:100%;
            background:white;
            padding:25px 0 15px 0;
            text-align:center;
            box-shadow:0 3px 14px rgba(0,0,0,0.08);
            z-index:100;
        }
        .nav-logo{
            font-family:"Great Vibes",cursive;
            font-size:46px;
            color:#C7A292;
            margin-bottom:-5px;
        }
        .nav-sub{
            font-size:12px;
            letter-spacing:4px;
            color:#B89D8C;
            margin-bottom:15px;
        }
        .nav-links{
            display:flex;
            justify-content:center;
            gap:60px;
        }
        .nav-links a{
            text-decoration:none;
            font-family:"Playfair Display",serif;
            font-size:16px;
            color:#7F6A5F;
            padding:5px 15px;
            border-radius:20px;
            transition:.3s;
        }
        .nav-links a:hover{
            background:#F1DED4;
        }

        /* ======================= */
        /* PAGE LAYOUT */
        /* ======================= */
        .page{
            display:flex;
            justify-content:center;
        }
        .designer{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:90px; /* spacing between card & panel */
            width:100%;
            max-width:1350px;
            align-items:flex-start;
        }

        @media(max-width:1000px){
            .designer{grid-template-columns:1fr;}
        }

        /* ======================= */
        /* CARD LEFT SIDE */
        /* ======================= */
        .card-box{
            background:white;
            padding:35px;
            border-radius:32px;
            box-shadow:0 22px 55px rgba(0,0,0,0.15);
            margin-left:40px;
        }

        .card-inner-bg{
            background:linear-gradient(to bottom,#ffe6ef,#fde8eb,#fff7f8);
            padding:32px;
            border-radius:24px;
            border:1px solid #ead7d0;
        }

        .invite-card{
            background:white;
            padding:45px 35px;
            border-radius:22px;
            text-align:center;
            box-shadow:0 12px 35px rgba(0,0,0,0.12);
            position:relative;
            transition:transform .35s ease;
        }
        .invite-card::before{
            content:"";
            position:absolute;
            inset:18px;
            border-radius:18px;
            border:1px solid #e5cdbf;
        }

        /* CARD TEXT */
        .invite-icon{font-size:30px;color:#C9A27C;margin-bottom:10px;}
        .invite-title{
            font-family:"Playfair Display",serif;
            font-size:14px;letter-spacing:0.25em;
            margin-bottom:10px;color:#7A665A;
        }
        .invite-sub{font-size:16px;color:#8e776c;margin-bottom:22px;}
        .invite-names{
            font-family:"Great Vibes",cursive;
            font-size:50px;color:#7F5B4E;margin-bottom:26px;
        }
        .invite-details p{
            font-size:16px;margin:6px 0;color:#6F5C51;
        }

        /* DOWNLOAD BUTTON */
        .download-btn{
            width:100%;margin-top:25px;
            padding:14px;border:none;
            border-radius:100px;
            background:#C9A27C;color:white;
            font-family:"Playfair Display",serif;
            font-size:17px;
            cursor:pointer;
            transition:.3s;
        }
        .download-btn:hover{background:#b88c66;}

        /* ======================= */
        /* RIGHT PANEL */
        /* ======================= */
        .panel{
            background:white;
            padding:40px;
            border-radius:32px;
            margin-right:40px;
            box-shadow:0 22px 55px rgba(0,0,0,0.12);
            transition:transform .35s ease;
        }

        .panel h2{
            font-family:"Playfair Display",serif;
            font-size:28px;margin-bottom:8px;
        }
        .panel p{
            font-size:15px;color:#8a756b;margin-bottom:20px;
        }

        label{
            display:block;margin-top:18px;
            font-size:13px;text-transform:uppercase;
            letter-spacing:0.12em;color:#7A665A;
        }
        input{
            width:100%;padding:12px;
            margin-top:6px;
            background:#FBF4EF;
            border:1px solid #E4D5CA;
            border-radius:12px;
            font-size:15px;
        }
        input:focus{
            outline:none;border-color:#C9A27C;
        }

        /* ======================= */
        /* TEMPLATES */
        /* ======================= */
        .templates{
            display:flex;gap:20px;margin-top:14px;
        }
        .template{
            flex:1;background:white;
            border-radius:18px;
            border:2px solid transparent;
            cursor:pointer;transition:.3s;
        }
        .template.selected{border-color:#C9A27C;}
        .temp-preview{height:85px;}
        .floral-bg{
            background:linear-gradient(to bottom,#ffe9f3,#fdebf0,#fff8fb);
        }
        .cream-bg{
            background:linear-gradient(to bottom,#f3e3cf,#f7ebdb,#fcf7ee);
        }
        .temp-name{
            text-align:center;padding:8px 0;
            font-family:"Playfair Display",serif;
            color:#7F6A5F;
        }

        /* ======================= */
        /* ADDED TRANSITIONS */
        /* ======================= */

        /* Slide panel */
        .panel.animate {
            transform: translateX(22px);
        }

        /* Card pulse */
        .invite-card.animate {
            transform: scale(1.015);
        }
        /* Floating hearts background */
        .hearts-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1; /* behind everything */
            pointer-events: none;
        }

        .heart {
            position: absolute;
            color: rgba(255, 182, 193, 0.55); /* soft pink */
            font-size: 22px;
            animation: floatUp 8s linear infinite;
            opacity: 0;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(50px) scale(0.7);
                opacity: 0;
            }
            20% {
                opacity: 1;
            }
            100% {
                transform: translateY(-120vh) scale(1.1);
                opacity: 0;
            }
        }

    </style>
</head>

<body>
<div class="hearts-container" id="hearts"></div>

<!-- NAVBAR -->
<nav>
    <div class="nav-logo">A Day to Cherish</div>
    <div class="nav-sub">WEDDING INVITATION DESIGNER</div>

    <div class="nav-links">
        <a>Home</a>
        <a>Shop</a>
        <a>Services</a>
        <a>DJs</a>
        <a>Decor</a>
        <a>Contact</a>
    </div>
</nav>

<main class="page">
    <section class="designer">

        <!-- LEFT SIDE -->
        <div>
            <div class="card-box">
                <div class="card-inner-bg">

                    <div id="inviteCard" class="invite-card">

                        <div class="invite-icon">♡</div>

                        <div class="invite-title">TOGETHER WITH THEIR FAMILIES</div>

                        <div class="invite-sub">
                            Request the pleasure of your company at the celebration of their marriage
                        </div>

                        <div class="invite-names">
                            <span id="brideName">Emma</span> &
                            <span id="groomName">Liam</span>
                        </div>

                        <div class="invite-details">
                            <p id="inviteDate">Saturday, October 12th, 2025</p>
                            <p id="inviteTime">at 4:00 in the afternoon</p>
                            <p id="inviteVenue">The Grand Manor, London</p>
                        </div>

                    </div>

                </div>
            </div>

            <button class="download-btn" onclick="saveInvitation()">
                ⬇ Download Invitation (PNG)
            </button>
        </div>

        <!-- RIGHT SIDE PANEL -->
        <div class="panel">
            <h2>Design your card</h2>
            <p>Fill the details, then choose a romantic style.</p>

            <label>Bride's Name</label>
            <input id="brideInput" oninput="updateText()">

            <label>Groom's Name</label>
            <input id="groomInput" oninput="updateText()">

            <label>Date</label>
            <input id="dateInput" oninput="updateText()">

            <label>Time</label>
            <input id="timeInput" oninput="updateText()">

            <label>Venue</label>
            <input id="venueInput" oninput="updateText()">

            <label style="margin-top:18px;">Templates</label>

            <div class="templates">
                <div class="template selected" id="floral" onclick="setTemplate('floral')">
                    <div class="temp-preview floral-bg"></div>
                    <div class="temp-name">Romantic Floral</div>
                </div>

                <div class="template" id="cream" onclick="setTemplate('cream')">
                    <div class="temp-preview cream-bg"></div>
                    <div class="temp-name">Elegant Cream & Gold</div>
                </div>
            </div>

        </div>

    </section>
</main>

<script>
    /* UPDATE TEXT LIVE */
    function updateText(){
        brideName.textContent = brideInput.value || "Emma";
        groomName.textContent = groomInput.value || "Liam";
        inviteDate.textContent = dateInput.value || "Saturday, October 12th, 2025";
        inviteTime.textContent = timeInput.value || "at 4:00 in the afternoon";
        inviteVenue.textContent = venueInput.value || "The Grand Manor, London";
    }

    /* PANEL + CARD ANIMATION */
    function triggerTransition() {
        const panel = document.querySelector(".panel");
        const card = document.getElementById("inviteCard");

        panel.classList.add("animate");
        card.classList.add("animate");

        setTimeout(() => {
            panel.classList.remove("animate");
            card.classList.remove("animate");
        }, 350);
    }

    /* TEMPLATE CHANGE */
    function setTemplate(t){
        floral.classList.remove("selected");
        cream.classList.remove("selected");

        if(t === "floral"){
            floral.classList.add("selected");
            document.querySelector(".card-inner-bg").style.background =
                "linear-gradient(to bottom,#ffe9f3,#fdebf0,#fff8fb)";
        } else {
            cream.classList.add("selected");
            document.querySelector(".card-inner-bg").style.background =
                "linear-gradient(to bottom,#f3e3cf,#f7ebdb,#fcf7ee)";
        }

        triggerTransition();
    }

    /* DOWNLOAD BUTTON */
    function downloadCard(){
        html2canvas(document.getElementById("inviteCard"),{scale:3}).then(canvas=>{
            let link=document.createElement("a");
            link.download="invitation.png";
            link.href=canvas.toDataURL("image/png");
            link.click();
        });
    }

    function createHeart() {
        const container = document.getElementById("hearts");
        const heart = document.createElement("div");

        heart.classList.add("heart");
        heart.innerHTML = "❤";

        // Random horizontal position
        heart.style.left = Math.random() * 100 + "vw";

        // Random size
        heart.style.fontSize = (16 + Math.random() * 14) + "px";

        // Random animation duration
        heart.style.animationDuration = (6 + Math.random() * 5) + "s";

        container.appendChild(heart);

        // Remove when animation ends
        setTimeout(() => {
            heart.remove();
        }, 11000);
    }

    // Create hearts repeatedly
    setInterval(createHeart, 600);
    function saveInvitation() {
        const bride = document.getElementById("brideInput").value;
        const groom = document.getElementById("groomInput").value;
        const date  = document.getElementById("dateInput").value;
        const time  = document.getElementById("timeInput").value;
        const venue = document.getElementById("venueInput").value;

        fetch("save_invitation.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body:
                "bride=" + encodeURIComponent(bride) +
                "&groom=" + encodeURIComponent(groom) +
                "&date="  + encodeURIComponent(date) +
                "&time="  + encodeURIComponent(time) +
                "&venue=" + encodeURIComponent(venue)
        })
            .then(res => res.text())
            .then(data => {
                if (data === "success") {
                    alert("✨ Invitation saved successfully");
                }
            });
    }

</script>

</body>
</html>
