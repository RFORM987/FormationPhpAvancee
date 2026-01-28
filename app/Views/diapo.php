<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Diaporama JS</title>
		<style>    
            body {
                background-color: #2e1d01;
                margin:0;
                padding:0;
            }

            .diaporama {
                height:100vh;
                position:relative;
            }

            .diaporama	img {
                position: absolute; top:0; left:0;
                width:100%;height:100%;
                object-fit : cover;
                opacity: 0;
                transition:opacity 2s;
            }

            .diaporama img.visible {
                opacity:1;
            }

            .nav_button{
                position:absolute;
                background-color:rgba(0,0,0,0.5);
                display:flex;
            }

            .nav_button div{
                display:flex;
                flex-direction:column;
            }

            .nav_button img{
                position: relative; top:0; left:0;
                width:50px;height:50px;
                object-fit : cover;
                opacity: 1;
                transition:none;
            }

            .diaporama button{
                margin:5px;
                background-color:grey;
            }

            .diaporama div.current{
                background-color:green;
            }

            .diaporama div.current button{
                background-color:darkgreen;
            }
        </style>
	</head>
	<body>
		
		<div class="diaporama" >
			<img src="https://picsum.photos/1800/1000?random=1">
			<img src="https://picsum.photos/1800/1000?random=2">
			<img src="https://picsum.photos/1800/1000?random=3">
			<img src="https://picsum.photos/1800/1000?random=4">
			<img src="https://picsum.photos/1800/1000?random=5">
			<img src="https://picsum.photos/1800/1000?random=6">
			<img src="https://picsum.photos/1800/1000?random=7">
			<img src="https://picsum.photos/1800/1000?random=8">
			<img src="https://picsum.photos/1800/1000?random=9">
			<img src="https://picsum.photos/1800/1000?random=10">
		</div>
		
		<div class="diaporama" >
			<img src="https://picsum.photos/1800/1000?random=11">
			<img src="https://picsum.photos/1800/1000?random=12">
			<img src="https://picsum.photos/1800/1000?random=13">
			<img src="https://picsum.photos/1800/1000?random=14">
		</div>

		<div class="diaporama" >
			<img src="https://picsum.photos/1800/1000?random=15">
			<img src="https://picsum.photos/1800/1000?random=16">
			<img src="https://picsum.photos/1800/1000?random=17">
			<img src="https://picsum.photos/1800/1000?random=18">
			<img src="https://picsum.photos/1800/1000?random=19">
		</div>
		
		<script>
            function diapmove(diapos,buttons,action){
                for (let i = 0; i< diapos.length ; i++){ if(diapos[i].classList.contains("visible")){diapoactive =  i;}}
                if(action == "←"){action=diapoactive;}
                if(action == "→"){action=(diapoactive+2)%(diapos.length-1);}
                if(action <=0){action= diapos.length-1;}
                diapos[diapoactive].classList.remove("visible");
                diapos[action-1].classList.add("visible");
                buttons[diapoactive+1].classList.remove("current");
                buttons[action].classList.add("current");
                diapoactive = action-1;
                }

            function diapomiseenplace(diaporama){

                let diapos = diaporama.children;
                diapos[0].classList.add("visible");

                let nav = '<div class="nav_button"> <button>&larr;</button>';
                for (let i = 0; i< diapos.length ; i++){
                    nav = nav+'<div><button>'+(i+1)+'</button><img src="'+diapos[i].attributes['src'].value+'"></div>';
                    }
                nav = nav+'<button>&rarr;</button> </div>'

                diaporama.innerHTML += nav;

                let buttons = diapos[diapos.length-1].children;
                buttons[1].classList.add("current");

                for (let i = 0; i< buttons.length ; i++){
                    buttons[i].addEventListener("click", function() {diapmove(diapos,buttons,buttons[i].innerText);}); 
                    }
                }

            var diaporamas = document.getElementsByClassName("diaporama")

            for (let j = 0; j<diaporamas.length ; j++){
                diapomiseenplace(diaporamas[j]);
                }
        </script>
	</body>
</html>
