<div id="anchorads">
    <style type="text/css">
        .anchor_banner {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50px;
            background-color: #fff;
            text-align: center;
            z-index: 9999
        }

        .btnclose {
            position: fixed;
            width: 28px;
            height: 28px;
            right: 0;
            bottom: 100px;
            background-size: 13px 13px;
            background-position: 9px;
            background-color: #fff;
            background-repeat: no-repeat;
            box-shadow: 0 -1px 1px 0 rgba(0, 0, 0, 0.2);
            border: none;
            border-radius: 12px 0 0 0;
            font-size: 16px;
            cursor: pointer
        }
    </style>


    <div class="anchor_banner" id="iklan_anchor">
        <button class="btnclose" aria-label="Close anchor ads" onclick="closebottom()">
            <img src="{{ asset('frontend/icons/close-icons.svg') }}" alt="icon close" width="20px" height="20px">
        </button>
        <a href="https://indopop.id/">
            <div id="div-Anchor"
                style="position:fixed;bottom:0px;z-index:9999;text-align:center;height:100px;width:100%; background-color:#E1E1E1">
                <img src="{{ asset('frontend/images/ads/320_x_100.jpg') }}" alt="" width="320px"
                    height="100px">
            </div>
        </a>
    </div>


</div>
