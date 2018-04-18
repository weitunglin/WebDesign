<?php include_once('index.php'); ?>
<div>
    <div>汽車共乘網站 -- 登入</div>
    <form action=login.php method=post>
        帳號 : <input type=text name=acc><br />
        密碼 : <input type=password name=pwd><br />
        圖形驗證碼 : <input type=text name=authtext> <input type=button onclick=reloadimg() value=驗證碼重新產生><br />
        <div id=imgshow ondragover=over(event) ondragstart=start(event)>
            <img id=1 src=img.php?q=1 draggable=true> 
            <img id=2 src=img.php?q=2 draggable=true>  
            <img id=3 src=img.php?q=3 draggable=true> 
            <img id=4 src=img.php?q=4 draggable=true> 
        </div>
        <div id=check ondragover=over(event) ondrop=drop(event) style="width:100px;height:25px;border:thin solid black;">
            <input type=hidden name=authimg id=authimg>
            <div></div>
        </div>
        <input type=submit ><input type=reset onclick=formreset()>
    </form>
</div>

<script>

    function over(e){
        e.preventDefault();
    }

    function start(e){
        e.dataTransfer.setData('id',e.srcElement.id);
    }

    function drop(e){
        var id = e.dataTransfer.getData('id');
        $('#authimg').val($('#authimg').val()+id);
        $('#check').append($('#'+id));
    }

    function reloadimg(){
        $('#check').html("<input type=hidden name=authimg id=authimg>");
        $('#authimg').val("");
        $('#imgshow').html("");
        $('#imgshow').append("<img id=1 src=img.php?q=1 draggable=true>  <img id=2 src=img.php?q=2 draggable=true>  <img id=3 src=img.php?q=3 draggable=true>  <img id=4 src=img.php?q=4 draggable=true>  ");
    }

    function formreset(){
        reloadimg();
    }

</script>