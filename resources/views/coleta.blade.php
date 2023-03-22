<!DOCTYPE html>
<html>
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Assinatura</title>

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/signature.js') }}"></script>
        <!-- Styles -->
        <link rel="icon" href="{{ asset('public/images/favicon-16x16.ico') }}" type="image/x-icon">
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

        <style>
            body{
                padding: 15px;
            }
            #note{
                position:absolute;
                left:50px;
                top:155px;
                padding:0px;
                margin:0px;
                cursor:default;
            }
        </style>
    </head>
    <body>
        <h1>Assinatura Digital</h1>

        <form method="post" enctype="multipart/form-data" action=" {{route('signature.save')}} ">
            <!--importar csrf, proteção do laravel, para requisição do formulário-->
            @csrf
            <div id="signature-pad">
                <div style="border:solid 2px #C0C0C0; width:354px;height:184px;padding:3px;position:relative;" class="rounded">
                    <div id="note" onmouseover="my_function();" class="text-muted"><!--A assinatura deve estar dentro da caixa--></div>
                    <canvas id="the_canvas" width="344px" height="174px"></canvas>
                </div>
                <div class="mt-2">
                    <input type="hidden" id="signature" name="signature">
                    <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Limpar</button>
                    <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Salvar como PNG</button>
                </div>
            </div>
        <form>
        
        <script>
            var wrapper = document.getElementById("signature-pad");
            var clearButton = wrapper.querySelector("[data-action=clear]");
            var savePNGButton = wrapper.querySelector("[data-action=save-png]");
            var canvas = wrapper.querySelector("canvas");
            var el_note = document.getElementById("note");
            var signaturePad;

            signaturePad = new SignaturePad(canvas);

            clearButton.addEventListener("click", function (event) {
                /*document.getElementById("note").innerHTML="A assinatura deve estar dentro da caixa";*/
                signaturePad.clear();
            });

            savePNGButton.addEventListener("click", function (event){
                if (signaturePad.isEmpty()){
                    alert("Forneça a assinatura primeiro.");
                    event.preventDefault();
                }else{
                    var canvas  = document.getElementById("the_canvas");
                    var dataUrl = canvas.toDataURL();
                    document.getElementById("signature").value = dataUrl;
                }
            });

            /*function my_function(){
                document.getElementById("note").innerHTML="";
            }*/
        </script>
    </body>
</html>
