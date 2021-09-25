@extends('layouts.app')

<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;0,200;0,300;0,400;1,100;1,400&display=swap');

* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
	list-style: none;
}

body {
	/*background-color: var(--black);*/
	color: var(--text);
	overflow-x: hidden;
}

.text-center {
    text-align: center;
}

.text-left {
    text-align: left;
}

.text-vue {
    color: var(--vue);
}

.text-purple {
    color: var(--purple);
}

.text-red {
    color: var(--red);
}

.text-text {
    color: var(--text);
}


.red {
    background: var(--red);
    border-color: var(--red);
}

.green {
    background: var(--vue);
    border-color: var(--vue);
}

.yellow {
    background: var(--yellow);
    border-color: var(--yellow);
}

.blink {
    animation: blinker 1s infinite;
}

@keyframes blinker {
    50% {
        opacity: 0;
    }
}

.terminal-title,
.terminal .body,
.terminal .body span,
.terminal .body a {
    font-family: 'JetBrains Mono', monospace !important;
}

.terminal {
    border-radius: 5px 5px 0 0;
    position: relative;
    width: 1024px;
    transition: 0.5s;
    margin-top: 25px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.98);
    margin: 0 auto;
    margin-top: 30px;
    border-radius: 5px;
}

.terminal .body {
    background: var(--dark-gray);
    color: var(--purple);
    padding: 8px;
    height: 350px;
    font-size: 14px;
    border-radius: 0 0 5px 5px;
    word-break:break-all;
    white-space: pre-wrap
}

.terminal .terminal-bar {
    background: var(--black);
    color: var(--text);
    padding: 5px;
    border-radius: 5px 5px 0 0;
}

.terminal .btns {
    position: absolute;
    top: 7px;
    right: 7px;
}

.terminal .circle {
    width: 14px;
    height: 14px;
    display: inline-block;
    border-radius: 50%;
    margin-left: 7px;
    border-width: 1px;
    border-style: solid;
}

.terminal-title {
    text-align: center;
}

</style>

@section('content')
    <div class="terminal" id="terminal">
        <div class="terminal-bar">
            <div class="btns">
                <span class="circle yellow"></span>
                <span class="circle green"></span>
                <span class="circle red"></span>
            </div>
            <div class="terminal-title">{{$user->username . '@' . $user->username}}: ~</div>
        </div>
        <pre class="body" id="aboutText">{{$user->username . '@' . $user->username}}:~$ <span class="text-text">sudo --help aboutme<br></pre>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button class="btn btn-danger" id="export"> Exportar para PNG</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.3.2/dist/html2canvas.min.js"></script>
    <script>
        const user = '{{$user->username}}'
        const about = '{{$user->about}}'
        const bgcolor = '{{$user->bgcolor}}'

        document.addEventListener("DOMContentLoaded", (event) => {
            document.getElementById('export').setAttribute('disabled', true);

            document.body.style.backgroundColor = bgcolor;
            document.getElementById('exportBody').style.backgroundColor = bgcolor;
            
            const userRoot = `${user}@${user}:~$ <span class="text-text">sudo --help aboutme<br>`;
            const userRootBlink = `${user}@${user}:~$ <span class="blink">_</span>`;
            const aboutMe = `${about}<br>All packages are up to date.</span><br>`;

            setTimeout(() => {
                document.getElementById('aboutText').innerHTML = userRoot + aboutMe + userRootBlink;
                document.getElementById('export').removeAttribute('disabled');
            }, 2000);
        })

        document.getElementById("export").addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById("export").style.display = 'none';

            html2canvas(document.getElementById("exportBody"))
            .then(canvas => {
                window.open(canvas.toDataURL());
            });

            setTimeout(() => document.getElementById("export").style.display = 'inline-block', 1000);
        });
        
    </script>
@endsection
