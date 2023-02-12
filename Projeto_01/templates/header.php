<header> 

            <div class="header_n1">
                
                <img src='Images/Logotipo Online Shopping Azul Simples.png' onClick="location.href='main.php'" >
            </div>

            <div class="header_n2">
                <div class="search_box">
                    <!-- <span class="material-symbols-outlined" id="search_button" onclick=''> Search </span> -->
                        <div class="search_bar"> 
                            <form method="GET" name="form" action="main.php">
                                <input type="text" id="search_bar_input" name="data" placeholder= "O que você deseja? " onchange='search_data()'>
                                <button type='button'> submit </button>

                                <?php
                                    if(!empty($_GET['search']))
                                    {
                                        $search_value = $_GET['search'];
                                        $items = file_get_contents("items.json");
                                        $obj_items = json_decode($items);
                                        $variavel_sessão = [];

                                        for($x = 0; $x < count($obj_items); $x++)
                                        {

                                            $valor_a = $obj_items[$x]->name;    
                                            if(stripos($valor_a, $search_value) !== FALSE)
                                            {
                                                array_push($variavel_sessão, $valor_a);                                             
                                            }
                                            
                                        }

                                    print_r($variavel_sessão);
                                    $_SESSION['searched_items_array'] = $variavel_sessão;
                                    header("Location: searched_items.php");
                                    } 
                                    else 
                                    {
                                        echo "não tem nada";
                                    }
                                ?>
                            </form>

                        </div>
                </div>
                
            </div>

            <div class="header_n3">

                <?php
                    if(!empty($login_true))
                    {
                        echo "<a> Bem vindo <br> <i> $login_true </i>  </a>";
                    }
                ?>
                <span class='material-symbols-outlined' onClick="location.href='logout.php'"> Logout </span>
                <span class="material-symbols-outlined" onClick="location.href='cart.php'"> Shopping_cart </span>
            </div>
            
        </header>