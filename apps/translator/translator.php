<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>StudentHelping.com</title>
</head>
<body>

    <div class="container">
        <div class="wrapper">
            <div class="text-input">
                <textarea spellcheck="false" class="from-text" placeholder="Enter text"></textarea>
                <textarea spellcheck="false" readonly disabled class="to-text" placeholder="Translation"></textarea>
            </div>
            <ul class="controls">
                <li class="row from">
                    <div class="icons">
                        <i id="from" class="fas fa-volume-up"></i>
                        <i id="from" class="fas fa-copy"></i>
                    </div>
                    <select></select>
                </li>
                <li class="exchange"><i class="fas fa-exchange-alt"></i></li>
                <li class="row to">
                    <select></select>
                    <div class="icons">
                        <i id="to" class="fas fa-volume-up"></i>
                        <i id="to" class="fas fa-copy"></i>
                    </div>
                </li>
            </ul>
        </div>
        <button>Translate Text</button>
    </div>


    <script src="js/countries.js"></script>
    <script src="js/script.js"></script>
    
</body>
</html>