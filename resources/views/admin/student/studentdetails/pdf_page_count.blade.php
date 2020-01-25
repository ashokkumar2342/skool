<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head> 
<style> 
#footer {
     position: fixed;
     left: 0;
     right: 0;
     color: black;
     font-size: 0.9em;
     bottom: 0;
     border-top: 0.1pt solid #aaa;
} 
.page-number:before {
  content: "page " counter(page);

}
</style> 
<body> 
<div id="footer">
  <div class="page-number text-center"></div>
</div> 
</body>
</html>