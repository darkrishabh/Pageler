
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pageler provides a dynamic web content builder. Unlike others it provides a simple layout that generates a page for you which can be exported to any where as a static template">
    <meta name="author" content="Rishabh Mehan">
    <meta name="keyword" content="Pageler, web design, Fluid">

    <title><?PHP echo $this->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL; ?>public/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo URL; ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom styles for this template -->
    <link href="<?php echo URL; ?>public/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .custombtn{
            width: 100%;
            border: 2px white solid;
            background: transparent;
            color: whitesmoke;
            font-family: inherit;
            font-size: x-large;
        }
    </style>
</head>

<body>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<?php
if(isset($this->error_message) && $this->error_message!=""){
    echo '<div class="alert alert-warning alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <strong>Error!! </strong>'.$this->error_message.'
						</div>';
}
?>
<div id="login-page">
    <div class="container">

        <form class="form-login" action="login/oauth" style="background:transparent;">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAABUCAQAAABt9bAtAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJb0ZGcwAAAAsAAAAbABnbjZcAAAAJdnBBZwAAAN4AAADfADtGGYYAAA4mSURBVHja7Z17dFXlmcZ/+5yTe0iOBEwIxNwAIdwCBS1CAbmoXBXBWi+d2oKtc6ld9rqYVRmnrbV21lTLmlXrMJ3admbU0REtCoqXYlEgwIAIOKCGcAsQCOSEhBDO7Zk/cpKchJO99wkxZzOT58+9v/f7vvd79vt+93cbXEEQZDOHOykjzHF2sY1DHOYsAtz05xpKuZ6xDAJ28gc20WwkutJx4oqprwAG8m2WM6DtoZ9K9lKFD4McihhFKZ62t4dYxWoarxgVrywIefWULigWwgrHfO7TCqUq0VX/vwihDD3SBR1mqNX98vRR0sMQ8mi5TsdNhyRV6hbRR0kPQsjQrTrULTokaacm9VHSYxBK15d0oNt0SNJW3aykPkouE0IoSZ/TKh2/LDpaHNePNVxu51uKQ8eEAoOBTOB2bmYw7h7IMkAV63mZ3fiQQ9XGkYQIIJ/5LGYqmT1aQ+HjLV5mPXUOVNyZEEKTtFYNl+2mukKdntEw5zsvh0BonLZ+ZmS0IKyXNNiZlLgSXYGOECRxN9d/xsUYLGCRE9214wgBCpjZC6UkMZ/MRKsaC44iRACDGd0rhU0gO9H6xoKjCAEgn+ReKSeVqxOtaiw4jRCD7F7y7S5nWojn8rPoUbjoH0fqM9TgIgSIMMmEyCXHJqFuchKtbCw4jRADr41Uwk81DQQJ4yZICyFBglSxmyxGk2pJi7vPQuzATb5FU4omDlJHEQWkkdbp7QV8nON1CrmWjEh6H26yLsknicGJVjYWnEZIGiNM34tTnMDLCDwxiUsjjTwK2cEWrqWAZqo4Sh5jLkntYQQeBZ02GXEaIeUUm7wNsJ8URpBqmodBKlM5zg6OUUc+U0mPmW40w/ko0Qp3hoNGWYJ0vhx1hKEzwvwPosSCjlbkM5LfUc+4LuiAkdyGy2nLJ44hRACzmWeS5FMCjLZt02d5idn042SXKTzcxVgctqLlEEIiS+7fJK/LJPWcpsx2fQM8Q4hbKWS3SapRfLNL+0kQHEII4OJuZpi8P0buJWOqWGgmBKxlM3eTRDZnqOsyrcHtzHWWjTiHkOF8zdQdXbSVy0U2Usc+fs09FAFpnOCUSXovy02sMgFwBCECWMJQi5paj1DFa3xEkF9SwBwAmjlCs6nMFG50ko04ghDgaqaSZJoiTNgiDz8v8p/M4U0qWBZZXK+lymIY0I8v2HKFvQSnzEMGWK695hJGJlbi4194kb8lhVXc0rbFtZ2w5epYPhlcSHQDtMIpFhIiaJEiFz/nu3jnZyd/zbN8h+k8QQP3RM6p1LGOyQyyyDloaXu9CKcQUk2VRQoPAznBmUvc/Xm28WO+jvgVd7CO51jKKADC/JZq5luWvZ9ziVY/Wk0HwECNbLDcVM3CzRGO0I8heAhTw2E+YCf7KOEH3EQ2tfwr/VkasY/3+C1fZpxF4cfYaGmdvQhHEALAH7mXGy3SZFBKI/VUcAgfjTQB43mA4fSjDvEcW/geo4Eg6/kFC/iGpQ94g/cdeTwtsRBCt8ln8xCPX81q0gU1yx+5GRJUpTZouK7Xp5I+1pOaq1/ZONtVqYnOGfKCYyzEQPA2z/F1Gx+rEWOA7MbL7znKjexgO/Wk8RhjLK3Dz2p2JVp3h0IITdDebh9+e165+ksdU7WqdVZBWzJvOPW4nCMg5NIj8neLjn0q1006EpeMT1/po8MUQmU61g06fPoLleidOKU2a5Dz6HDKPKQVh9gft0yQ3/Am32NanHK7OZFodS+F0wgJ8mncMm/yG+7jvjhvkfg56MThrkNGWW0Ic8p0xaozQlSwiqV82+bGbjuCJnuJCYTzCPFZpjiNn2SCJNFMBZv4BvNIJkw4Lm3C1Cda2VhwIiHmFtLEH2jCRSp5GNSwmEHsI4VUBsQ4fdU1QiY7iQmE0wiBMxbvU7kNCJFCCmmk0kyAIB6SIwfj7KKPEJuoxme6g+HptLMYb9/RirOmW7sJg6NGWQZANdt7pbD3aEi0vrHgKEIAOME6i13wnsBZ1jhnlzAaDiPEAHiefyPwmRbTyCreceIsxJEQytNKVSnUrVUtKwS1V38lr/MWTVrgwI9EAMmMYDGLGEa/Hsy6jgO8wKtUEnKg4oAjCWmBwMUgZrOYGT1ytaaGDaxlI7VODqzheAgN1N2q6CJinF0E9LrmK8upbuqKgpBLo7TuMigJaLUK+3Y+egxCaJQ2dpuQZ5XXR0aPQghN075u0fEnjeizjh6HkKEl3dhN3K2pfXR8JhBy64EYseXCCqhe9QrG6GX2a+GVRscVNAIUpLCQFYwkBRGgiTp2spk9NABXMYYbKMdLGsnABTbzGO8SvoJU5IoiJDI3GcIchiJOso89nMNPOHKuy0UyXsYxklzEXt7mVN+cow996EMf+vD/Bz3U5wmMlkBJfZ3o5cGjfuR1GKqHOU9tN5an85nGBssjCjEgMBjEMHLJpp4aPuEkYa7lDLWGmZS3yzAcQWq4YHQtmUQeqW1aG1zkqL3xmGAg3i6mNhc5ScCk1H7kdnoYppHTHUv2kMUYbmI8BiHOE8CFi5O8pjeos/u9C2AKj3OCjfGccosMZEdwL9chjnEWN3n04wB/ZiGrqTUVvooJzGUU4OdCVPOm0cDD7DCRTKKQsSyiPwa1rGMXx2zPH69mEvMpQjRzsU3KRTpH+S5HTST7MZabKccgxDl8pJOF+JBntS3KAORWmqbLJ+ljTVaRxmiljqhBL2ms3VmuUKbWSPonpcQzLxbK0AM6oH16SKXKVqoylatb9IJO6LymmJUv5FGKlqha0msar2KVqEQlGqFv6VMtMZU0lKz+elyStFrZSolD0ySl60E1SHpa17aVOkY/1ScqNy3VrRTN0AlJH+o6DdEwLdNHCuqIvia3OiTN025JFUpVy3L3HaqTtEH5tqs5Q2ckVWmEfUKEsvWIzmuHviBD7U+RVz9VvW62aiah4dou6fn2LVkht36gL1pKolslNeuheJdWhKbomKSfKVntuaXrCavbWEKFqpD0J3nUIjVLRyRVanK7qQGEaGoVMiDMOjYCU1lor4K4WUIDYjBL7UZFELj5Ct/lHD9hU7sfNTDAxz+whiH2WqdVqK3+ITZy0IZsqE0+Xqi1qKg6N7HBwsVGy7aKb2E9UMKC1hexT500swNI4wabFZzIGB7lY5KYR6FtjSbyLTJYy7rOfZUBdfyO2u78FUGQyn/37kU1IRepvMWRuEWb2AfQHpAzNiFGpCkabTWAizlU8V+sA8Yxy6aNJHMXJdSzBn/MYcA2tnTr6/UwC6PXDzFkMp2AEf9CZlJk5OVrfRBNSLv66UwCGthklZ8AipjOGs6yjmrSWWgSEy4aVzEf8LEz1ksD47xxyraCbXFQBF7mWkRN6SmEolpsCLO6lcdQ5gGHWN/qJaLP9rowQJDJPUwn3OJMbGA2jVQAm9nKEm6knLdsDH7LyAEOt/deEXrzGEyIMC1TzQsc7MKConENi2mUASQxi7Je2gIpYylBAaRxR7QetpCuAYzjQcbyCY/xXuvjaEKKWEklHiaygCBP83NbISeyWMB6aoAm/p1byOYu/ozfUm4IyYDvkjgjKYzkdoYBft5mvWXIDYA8ZkXiaaVzHY29REgxcyK1z+Y6a28ShWE8SRYFjOU0j/MqUfOQaEJO8T4FlBLmH3mPvTTYchgzSWFtZEfiXXYwndmU8YGlXAoGdAx4bAA6zElC/DOZbOcpjtjqDT5gBXUYgJuRPNRLB2Tf5ieRDy+JaabRIjujhv9gAgvxsoenOdxxpt6ORt4igAtaXIadeGGkczteFhMWgJtmYDBL2S2rpYgq/KRTQmrHoYOBLrKJC2RygOM2O+cAjZxvSamdVPRSdB8/jS3uVLCFa+KQrGcrO/Cygsn8DT9S1Kcf/S0ZQMgIGAEjbNijAyZSyh8JRR4F2cQB3My2iA4HsJ8aICfmzynCkdzsIrq6QV65nKPakQmbvVKjm/jVOAoxcOHn17xAEsu5l6h/kV7ehZ0k5rKLX7Qu5AlcZPF9xjODTyw69lO8zPfxspT3Fei5QaoRplLgUjY+o3t9SSn1tqZ47WXCRaqEPGTis61LLT+igJmsoIrXWx9enrct5fO80n7PwoAwazhMMndYRogL8Aw7MFhke+YSD4qZ3x3dBBnMZGA3Sx3HdPuJDTjID9lPAY8yvuPSidEtYgzmUcO2Tr3NLt4HJjPeojJwgL/nIAWspLwTJWarCLGy6uBjBBksw9fmSM3RUdJgLkWma7YxJUGQy1c5FmcbVvAop5jAw0QOu7YofRWFQHo81yYFQ7mT3dRH02GAn20EyeR+ss2+ewPE69zPJsbze75IrgwhZDCQm0jjPMdtdM659Af6k0uWvPLKqxzK+Dtm8KGFpEERLX9jKFSRilSkYspYxkqOWq5QFJAB5DKA7EipA5jEzyk0i0MhgFSygGzyI20Q5gWepJlFPEopgEeDmcJ8coAiHuZdbaPaygsKPNzAg5RTT6XepaatDxnITG7FDczhh7yiiq63bAwU4h0OcicLeYJdbOE4AQqYTDmbWcsas85ZUMx47uQa4PP8kjMRQ02ijDJWdX2lU5DOBEaxDEjiPqZFiHeRQzGVbO16hCkYTTlfJRtYiJemSNI0yingO11PDwWDmcQ8hgLDWMFrquC0gS7yFMUs50sM4UVtMJRDGf0B4SLEGQ5wxgYhbkZSgoGoY2/rfzMF2Yxtyy3AIQ5g8UMIgYtiRjKWQaRxET/H+ZB9VJvv4QnyKGUAIAzcUW0YRuyhsqtmFaQwlHwyOq8UI+AsFVw0IaSQ4rY9w+ghUYgQ2zlpUmoOw7k60jZBTrOfeqM1yPrncOGmiT3/C4idc/CWX7rAAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE0LTEyLTAxVDE4OjI0OjA1LTA1OjAwvFd3wQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNC0xMi0wMVQxODoyNDowNS0wNTowMM0Kz30AAAAASUVORK5CYII=" style="
    margin-left: 65px;
    margin-top:100px;
    margin-bottom: 200px;
    align-items: center;
">
<?php
if (isset($this->authURL)) {

?>
    <a class="login" href="<?php echo $this->authURL; ?>">
        <span class="btn btn-round btn-default custombtn">Sign in with Google</span>
    </a>
<?php
}
?>



            </div>



        </form>

    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo URL; ?>public/assets/js/jquery.js"></script>
<script src="<?php echo URL; ?>public/assets/js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="<?php echo URL; ?>public/assets/js/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("<?php echo URL; ?>public/assets/img/backstretch.jpg", {speed: 500});
</script>


</body>
</html>
