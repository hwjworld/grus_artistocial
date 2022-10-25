<link rel="stylesheet" href="../css/initialize.css">
<link rel="stylesheet" href="../css/publicStyle.css">
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

<script type="text/javascript" src="../js/selectTab.js"></script>

<div id="footer-content" class="footer-content">
    <div class="footer-left-info">
        Contact us:<br/>
        Email: Artistocial@uqconnect.edu.au<br/>
        Address: Artanywhere, St. Lucia QLD 4072

    </div>

    <div class="footer-right-info">
        <div class="footer-face">
            <div class="left-eye-footer"></div>
            <div class="right-eye-footer"></div>
            <div class="footer-noth">
                <div id="footer-botface" class="footer-botface"></div>
            </div>
            <div class="footer-mouse"></div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        let parameters = getRequest()
        let footerDom = document.getElementById("footer-content");
        let botfaceDom = document.getElementById("footer-botface");
        if (parameters.hasOwnProperty("color")) {
            footerDom.style.background = "#" + parameters["color"];
            botfaceDom.style.background = "#" + parameters["color"];
        } else {
            footerDom.style.background = "#F4CF0A";
            botfaceDom.style.background = "#F4CF0A";
        }
    }
</script>