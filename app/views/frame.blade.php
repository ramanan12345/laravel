@extends("layout")

        @section("content")

 <style>

        h1{
            text-align:center;
            margin-top:200px;
            font-weight:normal;
        }

        #close{
            display:block;
            width:100px;
            margin:20px auto;
            text-align:center;
        }
        </style>
        <h1>This is frame.html</h1>

        <a href="#" class="button2" id="close" onclick="frameWarp.hide();">Close Window</a>
@stop