<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Student Lives search</title>
    <style>
body{
    font-family: Arail,sans-serif;
}
.search-box{
    width:300px;
    position: relative;
    display: inline-block;
    font-size: 14px;
}
.search-box input[type="text"]{
    height:32px;
    padding: 5px 10px;
    border: 1px solid #CCCCCC;
    font-size:14px;
}
.result{
    position:absolute;
    z-index:999;
    top: 100%;
    left: 0;
}
.search-box input[type="text"], .result{
    width:100%;
    box-sizing: border-box;
}
.result p{
    margin:0;
    padding:7px 10px;
    border-top:none;
    cursor:pointer;
}
.result p:hover{
    background: #f2f2f2;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend.php", {term: inputVal}).done(function(data){
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
</head>
<body>
<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search student..." />
        <div class="result"></div>
</div>
</body>
</html>