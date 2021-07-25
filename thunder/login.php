<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Thunder Suplementos</title>
</head>
<body>
    <div class="animated animatedFadeInUp fadeInUp">
        <div class="form-structor">
            <div class="signup">
                <h2 class="form-title" id="signup"><span>ou</span>Cadastre-se</h2>
                <form method="POST" action="cadastraUsuario.php" name="logon" class="form">
                    <div class="form-holder">
                        <input type="text" class="input" placeholder="Nome" name="txtnome" />
                        <input type="email" class="input" placeholder="Email" name="txtemail" />
                        <input type="password" class="input" placeholder="Senha" name="txtsenha" />
                    </div>
                    <button class="submit-btn" type="submit">Cadastrar</button>
                </form>
            </div>
            <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>ou</span>Faça login</h2>
                    <form method="POST" action="validaUsuario.php" name="logon" class="form">
                        <div class="form-holder">
                            <input type="email" class="input" placeholder="Email" name="txtemail" />
                            <input type="password" class="input" placeholder="Senha" name="txtsenha" />
                        </div>
                        <button class="submit-btn" type="submit">Logar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    
    console.clear();

    const loginBtn = document.getElementById('login');
    const signupBtn = document.getElementById('signup');

    loginBtn.addEventListener('click', (e) => {
        let parent = e.target.parentNode.parentNode;
        Array.from(e.target.parentNode.parentNode.classList).find((element) => {
            if(element !== "slide-up") {
                parent.classList.add('slide-up')
            }else{
                signupBtn.parentNode.classList.add('slide-up')
                parent.classList.remove('slide-up')
            }
        });
    });

    signupBtn.addEventListener('click', (e) => {
        let parent = e.target.parentNode;
        Array.from(e.target.parentNode.classList).find((element) => {
            if(element !== "slide-up") {
                parent.classList.add('slide-up')
            }else{
                loginBtn.parentNode.parentNode.classList.add('slide-up')
                parent.classList.remove('slide-up')
            }
        });
    });
    
    </script>
</div>
</body>
</html>