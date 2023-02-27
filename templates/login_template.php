<div class="container">
        <div class="login_form">

            <div class="image">
                <img src="Images/Logotipo Online Shopping Azul Simples.png" style="width: 35vw; height: auto;">    
            </div>
            <form class="login_inputs" action="login_validation.php" method="POST">
                <h1> Login </h1>

                <label for="login" class="lgn_label"> Login: </label>
                <br>
                <input type="text" class="lgn_button" placeholder="Digite o seu Login: " name="login">

                <br>
                <label for="password" class="lgn_label"> Senha: </label>
                <br>
                <input type="password" class="lgn_button" placeholder="Digite a sua senha: " name="password">
                <br>

                <input type="submit" value="Submit" name="submit" id="submit" >

                <input type="button" value="Não possui conta?" onClick="location.href='register.php'">
            </form>
        </div>
</div>